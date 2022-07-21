const form = document.querySelector("#form");

const validateString = (str, minLen, maxLen) => {
  if (str.length < minLen || str.length > maxLen) {
    return false;
  }
  return true;
};

// prevent form from submitting if data is wrong;

form.addEventListener("submit", (event) => {
  let username = document.querySelector(".username").value.trim();
  let password = document.querySelector(".password").value.trim();
  let confirmPassword = document
    .querySelector(".confirm-password")
    .value.trim();
  let adminRadio = form.role;

  if (!validateString(username, 5, 20)) {
    alert("Username must have 5 or more characters.");
    event.preventDefault();
    return;
  }

  if (!validateString(password, 8, 255)) {
    alert("Password must have 8 or more characters.");
    event.preventDefault();
    return;
  }

  if (!validateString(confirmPassword, 8, 255)) {
    alert("Password confirmation must have 8 or more characters.");
    event.preventDefault();
    return;
  }

  if (password !== confirmPassword) {
    alert("Both passwords have to match!");
    event.preventDefault();
    return;
  }

  if (adminRadio.value == "") {
    alert("You have to select a user role to continue.");
    event.preventDefault();
    return;
  }
});
