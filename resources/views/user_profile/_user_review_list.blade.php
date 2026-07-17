<div class="p-user-profile__tab-group">
    <button class="p-user-profile__tab  p-user-profile__tab--active">
        投稿レビュー一覧
    </button>

    @if (Auth::id() === $userProfile->user_id)
        <button class="p-user-profile__tab">
            お気に入り
        </button>
        <span class="p-user-profile__indicator"></span>
    @endif

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
                    <img src="{{ asset('images/user_images/user.png') }}" alt="ユーザーアイコン" class="p-review-user-image">
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

            </div>
        </article>

    @empty
        <p class="p-timeline__empty">{{ __('まだ投稿がありません') }}</p>
    @endforelse

</section>


{{-- お気にり一覧 --}}
@if (Auth::id() === $userProfile->user_id)
    <section class=" p-user-profile__tab-content p-user-profile__favorite-list">
        @forelse ($favorites as $favorite)
            <article class="p-timeline__item">
                <!-- 日付 -->
                <div class="p-timeline__date">
                    <p>{{ $favorite->post->created_at->format('Y/m/d') }}</p>
                    <p>{{ $favorite->post->created_at->format('H:i') }}</p>
                </div>
                <!-- 線と丸 -->
                <div class="p-timeline__line">
                    <span class="p-timeline__circle"></span>
                </div>
                <!-- 投稿内容 -->
                <div class="p-timeline__content">
                    <div class="p-review-user">
                        {{-- ユーザー画像 --}}
                        <img src="{{ asset('images/user_images/user.png') }}" alt="ユーザーアイコン"
                            class="p-review-user-image">
                        {{-- ユーザー名 --}}
                        <span>
                            {{ $favorite->post->user->name }}
                        </span>
                    </div>
                    <div class="p-review-card">
                        {{-- 投稿内容 --}}
                        <p>
                            {{ $favorite->post->comment }}
                        </p>
                        {{-- 評価 --}}
                        <div class="p-review-star">
                            {{-- {{ $review->evaluation }} --}}

                            @for ($i = 1; $i <= $favorite->post->evaluation; $i++)
                                <img src="{{ asset('images/review_star.png') }}" alt="★"
                                    class="p-review-star-image">
                            @endfor
                        </div>
                    </div>

                    {{-- お気に入り解除 --}}
                    <div class="p-user-profile__button--favorite">
                        <form action="{{ route('unfavorite', $favorite->post_id) }}" method="post"
                            class="p-review-list__form">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="p-review-list__button-favorite p-review-list__button-favorite--action">
                                @include('components._favorite_heart')
                            </button>
                        </form>
                    </div>

                </div>

            </article>

        @empty
            <p>お気に入りはありません</p>
        @endforelse
    </section>
@endif


{{-- ダッシュボードへのリンク --}}
<a href="{{ route('dashboard') }}" class="c-link">タイムラインへ</a>
