// these vars already exist in validateTitle.js
btnUpload.addEventListener("click", (e) => {
  if (postTitle.value.trim().length < 5) {
    alert("Title must have 5 or more characters.");
    e.preventDefault();
  }
});
