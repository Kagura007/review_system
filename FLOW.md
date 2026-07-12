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

## Formでの投稿

### HTML用意：form.blade.php
@csrf を入れる

### Post.php 生成
php artisan make:model Post -m
C:\xampp\htdocs\review_system\app\Models\Post.php

### テーブルの構造を指定
C:\xampp\htdocs\review_system\database\migrations\2026_07_12_152605_create_posts_table.php 
にテーブル構造やリレーション（外部キー）を指定

php artisan migrate 
指定したテーブルが生成される

### ※操作を１つ戻す（回数指定をして取り消すこともできる）
php artisan mitrate:follback


## LaravelでのFormの作成

## 投稿ページで実装する機能

## 確認ページの作成

