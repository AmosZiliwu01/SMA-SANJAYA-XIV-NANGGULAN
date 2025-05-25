<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';

    protected $fillable = ['name', 'gender', 'nip', 'mapel', 'photo',
                           'phone', 'address', 'date_of_birth'];
}
