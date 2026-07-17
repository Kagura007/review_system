<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;

class FavoriteController extends Controller
{
    public function favorite(Post $review): RedirectResponse
    {

        // お気に入り登録
        // クリエイトするテーブル
        Favorite::create([
            'user_id' => Auth::id(),
            'post_id' => $review->id,
        ]);

        return redirect()
            ->route('dashboard')
            ->with('success', 'お気に入りに登録しました');
    }
}
