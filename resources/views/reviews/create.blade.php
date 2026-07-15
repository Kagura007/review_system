<x-app-layout>

    <div class="p-review-form">

        @if ($review)
            <div class="l-container p-review-form__inner">
                <h1 class="p-review-form__title">
                    {{ __('コメント投稿') }}
                </h1>

                <p>{{ __('このレビューに対するコメントを投稿できます。') }}</p>

                @include('reviews._comment_form')
            </div>
        @else
            <div class="l-container p-review-form__inner">
                <h1 class="p-review-form__title">
                    {{ __('レビュー投稿') }}
                </h1>

                <p>{{ __('サービスへのレビューを投稿できます。') }}</p>

                @include('reviews._form')
            </div>
        @endif

    </div>

</x-app-layout>
