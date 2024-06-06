<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});

Route::get('logout', function () {
    return 'Logout';
});


Route::get('category', [CategoryController::class, 'getIndex']);

Route::get('category/show/{id}', [CategoryController::class, 'getShow']);

Route::get('category/create', [CategoryController::class, 'getCreate']);

Route::get('category/edit/{id}', [CategoryController::class, 'getEdit']);