<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::paginate(5);
        return view('backend.testimonial.index', compact('testimonials'));
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'graduation_year' => 'required|string|max:4',
                'message' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = null;
            if ($request->hasFile('photo')) {
                $imageName = time().'.'.$request->photo->extension();
                $request->file('photo')->storeAs('public/testimonials', $imageName);
            }

            Testimonial::create([
                'name' => $validate['name'],
                'graduation_year' => $validate['graduation_year'],
                'message' => $validate['message'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Menambahkan testimonial: ' . $request->name);

            return redirect()->route('testimonial.index')->with('success', 'Data testimonial berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'graduation_year' => 'required|string|max:4',
                'message' => 'required|string',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $testimonial->photo;

            if ($request->hasFile('photo')) {
                if ($testimonial->photo && Storage::exists('public/testimonials/' . $testimonial->photo)) {
                    Storage::delete('public/testimonials/' . $testimonial->photo);
                }
                $imageName = time() . '.' . $request->photo->extension();
                $request->file('photo')->storeAs('public/testimonials', $imageName);
            }

            $testimonial->update([
                'name' => $validate['name'],
                'graduation_year' => $validate['graduation_year'],
                'message' => $validate['message'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Memperbarui testimonial: ' . $testimonial->name);

            return redirect()->route('testimonial.index')->with('success', 'Data testimonial berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Testimonial $testimonial)
    {
        try {
            if ($testimonial->photo) {
                Storage::disk('public')->delete('testimonials/' . $testimonial->photo);
            }

            $testimonial->delete();

            $this->logActivity('Menghapus testimonial: ' . $testimonial->name);

            return redirect()->route('testimonial.index')->with('success', 'Data testimonial berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}
