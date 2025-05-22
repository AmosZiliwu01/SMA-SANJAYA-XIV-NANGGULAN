<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;

    protected $table = 'albums';

    protected $fillable = ['name', 'user_id', 'author', 'photo_count', 'cover_photo'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
