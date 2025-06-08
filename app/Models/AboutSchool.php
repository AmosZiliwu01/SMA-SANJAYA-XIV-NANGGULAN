<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AboutSchool extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'background_image',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Scope to get only active about sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get the current active about section
     */
    public static function getCurrent()
    {
        return static::where('is_active', true)->first();
    }
}
