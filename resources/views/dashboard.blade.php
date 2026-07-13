<x-app-layout>

    {{-- セッションに設定したメッセージが入る --}}
    {{-- ★後でスタイル当てる --}}
    {{-- <div style="background-color:#fff; margin-inline:auto; border-radius:20px;"
        class="p-6 text-gray-900 dark:text-gray-100"> --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    {{-- </div> --}}

    @include('reviews._timeline')

</x-app-layout>
