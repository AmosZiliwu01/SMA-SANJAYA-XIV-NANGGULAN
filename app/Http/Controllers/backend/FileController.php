<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {
        $query = File::with('user')->orderBy('created_at', 'desc');

        if (auth()->user()->role !== 'administrator') {
            $query->where('user_id', auth()->id());
        }
        $files = $query->paginate(5);
        return view('backend.file.index', compact('files'));
    }

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
            $filePath = $file->storeAs('files', $fileName, 'public');

            // Simpan data ke database
            $data = new File();
            $data->title = $request->title;
            $data->description = $request->description;
            $data->file_path = $filePath;
            $data->user_id = auth()->id();
            $data->save();

            return redirect()->back()->with('success', 'File berhasil diunggah!');
        }

        return redirect()->back()->with('error', 'Gagal mengunggah file!');
    }

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
            $filePath = $uploadedFile->storeAs('files', $fileName, 'public');

            $file->file_path = $filePath;
        }

        // Simpan perubahan
        $file->save();

        return redirect()->back()->with('success', 'File berhasil diupdate!');
    }

    public function destroy($id)
    {
        $file = File::findOrFail($id);

        if ($file->file_path && Storage::disk('public')->exists($file->file_path)) {
            Storage::disk('public')->delete($file->file_path);
        }

        $file->delete();

        return redirect()->back()->with('success', 'File berhasil dihapus!');
    }
}
