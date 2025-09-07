<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ImportantInfo extends Model
{
    protected $fillable = ['title', 'list_items'];

    protected $casts = [
        'list_items' => 'array', // auto-cast JSON to array
    ];
}

