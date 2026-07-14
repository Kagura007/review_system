<x-app-layout>

    <div class="p-review-form">

        @if ($review)
            <div class="l-container p-review-form__inner">
                <h1 class="p-review-form__title">
                    {{ __('コメント投稿フォーム') }}
                </h1>

                @include('reviews._comment_form')
            </div>
        @else
            <div class="l-container p-review-form__inner">
                <h1 class="p-review-form__title">
                    {{ __('口コミ投稿フォーム') }}
                </h1>

                @include('reviews._form')
            </div>
        @endif

    </div>

</x-app-layout>
