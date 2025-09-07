<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStep extends Model
{
    protected $fillable = ['step', 'title', 'description'];
}

