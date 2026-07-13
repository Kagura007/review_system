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

        {{-- @foreach ($reviews as $review) --}}
        <!-- 口コミ1件 -->
        <article class="timeline__item">

            <!-- 日付 -->
            <div class="timeline__date">
                <p>2025/06/26</p>
                <p>9:20</p>
            </div>

            <!-- 線と丸 -->
            <div class="timeline__line">
                <span class="timeline__circle"></span>
            </div>

            <!-- 内容 -->
            <div class="timeline__content">

                <div class="review-user">
                    <img src="user.png" alt="">
                    <span>ユーザー名</span>
                </div>

                <div class="review-card">
                    <p>
                        ○○ビル2階のレストラン。
                        フレンチなのに入りやすく...
                    </p>

                    <div class="review-star">
                        ★★★★★
                    </div>
                </div>

            </div>

        </article>
        {{-- @endforeach --}}

    </section>

</main>
