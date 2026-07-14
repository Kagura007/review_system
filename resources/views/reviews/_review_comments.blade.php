<ul class="p-review-comment">
    <li class="p-review-comment__item">

        <!-- 投稿内容 -->
        <div class="p-review-comment__content">
            <div class="r-c-heder">
                <div class="r-c-user">
                    {{-- ユーザー画像 --}}
                    <img src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="r-c-user-image">
                    {{-- ユーザー名 --}}
                    <span>
                        {{ $review->user->name }}
                    </span>
                </div>

                <!-- 日付 -->
                <div class="p-review-comment__date">
                    <span>{{ $review->created_at->format('Y/m/d') }}</span>
                    <span>{{ $review->created_at->format('H:i') }}</span>
                </div>
            </div>

            <div class="p-review-comment__card">
                {{-- 投稿内容 --}}
                <p>
                    {{ $review->comment }}
                </p>
            </div>

        </div>

    </li>
</ul>
