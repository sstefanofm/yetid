const form = document.querySelector("#register-form");
const username = document.querySelector(".username");
const password = document.querySelector(".password");
const confirmPassword = document.querySelector(".confirm-password");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  /* Validations inside classes */

  try {
    new Username(username.value);
    new Password(password.value);
    new Password(confirmPassword.value);
  } catch (error) {
    e.preventDefault();
    alert(error.message);

    return;
  }

  /* Send data to server */

  let response = await fetch(
    "http://localhost/stf/yetid/src/server/users/create_user.php",
    {
      method: "POST",
      body: form,
    }
  );

  let result = await response.json();

  console.log(result);
});
