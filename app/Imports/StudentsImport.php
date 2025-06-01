<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class StudentsImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Bersihkan data: trim spasi, biar rapi
        $nis      = trim($row['nis'] ?? '');
        $name     = trim($row['name'] ?? '');
        $gender   = trim($row['gender'] ?? '');
        $class_id = trim($row['class_id'] ?? '');
        $photo    = trim($row['photo'] ?? '');

        // Validasi sederhana (jangan simpan data kosong)
        if (empty($nis) || empty($name)) {
            return null; // skip baris ini
        }

        // Simpan data baru
        return new Student([
            'nis'      => $nis,
            'name'     => $name,
            'gender'   => $gender,
            'class_id' => $class_id,
            'photo'    => $photo
        ]);
    }
}
