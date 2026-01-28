<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MenuItem;
use Illuminate\Http\Request;

class MenuItemController extends Controller
{
    public function index()
    {
        $items = MenuItem::latest()->paginate(15);

        return view('admin.menu', compact('items'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'nullable|integer',
            'is_available' => 'nullable|boolean',
            'image' => 'nullable|image|max:5120',
        ]);

        $data = [
            'name' => $validated['name'],
            'category' => $validated['category'] ?? null,
            'description' => $validated['description'] ?? null,
            'stock' => $validated['stock'] ?? 999,
            'is_available' => $validated['is_available'] ?? true,
        ];

        // Store numeric price into price_int (Rupiah)
        $data['price_int'] = (int) $validated['price'];
        // Populate legacy `price` column with the submitted numeric value as string
        // to satisfy the DB non-null constraint while frontend uses `price_int`.
        $data['price'] = (string) $validated['price'];

        // Handle image upload
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('menu', 'public');
            $data['image'] = $path;
        }

        MenuItem::create($data);

        return back()->with('success', 'Menu item berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            abort(404);
        }

        $item->delete();

        return back()->with('success', 'Menu item berhasil dihapus.');
    }

    public function toggleAvailability($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            abort(404);
        }

        $item->toggleAvailability();

        return back()->with('success', 'Ketersediaan menu diperbarui.');
    }

    public function outOfStock($id)
    {
        $item = MenuItem::find($id);

        if (!$item) {
            abort(404);
        }

        $item->markOutOfStock();

        return back()->with('success', 'Menu ditandai habis.');
    }
}
