<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;

    protected $table = 'visitors';

    protected $fillable = [
        'ip_address',
        'user_agent',
        'visited_at',
        'page_url',
        'visitor_id',
    ];

    protected $casts = [
        'visited_at' => 'datetime',
    ];
}
