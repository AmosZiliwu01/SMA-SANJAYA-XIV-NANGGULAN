<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galleries = Gallery::with('user')->paginate(5);
        return view('backend.gallery.index', compact('galleries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            ], [
                'image.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            ]);

            $imagePath = $request->file('image')->store('gallery', 'public');

            Gallery::create([
                'title' => $request->title,
                'image' => $imagePath,
                'user_id' => auth()->id(),
            ]);

            return back()->with('success', 'Gallery berhasil ditambahkan.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $gallery = Gallery::findOrFail($id);

            // Validasi input
            $request->validate([
                'title' => 'required|string|max:255',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ], [

                'image.max' => 'Ukuran gambar terlalu besar. Maksimal 2MB.',
            ]);

            // Update title
            $gallery->title = $request->title;

            // Jika ada file image baru, simpan dan update path-nya
            if ($request->hasFile('image')) {
                // Hapus gambar lama jika ada
                if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                    Storage::disk('public')->delete($gallery->image);
                }

                // Simpan gambar baru ke storage/app/public/gallery
                $path = $request->file('image')->store('gallery', 'public');
                $gallery->image = $path;
            }

            // Update user_id dengan user login saat ini
            $gallery->user_id = auth()->id();
            $gallery->updated_at = now();

            $gallery->save();

            return redirect()->route('gallery.index')->with('success', 'Gallery berhasil diupdate.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengupdate: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {

            $gallery = Gallery::findOrFail($id);

            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->delete();

            return redirect()->route('gallery.index')->with('success', 'gallery berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('gallery.index')->with('error', 'Terjadi kesalahan saat menghapus gallery.');
        }
    }
}
