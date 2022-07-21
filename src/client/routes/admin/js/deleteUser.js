const deleteButtons = document.querySelectorAll(".btn-delete-user");

deleteButtons.forEach((button) => {
  button.addEventListener("click", () => {
    if (confirm("Are you sure you want to delete this user?")) {
      let formData = new FormData();

      // grab the id of the button (the user's id) to delete that user;
      formData.set("id", button.id);

      fetch("controller/delete_user.php", {
        method: "POST",
        body: formData,
      }).then(() => {
        window.location.reload();
      });
    }
  });
});
