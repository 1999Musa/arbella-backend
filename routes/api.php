<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\PlaceOrderItemController;
use App\Http\Controllers\Admin\ReasonController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\HeroSliderController;
use App\Http\Controllers\Admin\FactoryController;
use App\Http\Controllers\Admin\SustainabilityController;
use App\Http\Controllers\Admin\CommunityController;
use App\Http\Controllers\Admin\LogoController;
use App\Http\Controllers\Admin\ProductSliderController;
use App\Http\Controllers\Admin\FrontFactoryController;
use App\Http\Controllers\Admin\CertifiedLogoController;
use App\Http\Controllers\Admin\ShortStoryVideoController;



// API routes (React will use this)
Route::get('/team-members', [TeamMemberController::class, 'apiIndex']);


Route::get('/place-order', [PlaceOrderItemController::class, 'apiIndex']);



Route::get('/reasons', [ReasonController::class, 'apiIndex']);


Route::get('/product-categories', [ProductCategoryController::class, 'apiIndex']);



Route::get('/hero-sliders', [HeroSliderController::class, 'apiIndex']);



Route::get('/factory', [FactoryController::class, 'apiIndex']);



Route::get('/sustainabilities', [SustainabilityController::class, 'apiIndex']);



Route::get('/communities', [CommunityController::class, 'apiIndex']);



Route::get('/logo', [LogoController::class, 'apiIndex']);


Route::get('/product-sliders', [ProductSliderController::class, 'apiIndex']);



Route::get('/front-factory', [FrontFactoryController::class, 'apiIndex']);


Route::get('/certified-logos', [CertifiedLogoController::class, 'apiIndex']);


Route::get('/short-story-video', [ShortStoryVideoController::class, 'apiIndex']);