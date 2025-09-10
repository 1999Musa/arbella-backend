<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = ['title', 'description', 'hero_image', 'images'];

    protected $casts = [
        'images' => 'array', // auto cast JSON to array
    ];
}
