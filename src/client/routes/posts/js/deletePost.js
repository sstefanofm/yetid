const deleteButton = document.querySelector(".btn-delete");

deleteButton.addEventListener("click", () => {
  if (confirm("Are you sure you want to delete the post?")) {
    let formData = new FormData();
    formData.append(
      "id",
      new URLSearchParams(window.location.search).get("id")
    );

    fetch("controller/delete_post.php", {
      method: "POST",
      body: formData,
    }).then(() => {
      window.location.href = "../../";
    });
  }
});
