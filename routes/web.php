<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\PostController as UserPostController;


require __DIR__ . '/auth.php';

Route::middleware('auth')->prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/user', UserController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/post', PostController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');

});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/blog', [UserPostController::class, 'index'])->name('post.index');
Route::get('/{post}', [UserPostController::class, 'show'])->name('post.show');


