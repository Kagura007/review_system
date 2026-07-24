// 投稿一覧から削除したレビューを消す処理
console.log("DeletePost 読み込まれた");

document.querySelectorAll(".js-delete-form").forEach(form => {

    form.addEventListener("submit", async (e) => {
        e.preventDefault();

        if (!confirm("このレビューを削除しますか？")) {
            return;
        }

        const endpoint = form.dataset.endpoint;
        const postId = form.dataset.postId;

        const response = await fetch(endpoint, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
                "Accept": "application/json",
                "X-Requested-With": "XMLHttpRequest"
            }
        });

        if (response.ok) {
            document.getElementById(`post-${postId}`)?.remove();
        }
    });

});
