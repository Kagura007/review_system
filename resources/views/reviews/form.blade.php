<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Review System</title>
</head>

<body>
    <main class="l-container p-review-form">

        <section class="p-review-form__title-group">
            <h1 class="p-review-form__title">ようこそ、口コミ投稿フォームへ。</h1>
        </section>

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

    </main>
</body>

</html>
