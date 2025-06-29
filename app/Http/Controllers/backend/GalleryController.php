<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $query = Gallery::with('user');

        if (auth()->user()->role !== 'administrator') {
            $query->where('user_id', auth()->id());
        }

        $galleries = $query->latest()->paginate(5);

        return view('backend.gallery.index', compact('galleries'));
    }

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

            $this->logActivity('Menambahkan gallery: ' . $request->title);

            return back()->with('success', 'Gallery berhasil ditambahkan.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage())->withInput();
        }
    }

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

            $this->logActivity('Memperbarui gallery: ' . $gallery->title);

            return redirect()->route('gallery.index')->with('success', 'Gallery berhasil diupdate.');

        } catch (\Exception $e) {
            return back()->with('error', 'Terjadi kesalahan saat mengupdate: ' . $e->getMessage())->withInput();
        }
    }

    public function destroy($id)
    {
        try {

            $gallery = Gallery::findOrFail($id);

            if ($gallery->image && Storage::disk('public')->exists($gallery->image)) {
                Storage::disk('public')->delete($gallery->image);
            }

            $gallery->delete();

            $this->logActivity('Menghapus gallery: ' . $gallery->title);

            return redirect()->route('gallery.index')->with('success', 'gallery berhasil dihapus.');
        } catch (\Exception $e) {
            return redirect()->route('gallery.index')->with('error', 'Terjadi kesalahan saat menghapus gallery.');
        }
    }
}
