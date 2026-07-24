<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\FollowerController;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [PostController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Breezeのユーザー情報編集
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //投稿画面 http://localhost:8080/review_system/public/reviews/create
    //フォームのpost.idを受け取りコメントモードに分岐
    Route::get('/reviews/create/{id}', [PostController::class, 'create'])->name('reviews.create');
    //フォームのpost受け取り
    Route::post('/post/store', [PostController::class, 'store'])->name('post.store');

    // ユーザ プロフィールページ
    Route::get('/user_profile/show/{id}', [UserProfileController::class, 'show'])->name('user_profile.show');

    // フォロー
    Route::post('/follow/{id}', [FollowerController::class, 'follow'])->name('follow');
    // フォロー解除
    Route::post('/unfollow/{id}', [FollowerController::class, 'unfollow'])->name('unfollow');

    // お気に入り登録  reviewはオブジェクトのまま使える
    Route::post('/favorite/{review}', [FavoriteController::class, 'favorite'])->name('favorite');
    // お気に入り解除  reviewはオブジェクトのまま使える
    Route::delete('/unfavorite/{review}', [FavoriteController::class, 'unfavorite'])->name('unfavorite');

    // 投稿削除
    Route::delete('/reviews/{review}', [PostController::class, 'destroy'])
        ->name('reviews.destroy');

    // ガイド画面
    Route::view('/guide', 'guide')->name('guide');
});


require __DIR__ . '/auth.php';
