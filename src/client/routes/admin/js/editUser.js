const editUserButton = document.querySelectorAll(".btn-edit-user");

editUserButton.forEach((button) => {
  button.addEventListener("click", () => {
    window.location.href = `edit_user.php?id=${button.id}`;
  });
});
