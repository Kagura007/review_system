document.addEventListener('DOMContentLoaded', () => {
    const tabs = document.querySelectorAll('.p-user-profile__tab');
    const reviewList = document.querySelector('.p-user-profile__review-list');
    const favoriteList = document.querySelector('.p-user-profile__favorite-list');

    if (!reviewList || !favoriteList || tabs.length < 2) {
        return;
    }

    // 表示切り替え
    if (tabs.length >= 2 && reviewList && favoriteList) {
        tabs[0].addEventListener('click', () => {
            tabs[0].classList.add('p-user-profile__tab--active');
            tabs[1].classList.remove('p-user-profile__tab--active');

            reviewList.hidden = false;
            favoriteList.hidden = true;
        });
    }

    if (tabs.length >= 2 && reviewList && favoriteList) {
        tabs[1].addEventListener('click', () => {
            tabs[1].classList.add('p-user-profile__tab--active');
            tabs[0].classList.remove('p-user-profile__tab--active');

            favoriteList.hidden = false;
            reviewList.hidden = true;
        });
    }

    // 初期状態
    favoriteList.hidden = true;



    // タブの下線を動かす
    const indicator = document.querySelector('.p-user-profile__indicator');

    tabs.forEach((tab, index) => {

        tab.addEventListener('click', () => {

            tabs.forEach(t => t.classList.remove('p-user-profile__tab--active'));
            tab.classList.add('p-user-profile__tab--active');

            indicator.style.transform = `translateX(${index * 100}%)`;

        });

    });
});


// メッセージをふわっと出して消す
const message = document.querySelector('.message');

if (message) {
    setTimeout(() => {
        message.style.opacity = '0';

        setTimeout(() => {
            message.remove();
        }, 300);

    }, 3000);
}
