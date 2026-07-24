{{-- ダッシュボード --}}


<x-app-layout>

    {{-- セッションに設定したメッセージが入る --}}
    {{-- 成功メッセージ --}}
    @if (session('success'))
        <div class="message message--form">
            {{ session('success') }}
        </div>
    @endif

    @include('reviews._timeline')

</x-app-layout>
