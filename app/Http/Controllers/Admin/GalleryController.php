<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Menampilkan semua galeri.
     */
    public function index()
    {
        $galleries = Gallery::latest()->get();

        return view('admin.galleries.index', compact('galleries'));
    }

    /**
     * Form tambah galeri.
     */
    public function create()
    {
        return view('admin.galleries.create');
    }

    /**
     * Menyimpan galeri baru.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $validated['image'] = $request
            ->file('image')
            ->store('galleries', 'public');

        Gallery::create($validated);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto berhasil ditambahkan.');
    }

    /**
     * Form edit galeri.
     */
    public function edit(Gallery $gallery)
    {
        return view('admin.galleries.edit', compact('gallery'));
    }

    /**
     * Update galeri.
     */
    public function update(Request $request, Gallery $gallery)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'category' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {

            if ($gallery->image) {
                Storage::disk('public')->delete($gallery->image);
            }

            $validated['image'] = $request
                ->file('image')
                ->store('galleries', 'public');
        }

        $gallery->update($validated);

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto berhasil diperbarui.');
    }

    /**
     * Menghapus galeri.
     */
    public function destroy(Gallery $gallery)
    {
        if ($gallery->image) {
            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return redirect()
            ->route('galleries.index')
            ->with('success', 'Foto berhasil dihapus.');
    }
}