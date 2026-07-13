<main class="review-list">

    <div class="review-list__inner">
        <section class="review-list__title-group">
            <h1 class="review-list__title">Time Line</h1>
        </section>
        <!-- 上部 -->
        <section class="review-list__header">
            <p>いろいろなサービスの口コミを書いてみよう</p>
            <a href="{{ route('reviews.create') }}" class="review-list__button">
                投稿する
            </a>
        </section>
        <!-- タイムライン -->
        <section class="timeline">
            @foreach ($reviews as $review)
                <!-- 口コミ1件 -->
                <article class="timeline__item">
                    <!-- 日付 -->
                    <div class="timeline__date">
                        <p>{{ $review->created_at->format('Y/m/d') }}</p>
                        <p>{{ $review->created_at->format('H:i') }}</p>
                    </div>
                    <!-- 線と丸 -->
                    <div class="timeline__line">
                        <span class="timeline__circle"></span>
                    </div>
                    <!-- 内容 -->
                    <div class="timeline__content">
                        <div class="review-user">
                            {{-- ユーザー画像 --}}
                            <img src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="review-user-image">
                            {{-- ユーザー名 --}}
                            <span>
                                {{ $review->user->name }}
                            </span>
                        </div>
                        <div class="review-card">
                            {{-- 投稿内容 --}}
                            <p>
                                {{ $review->comment }}
                            </p>
                            {{-- 評価 --}}
                            <div class="review-star">
                                {{-- {{ $review->evaluation }} --}}

                                @for ($i = 1; $i <= $review->evaluation; $i++)
                                    <img src="{{ asset('images/review_star.png') }}" alt="★"
                                        class="review-star-image">
                                @endfor
                            </div>
                        </div>
                    </div>
                </article>
            @endforeach
        </section>
    </div>

</main>
