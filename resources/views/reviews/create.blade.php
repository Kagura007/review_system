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
<x-app-layout>

    {{-- @include('components.header') --}}

    <main class="p-review-form">

        <div class="l-container p-review-form__inner">
            <h1 class="p-review-form__title">
                口コミ投稿フォーム
            </h1>
            @include('reviews._form')
        </div>

    </main>

</x-app-layout>

{{-- @include('components.footer') --}}

{{-- </body>

</html> --}}
