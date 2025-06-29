<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = ['nis', 'name', 'gender', 'class_id', 'entry_year', 'photo'];

    public function class (): BelongsTo{
        return $this->belongsTo(Classes::class, 'class_id', 'id');
    }
}
