<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\Home\HomeController;
use App\Http\Controllers\Site\Product\ProductController;
use App\Http\Controllers\Site\Organization\AboutUsController;
use App\Http\Controllers\Site\Organization\ContactController;


// Route::get('/', function () {
//     return view('site.test');
// });

Route::resource('/', HomeController::class);
Route::resource('product', ProductController::class);
Route::resource('contact', ContactController::class);
Route::resource('aboutus', AboutUsController::class);

Route::get('product-by-category/{category}', [ProductController::class, 'productByCategory']);
