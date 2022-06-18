const newPost = document.querySelector(".post");
const uploadButton = document.querySelector(".btn-upload");

uploadButton.addEventListener("click", () => {
  let formData = new FormData();
  formData.append("post", newPost.innerHTML);
  formData.append("username", document.querySelector("p.hidden").innerHTML);

  fetch("controller/upload_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});
