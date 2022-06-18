const deleteButton = document.querySelector(".btn-delete");

deleteButton.addEventListener("click", () => {
  let formData = new FormData();
  formData.append("id", new URLSearchParams(window.location.search).get("id"));

  fetch("controller/delete_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});
