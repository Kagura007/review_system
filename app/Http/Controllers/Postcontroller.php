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
    public function create($id): View
    {
        if ($id > -1) {  // $id：URLから受け取った値、「-1」は新規レビュー、整数ならコメントid
            $post = Post::with('user')->find($id);  // $post：レビューのデータ

            if (!$post) {
                abort(404);
            }
        } else {
            $post = null;
        }

        return view('reviews.create', compact('post'));
    }


    public function store(Request $request): RedirectResponse
    {
        // バリデーション
        $request->validate(
            [
                'comment'    => ['required', 'string', 'max:1000'],
                'evaluation' => ['required', 'integer']
            ],
            [
                'comment.required'    => '投稿内容を入力してください',
                'evaluation.required' => '評価をせんたくしてください'
            ]
        );

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
        $reviews = Post::with(['user', 'reply'])
            ->whereNull('parent_id')
            ->latest()  //= ORDER BY created_at DESC
            ->get();

        return view('dashboard', compact('reviews'));
    }
}
