<x-app-layout>

    {{-- セッションに設定したメッセージが入る --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @include('reviews._timeline')

</x-app-layout>
