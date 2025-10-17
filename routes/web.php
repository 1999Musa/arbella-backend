<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PlaceOrderItemController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\FactoryController;
use App\Http\Controllers\Admin\SustainabilityController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ProductSliderController;
use App\Http\Controllers\Admin\FrontFactoryController;
use App\Http\Controllers\Admin\CertifiedLogoController;
use App\Http\Controllers\Admin\ShortStoryVideoController;
use App\Http\Controllers\Admin\AboutHeroController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ChooseHeroController;
use App\Http\Controllers\Admin\ExcellenceController;
use App\Http\Controllers\Admin\CommunitySectionController;
use App\Http\Controllers\Admin\ContactHeroController;



route::get('/', function () {
    return ['Laravel' => app()->version()];
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('contacthero', ContactHeroController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('community', CommunitySectionController::class);
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('team-members', TeamMemberController::class);
});

// route::get('/dashboard', [App\Http\Controllers\TeamMemberController::class, 'index']);
// Route::prefix('admin')->group(function () {
//     Route::get('/team-members', [TeamMemberController::class, 'index'])->name('admin.team-members.index');
//     Route::get('/team-members/create', [TeamMemberController::class, 'create'])->name('admin.team-members.create');
//     Route::post('/team-members', [TeamMemberController::class, 'store'])->name('admin.team-members.store');
//     Route::get('/team-members/{id}/edit', [TeamMemberController::class, 'edit'])->name('admin.team-members.edit');
//     Route::put('/team-members/{id}', [TeamMemberController::class, 'update'])->name('admin.team-members.update');
//     Route::delete('/team-members/{id}', [TeamMemberController::class, 'destroy'])->name('admin.team-members.destroy');
// });

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




Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('factory', FactoryController::class);
});




Route::prefix('admin')->name('admin.')->group(function () {

    // Custom image removal routes **before** resource
    Route::delete('sustainability/{sustainability}/remove-hero', [SustainabilityController::class, 'removeHeroImage'])
        ->name('sustainability.removeHero');

    Route::delete('sustainability/{sustainability}/remove-image', [SustainabilityController::class, 'removePillarImage'])
        ->name('sustainability.removeImage');

    // Resource route
    Route::resource('sustainability', SustainabilityController::class);
});




Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('logo', LogoController::class);
    Route::delete('logo/{logo}/remove-image', [LogoController::class, 'removeImage'])->name('logo.removeImage');
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('product-sliders', ProductSliderController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('front-factory', FrontFactoryController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('certified-logos', CertifiedLogoController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('short-story', ShortStoryVideoController::class);
});



Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('about-hero', AboutHeroController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('clients', ClientController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('chooseimg', ChooseHeroController::class);
});


Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('excellence', ExcellenceController::class)->only(['index', 'create', 'store', 'edit', 'update']);
});