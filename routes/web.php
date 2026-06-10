<?php

use App\Http\Controllers\CategoryWebController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/categories', CategoryWebController::class);


