<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;

Route::get('/', [HomeController::class, 'getHome']);

Route::get('login', function () {
    return view('auth.login');
});
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['web'])->group(function () {
    Route::get('/register', function () {   
        return view('auth.register');
    });
});

Route::get('logout', function () {
    return 'Logout';
});


Route::get('category', [CategoryController::class, 'getIndex']);

Route::get('category/show/{id}', [CategoryController::class, 'getShow']);

Route::get('category/create', [CategoryController::class, 'getCreate']);

Route::get('category/edit/{id}', [CategoryController::class, 'getEdit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
