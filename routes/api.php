<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\OrderController;

// API routes (React will use this)
Route::get('/team-members', [TeamMemberController::class, 'apiIndex']);

Route::get('/place-order', [OrderController::class, 'apiIndex']);