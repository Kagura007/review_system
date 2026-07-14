<x-app-layout>

    <main class="p-review-form">

        <div class="l-container p-review-form__inner">
            <h1 class="p-review-form__title">
                {{ __('口コミ投稿フォーム') }}
            </h1>
            @include('reviews._form')
        </div>

    </main>

</x-app-layout>
