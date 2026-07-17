<div class="p-review-list">

    <div class="p-review-list__inner">
        {{-- タイトルセクション --}}
        <section class="p-review-list__title-group">
            <h1 class="p-review-list__title">{{ __('Time Line') }}</h1>
        </section>
        <!-- 上部 -->
        <section class="p-review-list__header">
            <p>{{ __('いろいろなサービスの口コミを書いてみよう') }}</p>

            {{-- レビュー投稿フォームへのリンク -- }}
            {{-- 「-1」はフォームでの状態切り替えのため -1：新規レビュー --}}
            <a href="{{ route('reviews.create', -1) }}" class="c-button p-review-list__button">
                {{ __('投稿する') }}
            </a>
        </section>

        <!-- タイムライン -->
        <section class="p-timeline">
            @forelse ($reviews as $review)
                <!-- 口コミ1件 -->
                <article id="review-{{ $review->id }}" class="p-timeline__item">
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
                        <a href="{{ route('user_profile.show', ['id' => $review->user->id]) }}" class="p-review-user">
                            {{-- ユーザー画像 --}}
                            <img src="{{ asset('images/user_images/user.png') }}" alt="ユーザーアイコン"
                                class="p-review-user-image">
                            {{-- ユーザー名 --}}
                            <span>
                                {{ $review->user->name }}
                            </span>
                        </a>
                        <div class="p-review-card">
                            {{-- 投稿内容 --}}
                            <p>
                                {{ $review->comment }}
                            </p>
                            {{-- 評価 --}}
                            <div class="p-review-star">
                                {{-- {{ $review->evaluation }} --}}

                                @for ($i = 1; $i <= $review->evaluation; $i++)
                                    <img src="{{ asset('images/review_star.png') }}" alt="★"
                                        class="p-review-star-image">
                                @endfor
                            </div>
                        </div>

                        {{-- レビューへのコメント一覧表示 --}}
                        @if ($review->reply->isNotEmpty())
                            @foreach ($review->reply as $reply)
                                @include('reviews._review_comments', ['reply' => $reply])
                            @endforeach
                        @endif

                        {{-- お気に入り＋コメントボタン --}}
                        <div class="p-review-list__button-group">
                            {{-- お気に入りボタン --}}
                            @if (Auth::user()->isFavorite($review->id))
                                {{-- お気に入り解除 --}}
                                <form action="{{ route('unfavorite', $review->id) }}" method="post"
                                    class="p-review-list__form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="p-review-list__button-favorite p-review-list__button-favorite--action">

                                        @include('components._favorite_heart')

                                    </button>
                                </form>
                            @else
                                {{-- お気に入り登録 --}}
                                <form action="{{ route('favorite', $review->id) }}" method="post"
                                    class="p-review-list__form">
                                    @csrf
                                    <button type="submit" class="p-review-list__button-favorite">

                                        @include('components._favorite_heart')

                                    </button>
                                </form>
                            @endif

                            {{-- コメントボタン --}}
                            <a href="{{ route('reviews.create', $review->id) }}"
                                class="c-button p-review-list__button-comment">
                                {{ __('このレビューにコメントする') }}
                            </a>
                        </div>

                    </div>
                </article>

            @empty
                <p class="p-timeline__empty">{{ __('まだ投稿がありません') }}</p>
            @endforelse

        </section>

    </div>
</div>
