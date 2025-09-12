<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'hero_image',
        'images',
    ];

    protected $casts = [
        'images' => 'array', // cast images JSON to array
    ];
}
