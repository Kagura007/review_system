console.log("Favorite 読み込まれた");

// Propsに endpointUrl を追加するよ
function Favorite({ postId, endpointUrl }) {

    const handleDelete = async () => {
        // 💡 ここを、受け取った endpointUrl に書き換える！
        const response = await fetch(
            endpointUrl,
            {
                method: 'DELETE',
                headers: {
                    'X-React': 'favorite',
                    'X-CSRF-TOKEN':
                        document.querySelector('meta[name="csrf-token"]').content,
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                },
            }
        );

        if (response.ok) {
            const article = document.getElementById(`favorite-${postId}`);
            if (article) {
                article.remove();
            }
        }

        const list = document.getElementById("favorite-list");

        if (list.querySelectorAll("article").length === 0) {
            document.getElementById("favorite-empty").style.display = "block";
        }
    };

    return (
        <button
            type="button"
            onClick={handleDelete}
            className="p-review-list__button-favorite p-review-list__button-favorite--action"
        >
            <svg xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 77.479 62.172"
            >
                <path
                    d="M92.02 127.69c-3.797-7.796-10.3-11.942-18.878-11.871-11.044.09-16.69 9.77-17.998 13.623-2.228 6.896-2.527 14.82-.52 19.215 1.731 3.79 3.487 6.197 5.653 8.442 8.267 8.567 20.325 16.94 31.744 20.89m0-50.298c3.797-7.797 10.3-11.943 18.878-11.872 11.044.09 16.69 9.77 17.998 13.623 2.228 6.896 2.527 14.82.52 19.215-1.731 3.79-3.487 6.197-5.653 8.442-8.267 8.567-20.325 16.94-31.743 20.89"
                    fill="currentColor" transform="translate(-53.281 -115.818)" />
            </svg>

        </button>
    );
}

export default Favorite;
