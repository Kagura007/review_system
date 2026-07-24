{{-- レビュー編集フォーム --}}

<section class="p-review-form__form-content">

    <form action="{{ route('reviews.update', $post->id) }}" method="POST" class="p-review-form__form">
        @csrf
        @method('PUT')

        @error('comment')
            <p class="c-error">{{ $message }}</p>
        @enderror

        {{-- 投稿内容 --}}
        <div class="p-review-form__item-group">
            <label for="comment" class="p-review-form__label">
                {{ __('投稿内容：') }}
            </label>

            <textarea name="comment" id="comment" cols="100" rows="10" required class="p-review-form__textarea">{{ old('comment', $post->comment) }}</textarea>
        </div>


        {{-- 評価 --}}
        <div class="p-review-form__evaluation">

            <label for="evaluation" class="p-review-form__evaluation-label">
                {{ __('評価：') }}
            </label>

            <select name="evaluation" class="p-review-form__evaluation-select">

                <option value="5" @selected(old('evaluation', $post->evaluation) == 5)>
                    ⭐⭐⭐⭐⭐
                </option>

                <option value="4" @selected(old('evaluation', $post->evaluation) == 4)>
                    ⭐⭐⭐⭐☆
                </option>

                <option value="3" @selected(old('evaluation', $post->evaluation) == 3)>
                    ⭐⭐⭐☆☆
                </option>

                <option value="2" @selected(old('evaluation', $post->evaluation) == 2)>
                    ⭐⭐☆☆☆
                </option>

                <option value="1" @selected(old('evaluation', $post->evaluation) == 1)>
                    ⭐☆☆☆☆
                </option>

            </select>

        </div>


        <button type="submit" class="c-button p-review-form__button">
            {{ __('更新する') }}
        </button>

    </form>


    <a href="{{ route('dashboard') }}" class="c-link">
        タイムラインへ
    </a>

</section>
