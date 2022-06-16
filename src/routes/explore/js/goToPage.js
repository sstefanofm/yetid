const pageButtons = document.querySelectorAll(".btn-page");

pageButtons.forEach((button) => {
  button.addEventListener("click", () => {
    const newPage = button.innerHTML;

    window.location.href = `http://localhost/stf/yetid/src/routes/explore/explore.php?page=${newPage}`;
  });
});
