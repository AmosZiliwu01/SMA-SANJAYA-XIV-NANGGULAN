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

    public function update(Request $request, Classes $class)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
            ]);

            $class->update([
                'name' => $validated['name'],
            ]);

            return redirect()->route('class.index')->with('success', 'Data Class berhasil diperbarui.');

        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui data.'])->withInput();
        }
    }

    public function destroy(Classes $class)
    {
        $class->delete();

        return redirect()->route('class.index')->with('success', 'Data Class berhasil dihapus.');
    }
}
