<?php

namespace App\Exports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class StudentExport implements FromView, ShouldAutoSize, WithTitle
{
    public function view(): View
    {
        $students = Student::orderBy('created_at', 'desc')->get();

        return view('backend.student.export_table', [
            'students' => $students
        ]);
    }

    public function title(): string
    {
        return 'Data Student';
    }
}
