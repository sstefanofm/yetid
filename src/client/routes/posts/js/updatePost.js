// create confirm edit button with its icon
const updateButton = document.createElement("button");
updateButton.classList.add("btn", "btn-warning", "btn-update");
createButtonIcon("check", updateButton, "Confirm edit");

// append button to the post footer
document.querySelector(".post-footer").append(updateButton);

updateButton.addEventListener("click", () => {
  // grab all the required variables;
  const id = new URLSearchParams(window.location.search).get("id");
  const mainTitle = document.querySelector(".post-title");
  const mainSubtitle = document.querySelector(".main-subtitle-input");
  const mainContent = document.querySelector(".main-content-textarea");

  /* validations */

  if (!validateString(mainTitle.value, 5, 255)) {
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
        if (mainSubtitle.nextElementSibling.classList.contains("error")) {
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
        if (mainContent.nextElementSibling.classList.contains("error")) {
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

  /* form data for update_post.php */

  let formData = new FormData();
  formData.append("id", id);
  formData.append("title", document.querySelector(".post-title").value);
  formData.append("main_subtitle", mainSubtitle.value.trim());
  formData.append("main_content", mainContent.value.trim());
  formData.append("content", document.querySelector(".content").innerHTML);

  fetch("controller/update_post.php", {
    method: "POST",
    body: formData,
  }).then(() => {
    window.location.href = "../../";
  });
});

/* functions */

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
