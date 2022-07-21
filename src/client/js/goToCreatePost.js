const createPostButton = document.querySelector(".btn-create");

createPostButton.addEventListener("click", () => {
  window.location.href =
    "http://localhost/stf/yetid/src/routes/posts/create_post.php";
});
