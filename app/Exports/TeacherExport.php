<?php

namespace App\Exports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;

class TeacherExport implements FromView, ShouldAutoSize, WithTitle
{
    public function view(): View
    {
        $teachers = Teacher::orderBy('created_at', 'desc')->get();

        return view('backend.teacher.export_table', [
            'teachers' => $teachers
        ]);
    }

    public function title(): string
    {
        return 'Data Guru';
    }
}
