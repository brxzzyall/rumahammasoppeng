<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'menu_item_id' => 'required|exists:menu_items,id',
            'quantity' => 'required|integer|min:1'
        ]);

        session()->push('cart.' . $validated['menu_item_id'], [
            'menu_item_id' => $validated['menu_item_id'],
            'quantity' => $validated['quantity']
        ]);

        return back()->with('success', 'Menu ditambahkan ke keranjang!');
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return back()->with('error', 'Keranjang Anda kosong!');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'notes' => 'nullable|string'
        ]);

        $totalPrice = 0;
        
        // Generate unique tracking code
        $trackingCode = 'ORD-' . strtoupper(uniqid());
        
        $order = Order::create([
            'tracking_code' => $trackingCode,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'address' => $validated['address'],
            'notes' => $validated['notes'] ?? null,
            'status' => 'pending',
            'total_price' => 0
        ]);

        foreach ($cart as $items) {
            foreach ($items as $item) {
                $menuItem = \App\Models\MenuItem::find($item['menu_item_id']);
                if (!$menuItem) {
                    // skip missing menu items
                    continue;
                }

                $price = $menuItem->price_value; // integer rupiah
                $totalPrice += $price * $item['quantity'];

                OrderItem::create([
                    'order_id' => $order->id,
                    'menu_item_id' => $item['menu_item_id'],
                    'quantity' => $item['quantity'],
                    'price' => $price
                ]);
            }
        }

        $order->update(['total_price' => $totalPrice]);
        session()->forget('cart');

        return redirect()->route('order.success', $order->id)->with('success', 'Pesanan berhasil dibuat!');
    }

    public function success($orderId)
    {
        $order = Order::with('items.menuItem')->find($orderId);

        if (!$order) {
            abort(404);
        }

        return view('order.success', compact('order'));
    }

    public function cart()
    {
        $cart = session()->get('cart', []);
        $cartItems = [];
        $totalPrice = 0;

        foreach ($cart as $items) {
            foreach ($items as $item) {
                $menuItem = \App\Models\MenuItem::find($item['menu_item_id']);
                if (!$menuItem) continue;

                $price = $menuItem->price_value;
                $subtotal = $price * $item['quantity'];
                $totalPrice += $subtotal;

                $cartItems[] = [
                    'menu_item' => $menuItem,
                    'quantity' => $item['quantity'],
                    'price' => $price,
                    'subtotal' => $subtotal
                ];
            }
        }

        return view('order.cart', compact('cartItems', 'totalPrice'));
    }

    public function removeFromCart($menuItemId)
    {
        session()->forget('cart.' . $menuItemId);
        return back()->with('success', 'Item dihapus dari keranjang!');
    }

    public function findOrderForReview(Request $request)
    {
        $validated = $request->validate([
            'orderId' => 'required|integer'
        ]);

        $order = Order::find($validated['orderId']);

        if (!$order) {
            return back()->with('error', 'Order ID tidak ditemukan!');
        }

        return redirect()->route('order.review', $order->id);
    }

    public function showReviewForm($orderId)
    {
        $order = Order::find($orderId);
        
        if (!$order) {
            abort(404);
        }

        $existingReview = \App\Models\Review::where('order_id', $orderId)->first();
        
        return view('order.review', compact('order', 'existingReview'));
    }

    public function submitReview(Request $request, $orderId)
    {
        $order = Order::find($orderId);
        
        if (!$order) {
            abort(404);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:500'
        ]);

        \App\Models\Review::updateOrCreate(
            ['order_id' => $orderId],
            [
                'name' => $validated['name'],
                'rating' => $validated['rating'],
                'comment' => $validated['comment']
            ]
        );

        return redirect()->route('home')->with('success', 'Terima kasih! Review Anda telah disimpan.');
    }

    public function checkOrderForm()
    {
        return view('order.check-order');
    }

    public function checkOrder(Request $request)
    {
        $validated = $request->validate([
            'tracking_code' => 'required|string'
        ]);

        $order = Order::with('items.menuItem', 'review')
            ->where('tracking_code', $validated['tracking_code'])
            ->first();

        if (!$order) {
            return back()->with('error', 'Kode tracking tidak ditemukan!')->onlyInput('tracking_code');
        }

        return view('order.track-result', compact('order'));
    }

    public function submitDirectReview(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'required|string|min:10|max:500'
        ]);

        \App\Models\Review::create([
            'name' => $validated['name'],
            'rating' => $validated['rating'],
            'comment' => $validated['comment'],
            'order_id' => null
        ]);

        return back()->with('success', 'Terima kasih! Review Anda telah disimpan dan akan ditampilkan di halaman utama.');
    }
}
