<section class="p-user-profile">

    <div class="p-user-profile__image-group">
        {{-- ユーザー画像 --}}
        <image src="{{ asset('images/user.png') }}" alt="ユーザーアイコン" class="p-user-profile__image"></image>
        {{-- ユーザー名＋ID --}}
        <div class="p-user-profile__name-group">
            {{-- ユーザーニックネーム --}}
            <div class="p-user-profile__user-name">
                @if (blank($profile->nick_name))
                    名無しさん
                @else
                    {{ $profile->nick_name }}
                @endif
            </div>
            {{-- ユーザーID --}}

            <div class="p-user-profile__user-id">
                ユーザーID： {{ $profile->file_name }}
            </div>
        </div>
    </div>

    {{-- 自己紹介＋フォローボタン --}}
    <div class="p-user-profile__description-group">
        <div>
            @if (blank($profile->description))
                また自己紹介がありません
            @else
                {{ $profile->description }}
            @endif
        </div>

        <button class="c-button p-user-profile__follow-btn">{{ __('フォローする') }}</button>
        <button class="c-button p-user-profile__follow-cancel-btn">{{ __('フォロー解除する') }}</button>
    </div>

</section>
