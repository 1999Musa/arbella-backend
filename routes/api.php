<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PlaceOrderItemController;
use App\Http\Controllers\Admin\ReasonController;


// API routes (React will use this)
Route::get('/team-members', [TeamMemberController::class, 'apiIndex']);


Route::get('/place-order', [PlaceOrderItemController::class, 'apiIndex']);



Route::get('/reasons', [ReasonController::class, 'apiIndex']);