{{-- p-review-comment --}}

<ul class="p-review-comment">
    <li class="p-review-comment__item">

        <!-- 投稿内容 -->
        <div class="p-review-comment__content">
            <div class="r-c-user">
                {{-- ユーザー画像 --}}
                <img src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="r-c--user-image">
                {{-- ユーザー名 --}}
                <span>
                    {{ $review->user->name }}
                </span>
            </div>

            <!-- 日付 -->
            <div class="p-review-comment__date">
                <p>{{ $review->created_at->format('Y/m/d') }}</p>
                <p>{{ $review->created_at->format('H:i') }}</p>
            </div>

            <div class="p-review-comment-card">
                {{-- 投稿内容 --}}
                <p>
                    {{ $review->comment }}
                </p>
            </div>

        </div>

    </li>
</ul>
