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
            'nip' => $row['NIP'],
            'name' => $row['Nama'],
            'phone' => $row['No HP'],
            'address' => $row['Tempat Lahir'],
            'date_of_birth' =>
                @Carbon::createFromFormat('d/m/Y', $row['Tanggal Lahir'])
                    ?: (@Carbon::createFromFormat('d-m-Y', $row['tanggal_lahir'])
                    ?: (@Carbon::createFromFormat('Y-m-d', $row['tanggal_lahir'])
                        ?: null)),
            'gender' => $row['Jenis Kelamin'][0],
            'mapel' => $row['Mata Pelajaran'],
        ]);
    }
}
