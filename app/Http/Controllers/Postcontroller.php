<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Post;

class PostController extends Controller
{
    // 投稿画面表示
    public function create(): View
    {
        return view('reviews.create');
    }


    public function store(Request $request): RedirectResponse
    {

        //投稿作成
        Post::create([
            'user_id'    => Auth::id(),
            'parent_id'  => $request['parent_id'] ?? null,
            'comment'    => $request['comment'],
            'evaluation' => $request['evaluation']
        ]);

        //リダイレクトやレスポンスを返す
        return redirect()->route('dashboard')->with('success', '投稿が完了しました！');
    }

    //ダッシュボードの表示
    public function index()
    {
        $reviews = Post::with('user')
            ->latest()
            ->get();

        return view('dashboard', compact('reviews'));
    }
}
