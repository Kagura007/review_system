<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\Post;


class PostController extends Controller
{
    // 投稿画面切り替え表示
    public function create($id): View
    {
        if ($id > -1) {  // $id：URLから受け取った値、「-1」は新規レビュー、整数ならコメントid
            $review = Post::with('user')->find($id);  // $post：レビューのデータ

            if (!$review) {
                abort(404);
            }
        } else {
            $review = null;
        }

        return view('reviews.create', compact('review'));
    }


    // 投稿保存
    public function store(Request $request): RedirectResponse
    {
        // 投稿制限10回まで
        $count = Post::where('user_id', Auth::id())->count();

        if ($count >= 10) {
            return back()->with('error', 'デモサイトのため、コメントを含め投稿は10件までです。');
        }

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

        // NGワード
        $ngWords = [
            '死',
            '殺',
            'ばか',
            'バカ',
            '馬鹿',
            'アホ',
            'くたばれ',
            'うんち',
            '糞',
        ];

        foreach ($ngWords as $word) {
            if (str_contains($request->comment, $word)) {
                return back()
                    ->withInput()
                    ->withErrors([
                        'comment' => '使用できない言葉が含まれています。'
                    ]);
            }
        }

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


    // 投稿削除
    public function destroy($id): RedirectResponse
    {
        $post = Post::findOrFail($id);

        // 本人以外が削除できない
        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $post->delete();

        return redirect()->route('user_profile.show', $post->user_id)
            ->with('success', '投稿を削除しました');
    }


    // 投稿編集
    public function edit($id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        return view('reviews.edit', compact('post'));
    }


    // 更新処理
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);

        if ($post->user_id !== Auth::id()) {
            abort(403);
        }

        $request->validate([
            'comment' => ['required', 'string', 'max:1000'],
            'evaluation' => ['required', 'integer']
        ]);

        $post->update([
            'comment' => $request->comment,
            'evaluation' => $request->evaluation,
        ]);

        return redirect()
            ->route('user_profile.show', Auth::id())
            ->with('success', '投稿を編集しました');
    }
}
