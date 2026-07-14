<div class="p-review-list">

    <div class="p-review-list__inner">
        <section class="p-review-list__title-group">
            <p class="p-review-list__title">このレビューに投稿する</p>
        </section>

        <!-- コメントしたいレビュー -->
        <section class="p-timeline">
            {{-- @forelse ($posts as $post) --}}
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

                            @for ($i = 1; $i <= $review->evaluation; $i++)
                                <img src="{{ asset('images/review_star.png') }}" alt="★"
                                    class="p-review-star-image">
                            @endfor
                        </div>
                    </div>
                </div>
            </article>

        </section>

    </div>
</div>
