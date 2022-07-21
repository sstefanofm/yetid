let posts = document.querySelectorAll(".post-title");

posts.forEach((post) => {
  post.addEventListener("click", () => {
    window.location.href = `../posts/view_post.php?id=${post.id}`;
  });
});
