<x-app-layout>

    <article class="l-container p-guide">

        {{-- タイトルセクション --}}
        <section class="p-review-list__title-group">
            <h1 class="p-review-list__title p-user-profile__title">{{ __('Guide') }}</h1>
        </section>

        <section class="p-guide__section p-guide__section--intro">
            <h2 class="p-guide__heading">このサイトについて</h2>
            <p class="p-guide__paragraph">
                このサイトはポートフォリオとして制作したレビュー投稿サイトです。
            </p>
            <p class="p-guide__paragraph">
                レビューの投稿・コメント・お気に入り登録などの機能を体験できます。
            </p>
        </section>

        <section class="p-guide__section">
            <h2 class="p-guide__heading">投稿について</h2>
            <ul class="p-guide__list">
                <li class="p-guide__item">レビュー・コメントを投稿できます。</li>
                <li class="p-guide__item">レビュー・コメントは合計10件まで投稿できます。</li>
                <li class="p-guide__item">投稿したレビューは削除できます。</li>
                <li class="p-guide__item">投稿したコメントの削除機能はまだ実装されていません。</li>
                <li class="p-guide__item">投稿内容は他の利用者にも公開されます。</li>
            </ul>
        </section>

        <section class="p-guide__section">
            <h2 class="p-guide__heading">利用上のお願い</h2>
            <ul class="p-guide__list">
                <li class="p-guide__item">誹謗中傷や他人を傷つける投稿は禁止です。</li>
                <li class="p-guide__item">宣伝・スパム投稿は禁止です。</li>
                <li class="p-guide__item">不適切な内容は削除する場合があります。</li>
                <li class="p-guide__item">一部の不適切な表現は投稿できません。</li>
                <li class="p-guide__item">デモサイトなので、予告なく投稿内容を削除することがあります。</li>
            </ul>
        </section>

        <section class="p-guide__section">
            <h2 class="p-guide__heading">デモサイトについて</h2>
            <ul class="p-guide__list">
                <li class="p-guide__item">このサイトはデモサイトです。</li>
                <li class="p-guide__item">同一メールアドレスで作成できるアカウントは1つです。</li>
                <li class="p-guide__item">機能や仕様は予告なく変更する場合があります。</li>
            </ul>
        </section>

        <section class="p-guide__section p-guide__section--closing">
            <p class="p-guide__paragraph">
                ご訪問いただきありがとうございます。
            </p>
            <p class="p-guide__paragraph">
                このサイトはポートフォリオのため、一部機能を制限しています。
            </p>
        </section>

    </article>

</x-app-layout>
