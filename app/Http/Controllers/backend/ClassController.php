<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassController extends Controller
{
    public function index()
    {
        $classes = Classes::all();
        return view('backend.class.index', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Classes::create([
            'name' => $request->name,
        ]);

        return redirect()->route('class.index')->with('success', "Data Class berhasil dibuat.");
    }

    public function edit(Classes $class)
    {
        return view('class.edit', compact('class'));
    }

    public function update(Request $request, Classes $class)
    {
        try {
            // Validasi data dari form
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            // Update data kelas
            $class->update([
                'name' => $validated['name'],
            ]);

            // Redirect dengan pesan sukses
            return redirect()->route('class.index')->with('success', 'Data Class berhasil diperbarui.');

        } catch (\Exception $e) {
            // Jika terjadi error, kembalikan ke halaman sebelumnya dengan pesan error
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.'])->withInput();
        }
    }

    public function destroy(Classes $class)
    {
        $class->delete();

        return redirect()->route('class.index')->with('success', 'Data Class berhasil dihapus.');
    }
}
