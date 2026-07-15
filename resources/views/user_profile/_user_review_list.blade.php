<div class="p-user-profile__tab-group">
    <button class="p-user-profile__tab  p-user-profile__tab--active">
        投稿レビュー一覧
    </button>

    <button class="p-user-profile__tab">
        お気に入り
    </button>

    <span class="p-user-profile__indicator"></span>
</div>

<!-- 投稿済みレビュー一覧 -->
<section class="p-timeline p-user-profile__tab-content p-user-profile__review-list">
    @forelse ($reviews as $review)
        <!-- 口コミ1件 -->
        <article class="p-timeline__item">
            <!-- 日付 -->
            <div class="p-timeline__date">
                <p>{{ $review->created_at->format('Y/m/d') }}</p>
                <p>{{ $review->created_at->format('H:i') }}</p>
            </div>
            <!-- 線と丸 -->
            <div class="p-timeline__line">
                <span class="p-timeline__circle"></span>
            </div>
            <!-- 投稿内容 -->
            <div class="p-timeline__content">
                <div class="p-review-user">
                    {{-- ユーザー画像 --}}
                    <img src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="p-review-user-image">
                    {{-- ユーザー名 --}}
                    <span>
                        {{ $review->user->name }}
                    </span>
                </div>
                <div class="p-review-card">
                    {{-- 投稿内容 --}}
                    <p>
                        {{ $review->comment }}
                    </p>
                    {{-- 評価 --}}
                    <div class="p-review-star">
                        {{-- {{ $review->evaluation }} --}}

                        @for ($i = 1; $i <= $review->evaluation; $i++)
                            <img src="{{ asset('images/review_star.png') }}" alt="★" class="p-review-star-image">
                        @endfor
                    </div>
                </div>

                {{-- レビューへのコメント一覧表示 --}}
                {{-- @if ($review->reply->isNotEmpty())
                            @foreach ($review->reply as $reply)
                                @include('reviews._review_comments', ['reply' => $reply])
                            @endforeach
                        @endif

                        <a href="{{ route('reviews.create', $review->id) }}"
                            class="c-button p-review-list__button-comment">
                            {{ __('このレビューにコメントする') }}
                        </a> --}}

            </div>
        </article>

    @empty
        <p class="p-timeline__empty">{{ __('まだ投稿がありません') }}</p>
    @endforelse

</section>


{{-- お気にり --}}
<section class=" p-user-profile__tab-content p-user-profile__favorite-list">ここにお気に入りが表示されます</section>
