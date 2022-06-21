const editButton = document.querySelector(".btn-edit");
const mainSubtitle = document.querySelector(".main-subtitle");
const mainContent = document.querySelector(".main-content");

editButton.addEventListener("click", () => {
  // disable edit Button permanently
  editButton.disabled = true;
  // enable title edit permanently
  document.querySelector(".post-title").disabled = false;

  // confirm update button
  const updatePostScript = document.createElement("script");
  updatePostScript.src = "js/updatePost.js";
  // cancel update button
  const cancelUpdateScript = document.createElement("script");
  cancelUpdateScript.src = "js/cancelUpdate.js";

  // append scripts to the body
  document.querySelector("body").append(updatePostScript, cancelUpdateScript);

  /* main subtitle */

  // create input with main-subtitle value;
  const mainSubInput = document.createElement("input");
  mainSubInput.type = "text";
  // add the main-subtitle class so I can pass it to the FormData when updating;
  mainSubInput.classList.add("main-subtitle-input", "form-control");
  mainSubInput.value = mainSubtitle.innerHTML.trim();
  // append it to the main-subtitle div;
  mainSubtitle.innerHTML = "";
  mainSubtitle.appendChild(mainSubInput);

  /* main content */

  // same logic as the main subtitle;
  const mainContentInput = document.createElement("textarea");
  mainContentInput.classList.add("main-content-textarea", "form-control");
  mainContentInput.value = mainContent.innerHTML.trim();
  mainContent.innerHTML = "";
  mainContent.appendChild(mainContentInput);

  // subtitle elements
  document.querySelectorAll(".h3").forEach((h3) => {
    // create an input with the same value as the h3
    const input = createInput("input", h3.innerHTML);

    // wrap it in its own wrapper
    const inputWrapper = wrap(document.createElement("div"), input);

    // append it to the element wrapper
    const elementWrapper = wrap(h3.parentNode, inputWrapper);

    // create buttons
    const confirmButton = document.createElement("button");
    confirmButton.classList.add("btn", "btn-confirm-edit");
    confirmButton.innerHTML = "Confirm";
    // functionality
    confirmButton.addEventListener("click", () => {
      // create an h3 with the new text (input's value)
      const newH3 = document.createElement("h3");
      newH3.classList.add("h3");
      newH3.innerHTML = input.value;
      // append it to the element wrapper and delete input wrapper
      elementWrapper.appendChild(newH3);
      elementWrapper.removeChild(inputWrapper);
    });

    const cancelButton = createCancelButton(
      h3.innerHTML,
      elementWrapper,
      "h3",
      inputWrapper
    );
    const deleteButton = createDeleteButton(elementWrapper);

    // append them to the input wrapper
    inputWrapper.append(confirmButton, cancelButton, deleteButton);

    // delete the old h3
    elementWrapper.removeChild(h3);
  });

  // paragraph elements (same logic as the h3s)
  document.querySelectorAll(".p").forEach((p) => {
    const textarea = createInput("textarea", p.innerHTML);
    const textareaWrapper = wrap(document.createElement("div"), textarea);
    const elementWrapper = wrap(p.parentNode, textareaWrapper);

    const confirmButton = document.createElement("button");
    confirmButton.classList.add("btn", "btn-confirm-edit");
    confirmButton.innerHTML = "Confirm";
    confirmButton.addEventListener("click", () => {
      const newP = document.createElement("p");
      newP.classList.add("p");
      newP.innerHTML = textarea.value;
      elementWrapper.appendChild(newP);
      elementWrapper.removeChild(textareaWrapper);
    });

    const cancelButton = createCancelButton(
      p.innerHTML,
      elementWrapper,
      "p",
      textareaWrapper
    );
    const deleteButton = createDeleteButton(elementWrapper);

    textareaWrapper.append(confirmButton, cancelButton, deleteButton);
    elementWrapper.removeChild(p);
  });
});

/* Functions */

const createInput = (name, value) => {
  const input = document.createElement(`${name}`);
  input.type = "text";
  input.classList.add(`${name}`);
  input.value = `${value}`;

  return input;
};

const wrap = (wrapper, wrapped) => {
  wrapper.appendChild(wrapped);

  return wrapper;
};

const createCancelButton = (
  oldValue,
  wrapper,
  createdElement,
  removedElement
) => {
  const cancelButton = document.createElement("button");
  cancelButton.classList.add("btn", "btn-cancel-edit");
  cancelButton.innerHTML = "Cancel";
  // functionality
  cancelButton.addEventListener("click", () => {
    // create an h3 with the old text (h3 innerHTML)
    const oldElement = document.createElement(`${createdElement}`);
    oldElement.classList.add(`${createdElement}`);
    oldElement.innerHTML = oldValue;
    // append it to the elementWrapper and delete the input wrapper
    wrapper.appendChild(oldElement);
    wrapper.removeChild(removedElement);
  });

  return cancelButton;
};

const createDeleteButton = (wrapper) => {
  const deleteButton = document.createElement("button");
  deleteButton.classList.add("btn", "btn-delete-element", "btn-danger");
  const trashCan = document.createElement("i");
  trashCan.classList.add("bi", "bi-trash");
  deleteButton.appendChild(trashCan);
  // functionality
  deleteButton.addEventListener("click", () => {
    // delete element wrapper
    wrapper.remove(wrapper);
  });

  return deleteButton;
};

const createButtonIcon = (name, button, text) => {
  const icon = document.createElement("i");
  icon.classList.add("bi", `bi-${name}`);
  button.appendChild(icon);
  button.innerHTML += `${text}`;
};
