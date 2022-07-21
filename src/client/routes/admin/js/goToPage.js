const pageButtons = document.querySelectorAll(".btn-page");

pageButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const newPage = button.innerHTML;

    window.location.href = `view_users.php?page=${newPage}`;
  });
});
