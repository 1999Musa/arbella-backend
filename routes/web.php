<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PlaceOrderItemController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\HeroSliderController;




route::get('/', function () {
    return ['Laravel' => app()->version()];
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('team-members', TeamMemberController::class);
});

// route::get('/dashboard', [App\Http\Controllers\TeamMemberController::class, 'index']);
Route::prefix('admin')->group(function () {
    Route::get('/team-members', [TeamMemberController::class, 'index'])->name('admin.team-members.index');
    Route::get('/team-members/create', [TeamMemberController::class, 'create'])->name('admin.team-members.create');
    Route::post('/team-members', [TeamMemberController::class, 'store'])->name('admin.team-members.store');
    Route::get('/team-members/{id}/edit', [TeamMemberController::class, 'edit'])->name('admin.team-members.edit');
    Route::put('/team-members/{id}', [TeamMemberController::class, 'update'])->name('admin.team-members.update');
    Route::delete('/team-members/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');
});

Route::prefix('admin')->group(function () {
    Route::resource('orders', PlaceOrderItemController::class)->only(['index', 'store', 'update', 'destroy']);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('order-steps', PlaceOrderItemController::class)->parameters([
        'order-steps' => 'order_step'
    ]);

    Route::resource('important-infos', PlaceOrderItemController::class)->parameters([
        'important-infos' => 'important_info'
    ]);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('place-order', PlaceOrderItemController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('reasons', \App\Http\Controllers\Admin\ReasonController::class);
});




Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product-categories', ProductCategoryController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('hero-sliders', HeroSliderController::class);
});
