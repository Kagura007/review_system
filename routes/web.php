<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//投稿画面 http://localhost:8080/review_system/public/reviews/create
Route::get('/reviews/create', [PostController::class, 'create'])->name('reviews.create');

//フォームのpost受け取り
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');



require __DIR__ . '/auth.php';
