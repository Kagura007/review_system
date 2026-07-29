{{-- コメント投稿フォーム --}}

<div class="p-review-list">

    <div class="p-review-list__inner">

        <!-- コメントしたいレビュー -->
        <section class="p-timeline">

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

                            @for ($i = 1; $i <= $review->evaluation; $i++)
                                <img src="{{ asset('images/review_star.png') }}" alt="★"
                                    class="p-review-star-image">
                            @endfor
                        </div>
                    </div>
                </div>
            </article>
        </section>

        {{-- コメント投稿フォーム --}}
        <form action="{{ route('post.store') }}" method="post" class="p-comment-form">
            @csrf

            <div class="p-comment-form__textarea-group">
                <textarea name="comment" id="" cols="30" rows="5" class="p-comment-form__textarea">{{ old('comment') }}</textarea>

                @error('comment')
                    <div class="c-error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                {{-- 改善案：コメント → evaluation は NULL --}}
                <input type="hidden" name="evaluation" value="1">
                <input type="hidden" name="parent_id" value="{{ $review->id }}">
                {{-- @endif --}}
            </div>

            <button type="submit" class="c-button p-comment-form__button">{{ __('投稿する') }}</button>

        </form>

        {{-- ダッシュボードへのリンク --}}
        <a href="{{ route('dashboard') }}" class="c-link">タイムラインへ</a>

    </div>
</div>
