<?php

namespace App\Http\Controllers\backend;

use App\Exports\TeacherExport;
use App\Http\Controllers\Controller;
use App\Imports\TeacherImport;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::paginate(5);
        return view('backend.teacher.index', compact('teachers'));
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:2',
                'nip' => 'required|string|max:20|unique:teachers,nip',
                'mapel' => 'nullable|string|max:255',
                'phone' => 'nullable|string|max:15',
                'address' => 'required|string|max:500',
                'date_of_birth' => 'required|date',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = null;
            if ($request->hasFile('photo')) {
                $imageName = time().'.'.$request->photo->extension();
                $request->file('photo')->storeAs('public/teachers', $imageName);
            }

            Teacher::create([
                'name' => $validate['name'],
                'gender' => $validate['gender'],
                'nip' => $validate['nip'],
                'mapel' => $validate['mapel'],
                'phone' => $validate['phone'],
                'address' => $validate['address'],
                'date_of_birth' => $validate['date_of_birth'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Menambahkan guru baru: ' . $request->name);

            return redirect()->route('teachers.index')->with('success', 'Data guru berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Teacher $teacher)
    {
        try {
            $validate = $request->validate([
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:2',
                'nip' => 'nullable|string|max:20|unique:teachers,nip,' . $teacher->id,
                'mapel' => 'required|string|max:255',
                'phone' => 'required|string|max:15',
                'address' => 'required|string|max:500',
                'date_of_birth' => 'required|date',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $teacher->photo;

            if ($request->hasFile('photo')) {
                if ($teacher->photo && Storage::exists('public/teachers/' . $teacher->photo)) {
                    Storage::delete('public/teachers/' . $teacher->photo);
                }

                $imageName = time() . '.' . $request->photo->extension();
                $request->file('photo')->storeAs('public/teachers', $imageName);
            }

            $teacher->update([
                'name' => $validate['name'],
                'gender' => $validate['gender'],
                'nip' => $validate['nip'] ?? $teacher->nip,
                'mapel' => $validate['mapel'],
                'phone' => $validate['phone'],
                'address' => $validate['address'],
                'date_of_birth' => $validate['date_of_birth'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Memperbarui data guru: ' . $teacher->name);

            return redirect()->route('teachers.index')->with('success', 'Data guru berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            if ($teacher->photo) {
                Storage::disk('public')->delete('teachers/' . $teacher->photo);
            }

            $teacher->delete();

            $this->logActivity('Menghapus data guru: ' . $teacher->name);

            return redirect()->route('teachers.index')->with('success', 'Data guru berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function export()
    {
        try {
            return Excel::download(new TeacherExport, 'teachers.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }

    public function import(Request $request)
    {
        try {
            $file = $request->file('file-import');
            $nameFile = $file->getClientOriginalName();
            $file->move('Data Guru', $nameFile);

            Excel::import(new TeacherImport, public_path('/Data Guru/'.$nameFile));
            // Log activity
            $this->logActivity('Mengimpor data guru dari file: ' . $nameFile);
            return redirect()->back()->with('success', 'Data berhasil diimport');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data tidak sesuai, silakan periksa format file');
        }
    }
}
