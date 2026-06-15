<?php

use App\Http\Controllers\CategoryWebController;
use App\Http\Controllers\ProductWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/categories', CategoryWebController::class);
Route::resource('/products', ProductWebController::class);


