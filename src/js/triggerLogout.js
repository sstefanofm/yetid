const logoutButton = document.querySelector(".logout");

logoutButton.addEventListener("click", () => {
  window.location.href =
    "http://localhost/stf/yetid/src/utils/destroy_session.php";
});
