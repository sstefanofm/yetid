const newPost = document.querySelector(".post");
const uploadButton = document.querySelector(".btn-upload");

const validatePost = () => {
  if (newPost.innerHTML.length === 0) {
    return false;
  }
  console.log(newPost.innerHTML);
};

uploadButton.addEventListener("click", () => {
  if (validatePost()) {
    let formData = new FormData();
    formData.append("post", newPost.innerHTML);
    formData.append("username", document.querySelector("p.hidden").innerHTML);

    fetch(
      "http://localhost/stf/yetid/src/routes/posts/controller/upload_post.php",
      {
        method: "POST",
        body: formData,
      }
    ).then(() => {
      window.location.href = "http://localhost/stf/yetid/src/index.php";
    });
  }
});
