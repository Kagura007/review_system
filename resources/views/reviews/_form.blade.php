<section class="p-review-form__form-content">

    {{-- 入力フォーム --}}
    <form action="{{ route('post.store') }}" method="POST" class="p-review-form__form">
        @csrf

        {{-- エラー表示 --}}
        @error('comment')
            <p class="c-error">{{ $message }}</p>
        @enderror

        {{-- 投稿内容 --}}
        <div class="p-review-form__item-group">
            <label for="comment" class="p-review-form__label">{{ __('投稿内容') }}：
            </label>
            <textarea name="comment" id="content" cols="100" rows="10" required class="p-review-form__textarea">
                {{ old('comment') }}
            </textarea>
        </div>

        {{-- 評価 --}}
        <div class="p-review-form__evaluation">
            <label for="evaluation" class="p-review-form__evaluation-label">
                {{ __('評価') }}：
            </label>

            <select name="evaluation" class="p-review-form__evaluation-select">
                <option value="5">⭐⭐⭐⭐⭐</option>
                <option value="4">⭐⭐⭐⭐☆</option>
                <option value="3">⭐⭐⭐☆☆</option>
                <option value="2">⭐⭐☆☆☆</option>
                <option value="1">⭐☆☆☆☆</option>
            </select>
        </div>

        <button type="submit" class="c-button p-review-form__button">{{ __('投稿する') }}</button>
    </form>

</section>
