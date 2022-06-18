const postTitle = document.querySelector(".post-title");
const errorP = document.querySelector("p.error");
const btnUpload = document.querySelector(".btn-upload");

postTitle.addEventListener("keyup", () => {
  if (postTitle.value.trim().length < 5) {
    errorP.classList.remove("hidden");

    if (!btnUpload.disabled) {
      btnUpload.disabled = true;
    }

    return;
  }
  errorP.classList.add("hidden");
  btnUpload.disabled = false;
});
