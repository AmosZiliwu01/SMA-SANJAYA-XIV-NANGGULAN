<?php

namespace App\Http\Controllers\backend;

use App\Exports\StudentExport;
use App\Http\Controllers\Controller;

use App\Imports\StudentsImport;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::paginate(5);
        $classes = Classes::all();
        return view('backend.student.index', compact('students', 'classes'));
    }

    public function store(Request $request)
    {
        try {
            $validate = $request->validate([
                'nis' => 'required|string|max:255|unique:students,nis',
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:2',
                'class_id' => 'required|numeric',
                'entry_year' => 'required|date_format:Y',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = null;
            if ($request->hasFile('photo')) {
                $imageName = time().'.'.$request->photo->extension();
                $request->file('photo')->storeAs('public/students', $imageName);
            }

            Student::create([
                'nis' => $validate['nis'],
                'name' => $validate['name'],
                'gender' => $validate['gender'],
                'class_id' => $validate['class_id'],
                'entry_year' => $validate['entry_year'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Menambahkan data siswa baru: ' . $request->name);

            return redirect()->route('students.index')->with('success', 'Data siswa berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
    }

    public function update(Request $request, Student $student)
    {
        try {
            $validate = $request->validate([
                'nis' => 'required|string|max:255|unique:students,nis,' . $student->id,
                'name' => 'required|string|max:255',
                'gender' => 'required|string|max:2',
                'class_id' => 'required|numeric',
                'entry_year' => 'required|date_format:Y',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            $imageName = $student->photo;

            if ($request->hasFile('photo')) {
                if ($student->photo && Storage::exists('public/students/' . $student->photo)) {
                    Storage::delete('public/students/' . $student->photo);
                }
                $imageName = time() . '.' . $request->photo->extension();
                $request->file('photo')->storeAs('public/students', $imageName);
            }

            $student->update([
                'nis' => $validate['nis'],
                'name' => $validate['name'],
                'gender' => $validate['gender'],
                'class_id' => $validate['class_id'],
                'entry_year' => $validate['entry_year'],
                'photo' => $imageName,
            ]);

            $this->logActivity('Memperbarui data siswa: ' . $student->name);

            return redirect()->route('students.index')->with('success', 'Data siswa berhasil diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui data: ' . $e->getMessage());
        }
    }

    public function destroy(Student $student)
    {
        try {
            if ($student->photo) {
                Storage::disk('public')->delete('students/' . $student->photo);
            }

            $student->delete();

            $this->logActivity('Menghapus data siswa: ' . $student->name);

            return redirect()->back()->with('success', 'Data siswa berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }

    public function export()
    {
        try {
            return Excel::download(new StudentExport, 'students.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }
    public function import(Request $request)
    {
        try {
            $file = $request->file('file-import');
            $nameFile = $file->getClientOriginalName();
            $file->move('Data Siswa', $nameFile);

            Excel::import(new StudentsImport, public_path('/Data Siswa/' . $nameFile));

            // Log activity
            $this->logActivity('Mengimpor data siswa dari file: ' . $nameFile);
            return redirect()->back()->with('success', 'Data berhasil diimport');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Data tidak sesuai, silakan periksa format file');
        }
    }

}

