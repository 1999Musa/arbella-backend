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


// API routes (React will use this)
Route::get('/team-members', [TeamMemberController::class, 'apiIndex']);



Route::get('/contacthero', [ContactHeroController::class, 'apiIndex']);


Route::get('/community', [CommunitySectionController::class, 'apiIndex']);


Route::get('/clients', [ClientController::class, 'apiIndex']);


Route::get('/place-order', [PlaceOrderItemController::class, 'apiIndex']);



Route::get('/chooseimg', [ChooseHeroController::class, 'apiIndex']);


Route::get('/product-categories', [ProductCategoryController::class, 'apiIndex']);



Route::get('/hero-sliders', [HeroSliderController::class, 'apiIndex']);



Route::get('/factory', [FactoryController::class, 'apiIndex']);


Route::get('/excellence', [ExcellenceController::class, 'apiIndex']);


Route::get('/sustainabilities', [SustainabilityController::class, 'apiIndex']);




Route::get('/logo', [LogoController::class, 'apiIndex']);


Route::get('/product-sliders', [ProductSliderController::class, 'apiIndex']);



Route::get('/front-factory', [FrontFactoryController::class, 'apiIndex']);


Route::get('/certified-logos', [CertifiedLogoController::class, 'apiIndex']);


Route::get('/short-story-video', [ShortStoryVideoController::class, 'apiIndex']);


Route::get('/about-hero', [AboutHeroController::class, 'apiIndex']);