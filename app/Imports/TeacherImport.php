<?php

namespace App\Imports;

use App\Models\Teacher;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Support\Carbon;

class TeacherImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        return new Teacher([
            'nip' => $row['nip'],
            'name' => $row['nama'],
            'phone' => $row['no_hp'],
            'address' => $row['tempat_lahir'],
            'date_of_birth' =>
                @Carbon::createFromFormat('d/m/Y', $row['tanggal_lahir'])
                    ?: (@Carbon::createFromFormat('d-m-Y', $row['tanggal_lahir'])
                    ?: (@Carbon::createFromFormat('Y-m-d', $row['tanggal_lahir'])
                        ?: null)),
            'gender' => $row['jenis_kelamin'][0],
            'mapel' => $row['mata_pelajaran'],
        ]);
    }
}
