<section class="p-user-profile">

    {{-- フォローメッセージ --}}
    @if (session('success'))
        <p class="message p-user-profile__message">{{ session('success') }}</p>
    @endif

    @if (session('error'))
        <p class="message p-user-profile__message">{{ session('error') }}</p>
    @endif

    {{-- タイトルセクション --}}
    <section class="p-review-list__title-group">
        <h1 class="p-review-list__title p-user-profile__title">{{ __('My Profile') }}</h1>
    </section>


    <div class="p-user-profile__image-group">

        {{-- ユーザー画像 --}}
        <image src="{{ asset('images/user_images/user.png') }}" alt="ユーザーアイコン" class="p-user-profile__image"></image>

        {{-- ユーザー名＋ID --}}
        <div class="p-user-profile__name-group">
            {{-- ユーザーニックネーム --}}
            <div class="p-user-profile__user-name">
                @if (blank($userProfile->nick_name))
                    {{ __('名無しさん') }}
                @else
                    {{ $userProfile->nick_name }}
                @endif
            </div>

            {{-- ユーザーID --}}
            <div class="p-user-profile__user-id">
                {{ __('ユーザーID：') }}{{ $userProfile->file_name }}
            </div>
        </div>

        {{-- フォローボタン --}}
        <div class="p-user-profile__btn-group">

            @if (Auth::id() !== $userProfile->user->id) {{-- 自分自身ではない場合 --}}
                @if (Auth::user()->isFollowing($userProfile->user->id))
                    {{-- 既にフォローしているか確認 --}}
                    <form action="{{ route('unfollow', $userProfile->user->id) }}" class="p-user-profile__form"
                        method="post">
                        @csrf
                        <button class="c-button p-user-profile__follow-cancel-btn">{{ __('フォロー解除する') }}</button>
                    </form>
                @else
                    <form action="{{ route('follow', $userProfile->user->id) }}" class="p-user-profile__form"
                        method="post">
                        @csrf
                        <button class="c-button p-user-profile__follow-btn">{{ __('フォローする') }}</button>
                    </form>
                @endif
            @endif

        </div>

    </div>

    {{-- 自己紹介 --}}
    <div class="p-user-profile__description">
        @if (blank($userProfile->description))
            {{ __('まだ自己紹介がありません') }}
        @else
            {{ $userProfile->description }}
        @endif
    </div>

</section>
