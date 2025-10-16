<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'images',
        'product_name',
        'product_code',
        'moq',
        'fob'
    ];

    protected $casts = [
        'images' => 'array', // auto cast JSON to array
    ];
}
