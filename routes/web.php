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



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard'); // Create this view if not existing
})->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('contacthero', ContactHeroController::class);
    Route::resource('community', CommunitySectionController::class);
    Route::resource('team-members', TeamMemberController::class);
    Route::resource('orders', PlaceOrderItemController::class)->only(['index', 'store', 'update', 'destroy']);
    Route::resource('order-steps', PlaceOrderItemController::class)->parameters(['order-steps' => 'order_step']);
    Route::resource('important-infos', PlaceOrderItemController::class)->parameters(['important-infos' => 'important_info']);
    Route::resource('place-order', PlaceOrderItemController::class);
    Route::resource('reasons', ReasonController::class);
    Route::resource('product-categories', ProductCategoryController::class);
    Route::resource('hero-sliders', HeroSliderController::class);
    Route::resource('factory', FactoryController::class);
    Route::resource('sustainability', SustainabilityController::class);
    Route::resource('logo', LogoController::class);
    Route::resource('product-sliders', ProductSliderController::class);
    Route::resource('front-factory', FrontFactoryController::class);
    Route::resource('certified-logos', CertifiedLogoController::class);
    Route::resource('short-story', ShortStoryVideoController::class);
    Route::resource('about-hero', AboutHeroController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('chooseimg', ChooseHeroController::class);
    Route::resource('excellence', ExcellenceController::class)->only(['index', 'create', 'store', 'edit', 'update']);
});


require __DIR__.'/auth.php';