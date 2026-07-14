{{-- review-comment --}}

<ul class="review-comment">
    <li class="review-comment__item">

        <!-- 投稿内容 -->
        <div class="review-comment__content">
            <div class="r-c-user">
                {{-- ユーザー画像 --}}
                <img src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="r-c--user-image">
                {{-- ユーザー名 --}}
                <span>
                    {{ $review_comment->user->name }}
                </span>
            </div>

            <!-- 日付 -->
            <div class="review-comment__date">
                <p>{{ $review_comment->created_at->format('Y/m/d') }}</p>
                <p>{{ $review_comment->created_at->format('H:i') }}</p>
            </div>

            <div class="review-comment-card">
                {{-- 投稿内容 --}}
                <p>
                    {{ $review_comment->comment }}
                </p>
            </div>
        </div>

    </li>
</ul>
