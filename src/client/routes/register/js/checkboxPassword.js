const passwordInput = document.querySelector(".password");
const passwordCheckbox = document.querySelector(".password-checkbox");

passwordCheckbox.addEventListener("change", () => {
  if (passwordCheckbox.checked) {
    passwordInput.type = "text";
    return;
  }
  passwordInput.type = "password";
});
