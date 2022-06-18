const updateButton = document.querySelector(".btn-update");

updateButton.addEventListener("click", () => {
  const id = new URLSearchParams(window.location.search).get("id");

  let formData = new FormData();
  formData.append("title", document.querySelector(".post-title").value);
  formData.append("post", document.querySelector(".post-body").innerHTML);
  formData.append("id", id);

  fetch("controller/update_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});
