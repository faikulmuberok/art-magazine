<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;

// Public pages
Route::get('/', [PostController::class, 'publicIndex'])->name('home');
Route::get('/posts/{slug}', [PostController::class, 'publicShow'])->name('posts.show');
Route::get('/category/{slug}', [PostController::class, 'byCategory'])->name('category.show');
Route::get('/tag/{slug}', [PostController::class, 'byTag'])->name('tag.show');
Route::get('/search', [PostController::class, 'search'])->name('search');

// Admin CRUD (prefix + name grouping)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
});
