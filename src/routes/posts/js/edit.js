const editButton = document.querySelector(".btn-edit");

editButton.addEventListener("click", () => {
  // create confirm edit button with its icon
  const updateButton = document.createElement("button");
  updateButton.classList.add("btn", "btn-warning", "btn-update");
  const checkIcon = document.createElement("i");
  checkIcon.classList.add("bi", "bi-check");
  updateButton.appendChild(checkIcon);
  updateButton.innerHTML += "Confirm edit";
  // append it to the post footer
  document.querySelector(".post-footer").appendChild(updateButton);
  // the functionality of this button is updatePost.js file
  const updatePostScript = document.createElement("script");
  updatePostScript.src = "js/updatePost.js";
  document.querySelector("body").appendChild(updatePostScript);

  // title elements
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
