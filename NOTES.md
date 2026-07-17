# Access -- アクセス --

## Root
http://localhost:8080/review_system/

## ダッシュボード
http://localhost:8080/review_system/public/dashboard

## 口コミ投稿フォーム
http://localhost:8080/review_system/public/reviews/create/-1

## コメント投稿フォーム
http://localhost:8080/review_system/public/reviews/create/{id}

## プロフィールページ（仮）
http://localhost:8080/review_system/public/user_profile/show/1



# Structure -- 構造 --

## View
\review_system\resources\views\reviews

### ダッシュボード
C:\xampp\htdocs\review_system\resources\views\dashboard.blade.php
#### タイムライン表示
C:\xampp\htdocs\review_system\resources\views\reviews\_timeline.blade.php
#### コメント表示
C:\xampp\htdocs\review_system\resources\views\reviews\_review_comments.blade.php

### フォーム
C:\xampp\htdocs\review_system\resources\views\reviews\create.blade.php
#### レビュー投稿フォーム
C:\xampp\htdocs\review_system\resources\views\reviews\_form.blade.php
#### コメント投稿フォーム（※投稿フォームとデザインが違ったため、別ファイルにしています）
C:\xampp\htdocs\review_system\resources\views\reviews\_comment_form.blade.php

### プロフィールページ
C:\xampp\htdocs\review_system\resources\views\user_profile\show.blade.php


## CSS
\review_system\resources\css

## JavaScript
\review_system\resources\js

## Image
\review_system\public\images


# How To View  -- 表示方法 --
● vite 使用のためnpm run dev 必須


# Highlights -- 工夫した点 --

## gridを使用（resources > css > review_timeline.css）
タイムラインの投稿データはgridレイアウトを使用

## 沈むボタンの実装（resources > css > component.css）

## 降順は latest() を使用 （Controller > PostController.php）
DESC ではなく latest() を使用

    $reviews = Post::with('user')
        ->latest()  //= ORDER BY created_at DESC
        ->get();

## @forelse を使用（views > reviews > _timeline.blade.php）    
    @forelse($reviews as $review)
        <article></article>
    @empty
        <p class="timeline__empty">まだ投稿がありません</p>
    @endforelse

## プロフィールページのタブ切り替えにJavaScript使用

## followersテーブルの２カラムは外部キーに
ER図ではFKで設定されていない

## フォローメッセージのふわっと出てきて消えるアニメーション
css キーフレーム ＋ js
フォローのメッセージと投稿メッセージで吹き出しの向きを使い分け

## お気に入りボタンのハートSVGを自作
fill に currentColor を指定して CSS で色を変更できるようにした

## お気に入り登録・解除でコメントの位置に戻る
実装：id制御（ずれる）
理想：押した場所をそのまま維持する方法（Ajax）

## お気に入り追加メッセージなし
ハートボタンの色が変わるのでメッセージなし

