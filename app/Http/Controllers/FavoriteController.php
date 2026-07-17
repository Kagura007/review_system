<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;

class FavoriteController extends Controller
{
    // お気に入り登録
    public function favorite(Post $review): RedirectResponse
    {
        // DBで情報を追加
        // firstOrCreate()：  データがなければ作る、既にあれば何もしない
        Favorite::firstOrCreate([
            'user_id' => Auth::id(),
            'post_id' => $review->id,
        ]);

        return redirect()->route('dashboard');
    }


    // お気に入り解除
    public function unfavorite(Post $review): RedirectResponse
    {
        Favorite::where('user_id', Auth::id())  // ログインしているユーザー
            ->where('post_id', $review->id)     // 登録解除したいポスト
            ->delete();

        return redirect()->route('dashboard');
    }
}
