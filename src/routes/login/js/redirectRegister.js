const goToRegisterBtn = document.querySelector("#register-button");

goToRegisterBtn.addEventListener("click", (event) => {
  event.preventDefault();
  window.location.replace(
    "http://localhost/stf/yetid/src/routes/register/register.php"
  );
});
