<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Menampilkan semua file
        $files = File::paginate(5);
        return view('backend.file.index', compact('files'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Menampilkan form tambah file
        return view('backend.file.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file_path' => 'required|mimes:pdf,doc,docx,ppt,pptx,zip|max:10240', // 10MB max
        ]);

        // Proses upload file
        if ($request->hasFile('file_path')) {
            $file = $request->file('file_path');

            // Nama file unik (timestamp + original name)
            $fileName = time() . '_' . $file->getClientOriginalName();

            // Simpan file di storage/app/public/uploads
            $filePath = $file->storeAs('uploads', $fileName, 'public');

            // Simpan data ke database
            $data = new File();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->file_path = $filePath; // path file relatif (untuk <a href="{{ asset('storage/'.$file->file_path) }}">)
            $data->save();

            return redirect()->back()->with('success', 'File berhasil diunggah!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file!');
    }

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'file_path' => 'nullable|mimes:pdf,doc,docx,ppt,pptx,zip|max:10240', // file opsional
        ]);

        $file = File::findOrFail($id);
        $file->title = $request->title;
        $file->description = $request->description;

        // Jika ada file baru diupload, ganti file lama
        if ($request->hasFile('file_path')) {
            // Hapus file lama jika ada
            if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
                Storage::disk('public')->delete($file->file_path);
            }

            // Upload file baru
            $uploadedFile = $request->file('file_path');
            $fileName = time() . '_' . $uploadedFile->getClientOriginalName();
            $filePath = $uploadedFile->storeAs('uploads', $fileName, 'public');

            $file->file_path = $filePath;
        }

        // Simpan perubahan
        $file->save();

        return redirect()->back()->with('success', 'File berhasil diupdate!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        File::destroy($id);
        return redirect()->back()->with('success', 'File berhasil dihapus!');
    }
}
