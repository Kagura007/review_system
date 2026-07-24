# Review System

Laravel Breezeによる認証機能をベースに、レビュー投稿・フォロー・お気に入り・プロフィール機能を実装したWebアプリケーションです。

## 概要

ユーザー登録・ログイン機能を備えたレビュー投稿アプリケーションです。
レビューの投稿・削除に加え、お気に入り機能、フォロー機能、プロフィール機能を実装しています。

## 主な機能

- ユーザー登録・ログイン
- レビュー投稿・削除
- お気に入り機能
- フォロー機能
- プロフィール編集

## 技術スタック

### バックエンド
- PHP 8.2
- Laravel 12

### フロントエンド
- Blade
- JavaScript
- React（お気に入り機能の一部）
- Vite
- CSS

### データベース
- MySQL

### 認証
- Laravel Breeze

### 開発環境
- XAMPP
- Git
- GitHub

## 工夫した点

- Laravel Breezeを利用した認証機能を実装
- Eloquentリレーションを利用してフォロー・お気に入り機能を実装
- Reactを使用し、お気に入り一覧からの解除機能を実装
- SVGアイコンを自作し、CSSで色を制御
- JavaScriptとCSSアニメーションを用いて操作性を向上

## セットアップ

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run dev
php artisan serve
```

<!--
## スクリーンショット

### ダッシュボード

![ダッシュボード](docs/images/top.png)

### レビュー投稿

![レビュー投稿](docs/images/review_form.png)

### コメント投稿

![レビュー投稿](docs/images/comment_form.png)

### プロフィール

![プロフィール](docs/images/profile.png)
-->
