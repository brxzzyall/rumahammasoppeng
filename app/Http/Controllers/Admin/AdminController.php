<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function dashboard()
    {
        $orders = Order::latest()->paginate(10);
        $totalOrders = Order::count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count();

        return view('admin.dashboard', compact('orders', 'totalOrders', 'pendingOrders', 'completedOrders'));
    }

    public function viewOrder($orderId)
    {
        $order = Order::with('items.menuItem')->find($orderId);

        if (!$order) {
            abort(404);
        }

        $autoDeleteDelay = config('order.auto_delete_delay', 30);

        return view('admin.order-detail', compact('order', 'autoDeleteDelay'));
    }

    public function updateStatus(Request $request, $orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            abort(404);
        }

        $validated = $request->validate([
            'status' => 'required|in:pending,confirmed,completed,cancelled'
        ]);

        // Set completed_at timestamp when status becomes completed
        if ($validated['status'] === 'completed' && $order->status !== 'completed') {
            $order->completed_at = Carbon::now();
        }

        $order->update(['status' => $validated['status'], 'completed_at' => $order->completed_at ?? null]);

        $delay = config('order.auto_delete_delay', 30);
        return back()->with('success', "Status pesanan berhasil diperbarui! Pesanan akan dihapus dalam {$delay} detik.");
    }

    public function orderHistory()
    {
        // Exclude orders that are still pending from the history
        $orders = Order::where('status', '!=', 'pending')->latest()->get();

        return view('admin.order-history', compact('orders'));
    }

    public function pendingOrders()
    {
        $orders = Order::where('status', 'pending')->latest()->get();

        return view('admin.pending-orders', compact('orders'));
    }

    public function reviewHistory()
    {
        $reviews = \App\Models\Review::latest()->paginate(15);

        return view('admin.review-history', compact('reviews'));
    }

    /**
     * Delete a specific completed order
     */
    public function deleteCompletedOrder($orderId)
    {
        $order = Order::find($orderId);

        if (!$order) {
            return response()->json(['error' => 'Order not found'], 404);
        }

        if ($order->status !== 'completed') {
            return response()->json(['error' => 'Order is not completed'], 400);
        }

        $order->forceDelete();

        return response()->json(['success' => 'Order deleted successfully']);
    }
}
