<?php

namespace App\Http\Controllers\backend;

use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('class')->get();
        $classes = Classes::all();
        return view('backend.student.index', compact('students', 'classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classes = Classes::all();
        return view('backend.student.create', compact('classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nis' => ['required', 'string', 'max:255', 'unique:students,nis'],
            'name' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'in:L,P'],
            'class_id' => ['required', 'exists:classes,id'],
            'photo' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'],
        ]);

        // Simpan file foto jika ada
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('photos/students', 'public');
        }

        // Simpan ke database
        Student::create($validated);

        // Redirect dengan notifikasi
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        $student->update($request->all());
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('student.index')->with('success', 'Data siswa berhasil dihapus.');
    }

    public function export()
    {
        try {
            return Excel::download(new StudentExport, 'student.xlsx');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal mengekspor data: ' . $e->getMessage());
        }
    }

    // public function import(Request $request)
    // {
    //     try {
    //         $file = $request->file('file-import');
    //         $nameFile = $file->getClientOriginalName();
    //         $file->move('Data Guru', $nameFile);

    //         Excel::import(new TeacherImport, public_path('/Data Guru/'.$nameFile));
    //         return redirect()->back()->with('success', 'Data berhasil diimport');

    //     } catch (\Exception $e) {
    //         return redirect()->back()->with('error', 'Data tidak sesuai, silakan periksa format file');
    //     }
    // }
}
