# 2026/07/12  day 5:00,  total 5:00

## おすすめディレクトリ構成
views/
├── auth/
│   ├── login.blade.php
│   └── register.blade.php
├── dashboard/
├── reviews/
└── profile/


scss/
├── project/
│   ├── _auth.scss
│   ├── _dashboard.scss
│   ├── _review.scss
│   └── _profile.scss


# 次回：口コミ投稿サービスの開発（投稿機能の実装）② から視聴


# 2026/07/13  current :,  day 5:20,  total 10:20,  total-day 2

## POST通信で来たリクエストを受け取る

### <form action="{{ route('posts.store') }}">
posts.store という名前のルートを探す

### Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

->name('posts.store')
    ルートに名前を付けている
    結果： <form action="/posts" method="POST">

'/posts': 送信先のURL 
    フォーム側：<form action="/posts" method="POST">
    
[PostController::class, 'store']
    PostControllerのstoreメソッドを実行


# 次回：タイムラインの grid から作業


# 次回：口コミ投稿サービスの開発（タイムラインの実装）① の確認から


# 2026/07/14  current 13:26,  day :,  total 10:20,  total-day 3

## 多言語対応 
記述：{{ __('投稿します') }}
結果：echo __('投稿します');

これは Laravelの翻訳（多言語対応）機能 を使った書き方です。
__() の意味
__() は「翻訳してください」という関数です。

1.__('投稿します')
    → 「投稿します」という文字列を取得（翻訳）
2{{ }}
    → HTMLエスケープして画面に表示

## app.blade.php が取得してる言語
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
Laravel に設定されている言語を取得してくれる
※ユーザーの環境を取ってきてくれるわけではない

