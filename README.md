# Review System

Laravel 12 を使用したレビュー管理システムです。

## 開発環境

- PHP 8.2
- Laravel 12
- MySQL
- XAMPP

## セットアップ

```bash
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
