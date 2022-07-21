const posts = document.querySelectorAll(".post");

posts.forEach((post) => {
  post.addEventListener("click", () => {
    window.location.href = `routes/posts/edit_post.php?id=${post.id}`;
  });
});
