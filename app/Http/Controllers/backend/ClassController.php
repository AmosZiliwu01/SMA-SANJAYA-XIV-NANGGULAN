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
        return response()->json($class); // untuk edit via AJAX (optional)
    }

    public function update(Request $request, Classes $class)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $class->update([
            'name' => $request->name,
        ]);

        return redirect()->route('class.index')->with('success', 'Data Class berhasil diperbarui.');
    }

    public function destroy(Classes $class)
    {
        $class->delete();

        return redirect()->route('class.index')->with('success', 'Data Class berhasil dihapus.');
    }
}
