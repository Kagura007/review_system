{{-- <!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css'])
    <title>Review System</title>
</head> --}}

{{-- <body> --}}

@include('components.header')

<main class="l-container p-review-form">

    <h1 class="p-review-form__title">
        ようこそ、口コミ投稿フォームへ。
    </h1>

    @include('reviews.form')

</main>

@include('components.footer')

{{-- </body>

</html> --}}
