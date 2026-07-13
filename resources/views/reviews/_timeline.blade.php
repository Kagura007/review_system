<main class="review-list">

    <!-- 上部 -->
    <section class="review-list__header">
        <h1>いろいろなサービスの口コミを書いてみよう</h1>

        <a href="#" class="review-list__button">
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
                        <img src="user.png" alt="">
                        {{-- ユーザー名 --}}
                        <span>
                            {{ $review->user->name }}
                        </span>
                    </div>

                    <div class="review-card">
                        <p>
                            {{ $review->comment }}
                        </p>

                        <div class="review-star">
                            {{ $review->evaluation }}
                        </div>
                    </div>

                </div>

            </article>
        @endforeach

    </section>

</main>
