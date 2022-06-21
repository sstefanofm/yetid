document.querySelector(".btn-delete").insertAdjacentHTML(
  "afterend",
  `
<button class="btn btn-primary btn-add"><i class="bi bi-plus"></i></button>

<div class="add-content hidden">
  <button class="btn btn-secondary btn-subtitle">Subtitle</button>
  <button class="btn btn-secondary btn-paragraph">Paragraph</button>
  <button class="btn btn-secondary btn-image">Image</button>
</div>
`
);

const buttonToggleScript = document.createElement("script");
buttonToggleScript.src = "js/addButtonToggle.js";
const addElementsScript = document.createElement("script");
addElementsScript.src = "js/addElements.js";

document.body.append(buttonToggleScript, addElementsScript);
