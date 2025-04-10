<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


// BrandList
Route::get('/BrandList', [BrandController::class, 'BrandList']);

// CategoryList
Route::get('/CategoryList', [CategoryController::class, 'CategoryList']);

// ProductList
Route::get('/ListProductByCategory/{id}', [ProductController::class, 'ListProductByCategory']);
Route::get('/ListProductByBrand/{id}', [ProductController::class, 'ListProductByBrand']);
Route::get('/ListProductByRemark/{remark}', [ProductController::class, 'ListProductByRemark']);

// Slider
Route::get('/ListProductSlider', [ProductController::class, 'ListProductSlider']);

// ProductDetails
Route::get('/ProductDetailsById/{id}', [ProductController::class, 'ProductDetailsById']);
Route::get('/ListReviewByProduct/{product_id}', [ProductController::class, 'ListReviewByProduct']);

// Policy
Route::get('/PolicyByType/{type}', [PolicyController::class, 'PolicyByType']);
