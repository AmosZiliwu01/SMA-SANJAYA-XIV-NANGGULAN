<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;

    protected $table = 'agendas';

    protected $fillable = [
        'name', 'description', 'start_date', 'end_date', 'place', 'time', 'note', 'author', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
