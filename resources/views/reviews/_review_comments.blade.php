<ul class="p-review-comment">
    <li class="p-review-comment__item">

        <!-- 投稿内容 -->
        <div class="p-review-comment__content">
            <div class="r-c-heder">
                <a href="{{ route('user_profile.show', ['id' => $reply->user->id]) }}" class="r-c-user">
                    {{-- ユーザー画像 --}}
                    <img src="{{ asset('images/user_images/user.png') }}" alt="ユーザーアイコン" class="r-c-user-image">
                    {{-- ユーザー名 --}}
                    <span>
                        {{ $reply->user->name }}
                    </span>
                </a>

                <!-- 日付 -->
                <div class="p-review-comment__date">
                    <span>{{ $reply->created_at->format('Y/m/d') }}</span>
                    <span>{{ $reply->created_at->format('H:i') }}</span>
                </div>
            </div>

            <div class="p-review-comment__card">
                {{-- 投稿内容 --}}
                <p>
                    {{ $reply->comment }}
                </p>
            </div>

        </div>

    </li>
</ul>
