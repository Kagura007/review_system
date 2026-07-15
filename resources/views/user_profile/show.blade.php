<x-app-layout>

    {{-- セッションに設定したメッセージが入る --}}
    {{-- @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif --}}
    <div class="l-container p-profile">

        @include('user_profile._user_profile')

        @include('user_profile._user_review_list')

    </div>

</x-app-layout>
