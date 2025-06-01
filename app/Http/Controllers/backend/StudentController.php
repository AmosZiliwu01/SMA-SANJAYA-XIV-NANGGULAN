<?php

namespace App\Http\Controllers\backend;

use App\Exports\StudentExport;
use App\Http\Controllers\Controller;
use App\Imports\StudentsImport;
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
        $students = Student::paginate(5);
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

    public function import(Request $request)
    {
        // Validasi file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls'
        ], [
            'file.required' => 'File Excel wajib diunggah.',
            'file.mimes' => 'Hanya menerima file Excel (.xlsx atau .xls).'
        ]);

        try {
            // Ambil file
            $file = $request->file('file');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('uploads/students'), $fileName);

            // Load data Excel sebagai array
            $data = \Excel::toArray([], public_path('uploads/students/' . $fileName));
            $rows = $data[0] ?? [];

            // Cek apakah ada data
            if (empty($rows) || count($rows) < 2) {
                return redirect()->back()->with('error', 'File Excel kosong atau tidak sesuai.');
            }

            // Validasi header
            $expectedHeaders = ['nis', 'name', 'gender', 'class_id', 'photo'];
            $headers = array_map('strtolower', $rows[0]);
            foreach ($expectedHeaders as $header) {
                if (!in_array($header, $headers)) {
                    return redirect()->back()->with('error', 'Data tidak sesuai. Pastikan format header benar!');
                }
            }

            // Ambil index masing-masing kolom
            $headerIndexes = array_flip($headers);

            // Validasi data & ambil NIS
            $nises = [];
            foreach ($rows as $key => $row) {
                // Skip header
                if ($key === 0) continue;

                $nis = trim($row[$headerIndexes['nis']] ?? '');
                $name = trim($row[$headerIndexes['name']] ?? '');
                $gender = trim($row[$headerIndexes['gender']] ?? '');
                $class_id = trim($row[$headerIndexes['class_id']] ?? '');

                if (empty($nis) || empty($name) || empty($gender) || empty($class_id)) {
                    return redirect()->back()->with('error', 'Data tidak lengkap! Pastikan semua kolom terisi.');
                }

                $nises[] = $nis;
            }

            // Cek data duplikat di database
            $exists = Student::whereIn('nis', $nises)->exists();
            if ($exists) {
                return redirect()->back()->with('error', 'Data sudah ada, silahkan tambahkan data lain.');
            }

            // Jalankan import
            Excel::import(new StudentsImport, public_path('uploads/students/' . $fileName));

            return redirect()->back()->with('success', 'Data siswa berhasil diimpor!');
        } catch (\Exception $e) {
            //debug error
            \Log::error('Import Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Gagal import data siswa. Periksa format file!');
        }
    }
}

