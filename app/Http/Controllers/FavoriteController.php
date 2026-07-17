<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use App\Models\Post;
use Illuminate\Http\Request;

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

        return redirect()
            ->route('dashboard')
            ->withFragment('review-' . $review->id);
    }


    // お気に入り解除
    // public function unfavorite(Post $review): RedirectResponse
    public function unfavorite(Request $request, Post $review)
    {
        Favorite::where('user_id', Auth::id())  // ログインしているユーザー
            ->where('post_id', $review->id)     // 登録解除したいポスト
            ->delete();

        // リクエスト元のURLを取得
        // $referer = $request->headers->get('referer');

        // もしURLにお気に入り一覧が含まれていたらJSONを返す
        if ($request->header('X-React') === 'favorite') {
            // if (str_contains($referer, 'favorite')) {
            return response()->json([
                'success' => true,
            ]);
        }

        // それ以外（ダッシュボードなど）は今まで通りリダイレクト
        return redirect()
            ->route('dashboard')
            ->withFragment('review-' . $review->id);
    }
}
