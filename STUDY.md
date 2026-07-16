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


# 2026/07/14  current ,  day 4:30,  total 14:50,  total-day 3

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


# 次回：口コミ投稿サービスの開発（タイムラインの実装）③ の確認から


# 2026/07/15  current ,  day 5:25,  total 20:15,  total-day 4

プロフィールページの「レビュー一覧」は 『そのユーザーが投稿したレビュー一覧』

## 用語の説明

### hasMany()
指定したものが複数のものを持っているときに持っているものを取得してくる
例）そのユーザーの投稿すべて

### belongsTo()
「私はこのユーザーの投稿です」
所属するユーザーは1人

### Post::with
関連性のあるものを一緒にとってくる
N+1 問題の解消になる

### is_null
php では使うが、Laravelでよく使うのは
($post === null)
(!$post)

### Blueprint
Blueprint は Laravel のデータベースの設計図を書くためのクラス

名前そのままで、英語の blueprint = 設計図 という意味。 

### onDelete('cascade')
「親のデータが削除されたら、子のデータも一緒に削除する」

cascade： 小さな滝、連なって流れ落ちるもの

### unsignedBigInteger()
カラムの型を指定 BigInteger 大きな整数

### nullable()
このカラムはNULL（値なし）を許可します


# 次回：口コミ投稿サービスの開発（フォロー機能の実装）② の解説視聴から


# 2026/07/16  current 17:50,  day :,  total 20:15,  total-day 5

## 用語の説明

### findOrFail
「IDで探して、なければ404エラーにする」

### constrained()
「このカラムは、別のテーブルのidを参照する外部キーです」とLaravelに自動で設定してもらう記述





# 次回：口コミ投稿サービスの開発（フォロー機能の実装）◆ の解説視聴から


# 2026/07/17  current ,  day :,  total :,  total-day 6
