const userButton = document.querySelector(".btn-user");
const togglerMenu = document.querySelector(".user-options");

userButton.addEventListener("click", () => {
  if (togglerMenu.style.display === "none") {
    togglerMenu.style.display = "block";
    return;
  }
  togglerMenu.style.display = "none";
});
