const uploadButton = document.querySelector(".btn-upload");
const mainSubtitle = document.querySelector(".input-subtitle");
const mainContent = document.querySelector(".textarea-content");
const postContent = document.querySelector(".post-content");

const validateString = (str, minLength, maxLength) => {
  const trimmed = str.trim();
  if (trimmed.length < minLength || trimmed.length > maxLength) {
    return false;
  }
  return true;
};

const inputError = (input, errorMessage) => {
  input.classList.add("input-error");
  const errorP = document.createElement("p");
  errorP.innerHTML = `${errorMessage}`;
  errorP.classList.add("error");
  input.insertAdjacentElement("afterend", errorP);
};

uploadButton.addEventListener("click", () => {
  if (!validateString(postTitle.value, 5, 255)) {
    alert("Post title must have more than 5 characters.");
    return;
  }

  if (!validateString(mainSubtitle.value, 5, 255)) {
    inputError(
      mainSubtitle,
      "The main subtitle must have 5 or more characters."
    );

    mainSubtitle.addEventListener("keyup", () => {
      if (validateString(mainSubtitle.value, 5, 255)) {
        if (mainSubtitle.nextElementSibling) {
          mainSubtitle.nextElementSibling.remove();
        }
        mainSubtitle.classList.remove("input-error");
      }
    });
    alert("The main subtitle must have 5 or more characters.");

    return;
  }

  if (!validateString(mainContent.value, 15, 65535)) {
    inputError(mainContent, "The content must have 15 or more characters");

    mainContent.addEventListener("keyup", () => {
      if (validateString(mainContent.value, 15, 65535)) {
        if (mainContent.nextElementSibling) {
          mainContent.nextElementSibling.remove();
        }
        mainContent.classList.remove("input-error");
      }
    });
    alert("The content must have 15 or more characters.");

    return;
  }

  // user-added subtitles validation;

  let inputsAreValid = true;

  let subtitles = document.querySelectorAll(".input");

  subtitles.forEach((sub) => {
    if (sub.value.length < 5) {
      inputsAreValid = false;
      return;
    }
    inputsAreValid = true;
  });

  let paragraphs = document.querySelectorAll(".textarea");

  paragraphs.forEach((paragraph) => {
    if (paragraph.value.length < 15) {
      inputsAreValid = false;
      return;
    }
    inputsAreValid = true;
  });

  if (!inputsAreValid) {
    alert("All input fields must be added (or canceled).");
    return;
  }

  /* after all valdiations... send POST request to upload_post.php controller */

  let formData = new FormData();

  // postTitle already been declared at validateTitle.js;
  formData.append("title", postTitle.value.trim());
  formData.append("main_subtitle", mainSubtitle.value.trim());
  formData.append("main_content", mainContent.value.trim());
  formData.append("content", postContent.innerHTML);

  fetch("controller/upload_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});
