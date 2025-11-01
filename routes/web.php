<?php

use Illuminate\Support\Facades\Route;

// ✅ Import all controllers
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
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;

// ✅ Default routes
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// ✅ Single unified admin route group
Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // Product & Category Management
        Route::resource('categories', AdminCategoryController::class);
        Route::resource('products', AdminProductController::class);

        // Other Admin Resources
        Route::resource('contacthero', ContactHeroController::class);
        Route::resource('community', CommunitySectionController::class);
        Route::resource('team-members', TeamMemberController::class);
        Route::resource('orders', PlaceOrderItemController::class)->only(['index', 'store', 'update', 'destroy']);
        Route::resource('order-steps', PlaceOrderItemController::class)->parameters(['order-steps' => 'order_step']);
        Route::resource('important-infos', PlaceOrderItemController::class)->parameters(['important-infos' => 'important_info']);
        Route::resource('place-order', PlaceOrderItemController::class);
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

        // Excellence
        Route::resource('excellence', ExcellenceController::class)
            ->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);

        // Custom route for removing excellence image
        Route::delete('excellence/{id}/remove-image', [ExcellenceController::class, 'removeImage'])
            ->name('excellence.removeImage');
    });
use Illuminate\Support\Facades\Mail;

Route::get('/test-mail', function () {
    Mail::raw('Browser test mail from Laravel', function ($msg) {
        $msg->to('yourpersonalemail@gmail.com')->subject('Test from browser');
    });
    return '✅ Mail sent!';
});

// ✅ Authentication routes
require __DIR__ . '/auth.php';
