const addButton = document.querySelector(".btn-add");
const addContent = document.querySelector(".add-content");

addButton.addEventListener("click", () => {
  addContent.classList.toggle("hidden");
  addContent.classList.toggle("inline");
});
