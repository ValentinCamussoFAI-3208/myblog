<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;

Route::get('/', [HomeController::class, 'getHome'])->name('welcome');

// ruotes de categoria
Route::get('category', [CategoryController::class, 'getCategories']);

Route::get('category/{id}', [CategoryController::class, 'getIndex'])->name('category.show');

Route::get('category/{categoryID}/show/{postId}', [CategoryController::class, 'getShow']);

Route::get('category/{id}/create', [CategoryController::class, 'getCreate'])->middleware('auth');

Route::post('category/{id}/post', [CategoryController::class, 'storePost'])->name('category.storePost');

// Rutas para ver, editar y eliminar publicaciones
Route::get('myPosts', [PostController::class, 'getMyPosts'])->name('myPosts.index')->middleware('auth');
Route::get('myPosts/{id}/edit', [PostController::class, 'edit'])->name('myPosts.edit')->middleware('auth');
Route::put('myPosts/{id}', [PostController::class, 'update'])->name('myPosts.update');
Route::delete('myPosts/{id}', [PostController::class, 'destroy'])->name('myPosts.destroy');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

