# Access -- アクセス --

## Root
http://localhost:8080/review_system/

## ダッシュボード
http://localhost:8080/review_system/public/dashboard

## 口コミ投稿フォーム
http://localhost:8080/review_system/public/reviews/create


# Structure -- 構造 --

## View
\review_system\resources\views\reviews

## CSS
\review_system\resources\css

## Image
\review_system\public\images


# How To View  -- 表示方法 --

## vite 使用のためnpm run dev 必須


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
