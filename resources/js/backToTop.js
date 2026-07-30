// --- トップへ戻るボタン ---

const backToTopBtn = document.querySelector('.back-to-top');


if (backToTopBtn) {

    window.addEventListener("scroll", () => {
        if (window.scrollY > 500) {
            backToTopBtn.classList.add("show");
        } else {
            backToTopBtn.classList.remove("show");
        }
    });

    // スクロールのアニメーション制御
    backToTopBtn.addEventListener("click", (e) => {
        e.preventDefault();

        const currentPosition = window.scrollY;

        const target = 800;

        window.scrollTo({
            top: target,
            behavior: "instant"
        });

        setTimeout(() => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        }, 50);
    });
}
