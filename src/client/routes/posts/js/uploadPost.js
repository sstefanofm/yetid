const uploadButton = document.querySelector(".btn-upload");
const mainSubtitle = document.querySelector(".input-subtitle");
const mainContent = document.querySelector(".textarea-content");
const postContent = document.querySelector(".content");

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

  let subtitles = document.querySelectorAll(".input");

  if (subtitles.length > 0) {
    subtitles.forEach((sub) => {
      if (sub.value.length < 5) {
        if (!sub.nextSibling.classList.contains("error")) {
          let p = document.createElement("p");
          p.classList.add("error");
          p.innerHTML = "Must be more than 5 characters long.";

          sub.insertAdjacentElement("afterend", p);
        }
      }
    });
    alert("You still have subtitles pending to be added.");
    return;
  }

  // user-added paragraphs validation;

  let paragraphs = document.querySelectorAll(".textarea");

  if (paragraphs.length > 0) {
    paragraphs.forEach((paragraph) => {
      if (paragraph.value.length < 15) {
        let p = document.createElement("p");
        p.classList.add("error");
        p.innerHTML = "Must be more than 15 characters long.";

        paragraph.insertAdjacentElement("afterend", p);
      }
    });
    alert("You still have paragraphs pending to be added.");
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