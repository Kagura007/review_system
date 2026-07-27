<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    <!-- Styles / Scripts -->
    @viteReactRefresh

    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.jsx'])
    @endif
</head>

<body
    class="bg-[#CDE6F4] dark:bg-[#0a0a0a] text-[#333333] flex p-6 lg:p-8 items-center lg:justify-start min-h-screen flex-col">

    {{-- ヘッダー --}}
    <header class="fixed w-full lg:max-w-4xl max-w-[480px] text-sm mb-6 not-has-[nav]:hidden">

        @if (Route::has('login'))

            {{-- メニュー --}}
            <nav class="flex items-center justify-between gap-4">

                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
                    </a>
                </div>

                <!-- links -->
                <div>
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                            Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                            class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] text-[#1b1b18] border border-transparent hover:border-[#19140035] dark:hover:border-[#3E3E3A] rounded-sm text-sm leading-normal">
                            Log in
                        </a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="inline-block px-5 py-1.5 dark:text-[#EDEDEC] border-[#19140035] hover:border-[#1915014a] border text-[#1b1b18] dark:border-[#3E3E3A] dark:hover:border-[#62605b] rounded-sm text-sm leading-normal">
                                Register
                            </a>
                        @endif
                    @endauth
                </div>

            </nav>
        @endif
    </header>


    <main class="flex-1 mt-24 lg:max-w-4xl max-w-[480px]">

        {{-- 挨拶エリア --}}
        <section class="welcome-intro flex flex-col items-center">
            <h1 class="welcome-intro__title">
                <span class="welcome-intro__title-parts">{{ __('口コミ投稿サイト') }}</span>
                <span class="welcome-intro__title-parts">{{ __('（ポートフォリオデモ）') }}</span>
            </h1>

            <span class="bg-white/80 inline-block mt-12 px-8 text-xl text-center">
                {{ __('ようこそ、口コミ投稿サイト体験版へ') }}
            </span>

            <p>{{ __('このサイトはポートフォリオ用に制作したデモサイトです。') }}</p>
        </section>

        {{-- ログイン・新規作成ボタンエリア --}}
        <section class="welcome__auth flex justify-center items-center gap-8 mt-12">
            <a class="c-button" href="{{ route('login') }}">
                {{ __('ログイン') }}
            </a>

            <a class="c-button" href="{{ route('register') }}">
                {{ __('新規登録') }}
            </a>
        </section>

    </main>

    <footer class="w-full lg:max-w-4xl max-w-[480px] mt-24 text-ms text-center">
        {{ __('© 2026 Portfolio Demo') }}
    </footer>

</body>

</html>
