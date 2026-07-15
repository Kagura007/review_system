# XAMPP導入


# Laravel導入

## composerインストール
すでにグローバルにインストール済みなので、バージョンを合わせた（2.8.9）

## パスを通す

## Lalavel installserインストール
すでにインストール済みなのでバージョンを更新（5.11.x）


# 「review_system」プロジェクト作成


# Git 接続

## Laravel標準 の README.md をコピーして独自の README.md 作成 
★必要なければ Lalavel標準 の README.md を削除

## Github にリモートリポジトリ作成・接続
Laravel には .gitignore が用意されているので内容をチェックして実行


# Breeze インストール
laravel/breeze (v2.4.2)
vite v7.3.6


# マイグレーションで初期テーブル作成

## node.js
node v24.16.0

  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  Local:   http://localhost:5173/
  ➜  Network: use --host to expose
  ➜  press h + enter to show help
  ➜  press h + enter to show help

  LARAVEL v12.63.0  plugin v2.1.0

  ➜  APP_URL: http://localhost

## php artisan migrate
  0001_01_01_000000_create_users_table ................................. 52.12ms DONE  
  0001_01_01_000001_create_cache_table ................................. 31.41ms DONE  

  0001_01_01_000000_create_users_table ................................. 52.12ms DONE  
  0001_01_01_000001_create_cache_table ................................. 31.41ms DONE  
  0001_01_01_000000_create_users_table ................................. 52.12ms DONE  
  0001_01_01_000001_create_cache_table ................................. 31.41ms DONE  
  0001_01_01_000002_create_jobs_table .................................. 39.93ms DONE  
  0001_01_01_000002_create_jobs_table .................................. 39.93ms DONE 

## Laravel のデフォルト画面で「log in」「Register」表示成功
  http://localhost:8080/review_system/public/


# 投稿機能の実装

## LaravelでのFormの作成

### HTML用意：form.blade.php
@csrf を入れる

### Post.php 生成
php artisan make:model Post -m
結果： C:\xampp\htdocs\review_system\app\Models\Post.php

### テーブルの構造を指定
C:\xampp\htdocs\review_system\database\migrations\2026_07_12_152605_create_posts_table.php 
にテーブル構造やリレーション（外部キー）を指定

php artisan migrate 
指定したテーブルが生成される

### ※操作を１つ戻す（回数指定をして取り消すこともできる）
php artisan mitrate:follback

### Postコントローラ作成
php artisan make:controller Postcontroller
結果： C:\xampp\htdocs\review_system\app\Http\Controllers\Postcontroller.php

createメソッドଚデータ格納用ଠstoreメソッドPostControllerを用意

### web.php にルートを追加
//投稿画面 http://localhost:8080/review_system/public/reviews/create
Route::get('/reviews/create', [PostController::class, 'create'])->name('reviews.create');

//フォームのpost受け取り
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');

### Models 内の Post.php に fillable の指定
「この4つの項目は、まとめてデータ登録して良い」というLaravelへの許可

### ダッシュボードにフラッシュメッセージを表示
resources/views/dashboard.blade.php
http://localhost:8080/review_system/public/login

### 登録されたユーザーでのログイン確認
BreezeはDB内ではpasswordが暗号化されている！！便利。
PW:わたしはme

## 投稿ページで実装する機能

## 確認ページの作成


# タイムラインの実装

## HTML用意
既存ダッシュボード書き換え

## Route > controller > model 設定
web.php
PostController.php
Post.php
User.php

## 口コミ投稿データの取得と表示
bladeを活用した受け取り、記述が少なく楽。


# コメント投稿機能の実装
リレーション parent_id を使って保存、表示


# プロフィールページの作成

## モデル作成
php artisan make:model UserProfile -m
「-m」：migrationも一緒に作ってねというオプション

app/
 └ Models/
    └ UserProfile.php

### 「-m」の結果
database/
 └ migrations/
    └ 2026_xx_xx_create_user_profiles_table.php

## テーブル作成
php artisan migrate 

## コントローラーの作成
php artisan make:controller UserProfileController --resource

「--resource」： ControllerをCRUD（作成・表示・更新・削除）用のひな形付きで作るオプション

## ルーティング：web.php

## プロフィールページHTML作成：show.blade.php
C:\xampp\htdocs\review_system\resources\views\user_profile\show.blade.php

bladeでパーツ分け

DBデータ呼び出し

## コントローラーに指示を書き込む：UserProfileController.php
