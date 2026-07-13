<section class="p-review-form__form-content">

    <form action="" method="POST" class="p-review-form__form">
        @csrf
        <div class="p-review-form__item-group">
            <label for="content" class="p-review-form__label">投稿内容：
            </label>
            <textarea name="content" id="content" cols="50" rows="10" required class="p-review-form__textarea">
                    </textarea>
        </div>

        <button type="submit" class="p-review-form__button">投稿する</button>
    </form>

</section>
