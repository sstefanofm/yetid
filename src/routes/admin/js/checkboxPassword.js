const password = document.querySelector(".password");
const passwordCheckbox = document.querySelector(".password-checkbox");

passwordCheckbox.addEventListener("change", () => {
  if (passwordCheckbox.checked) {
    password.type = "text";
    return;
  }
  password.type = "password";
});
