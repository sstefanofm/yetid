const userButton = document.querySelector(".btn-user");
const togglerMenu = document.querySelector(".user-options");

userButton.addEventListener("click", () => {
  togglerMenu.classList.toggle("hidden");
});
