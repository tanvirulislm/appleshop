<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\PolicyController;
use App\Http\Middleware\TokenAuthenticate;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\InvoiceController;
use Doctrine\Common\Lexer\Token;

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


// User Auth
Route::get('/UserLogin/{UserEmail}', [UserController::class, 'UserLogin']);
Route::get('/VerifyLogin/{UserEmail}/{otp}', [UserController::class, 'VerifyLogin']);
Route::get('/Logout', [UserController::class, 'Logout']);


// Token authenticate middleware group
Route::middleware(TokenAuthenticate::class)->group(function () {
    // Customer Profile
    Route::post('/CreateProfile', [CustomerController::class, 'CreateProfile']);
    Route::get('/ReadProfile', [CustomerController::class, 'ReadProfile']);

    // Review
    Route::post('/CreateProductReview', [ProductController::class, 'CreateProductReview']);


    // WhishList
    Route::get('/ProductWishList', [ProductController::class, 'ProductWishList']);
    Route::get('/CreateWishList/{product_id}', [ProductController::class, 'CreateWishList']);
    Route::get('/RemoveWishList/{product_id}', [ProductController::class, 'RemoveWishList']);


    // Product Cart
    Route::post('/CreateCartList', [ProductController::class, 'CreateCartList']);
    Route::get('/CartList', [ProductController::class, 'CartList']);
    Route::get('/DeleteCartList/{product_id}', [ProductController::class, 'DeleteCartList']);

    // Invoice
    Route::get('/InvoiceCreate', [InvoiceController::class, 'InvoiceCreate']);
    Route::get('/InvoiceList', [InvoiceController::class, 'InvoiceList']);
    Route::get('/InvoiceProductList/{invoice_id}', [InvoiceController::class, 'InvoiceProductList']);
});

// Payment Status
Route::post('/PaymentSuccess', [InvoiceController::class, 'PaymentSuccess']);
Route::post('/PaymentCancel', [InvoiceController::class, 'PaymentCancel']);
Route::post('/PaymentFail', [InvoiceController::class, 'PaymentFail']);
Route::post('/PaymentIPN', [InvoiceController::class, 'PaymentIPN']);
