const postTitle = document.querySelector(".post-title");
const postContent = document.querySelector(".post-body");
const uploadButton = document.querySelector(".btn-upload");

uploadButton.addEventListener("click", () => {
  let formData = new FormData();
  formData.append("title", postTitle.value);
  formData.append("content", postContent.innerHTML);

  fetch("controller/upload_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});
