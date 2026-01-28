<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(12);
        return view('admin.gallery', compact('galleries'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'image' => 'required|image|max:5120', // max 5MB
            'title' => 'nullable|string|max:255'
        ]);

        $disk = env('FILESYSTEM_DISK', 'public');

        // store file on configured disk (local, s3, filess, etc.)
        $path = $request->file('image')->store('gallery', $disk);

        Gallery::create([
            'image' => $path,
            'title' => $validated['title'] ?? null
        ]);

        return back()->with('success', 'Gambar berhasil diunggah ke galeri.');
    }

    public function destroy($id)
    {
        $g = Gallery::find($id);
        if (!$g) abort(404);

        // Delete file if exists
        try {
            $disk = env('FILESYSTEM_DISK', 'public');
            \Storage::disk($disk)->delete($g->image);
        } catch (\Exception $e) {
            // ignore
        }

        $g->delete();

        return back()->with('success', 'Gambar galeri dihapus.');
    }
}
