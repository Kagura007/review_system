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


# 2026/07/13  current :,  day 5:00,  total 5:00

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
