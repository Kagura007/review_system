{{-- 投稿編集ページ --}}

<x-app-layout>

    <div class="p-review-form">

        <div class="l-container p-review-form__inner">

            <h1 class="p-review-form__title">
                {{ __('Edit review') }}
            </h1>

            <p>
                {{ __('投稿内容を編集できます。') }}
            </p>

            @include('reviews._edit_form')
        </div>

    </div>

</x-app-layout>
