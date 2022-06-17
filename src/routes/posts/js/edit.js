const editButton = document.querySelector(".btn-edit");
const postBody = document.querySelector(".post-body");
const titleElements = document.querySelectorAll(".h3");
const paragraphElements = document.querySelectorAll(".p");

const createWrapper = () => {
  return document.createElement("div");
};

const createInputField = (innerContent) => {
  const input = document.createElement("input");
  input.type = "text";
  input.value = innerContent;
  input.classList.add("input");

  return input;
};

const createTextArea = (innerContent) => {
  const textarea = document.createElement("textarea");
  textarea.value = innerContent;
  textarea.classList.add("textarea");

  return textarea;
};

const createButtons = (inputField, wrapper, oldElement) => {
  const confirmButton = document.createElement("button");
  confirmButton.classList.add("btn", "btn-confirm-edit");
  confirmButton.addEventListener("click", () => {
    oldElement.innerHTML = inputField.value;
    postBody.appendChild(oldElement);
    wrapper.remove(inputField.parentNode);
  });
  confirmButton.innerHTML = "Confirm";

  const cancelButton = document.createElement("button");
  cancelButton.classList.add("btn", "btn-cancel-edit");
  cancelButton.addEventListener("click", () => {
    wrapper.remove(inputField.parentNode);
    postBody.appendChild(oldElement);
  });
  cancelButton.innerHTML = "Cancel";

  const deleteButton = document.createElement("button");
  deleteButton.classList.add("btn", "btn-danger", "btn-delete-element");
  deleteButton.addEventListener("click", () => {
    wrapper.remove(inputField.parentNode);
  });
  const trashIcon = document.createElement("i");
  trashIcon.classList.add("bi", "bi-trash");
  deleteButton.appendChild(trashIcon);

  return [confirmButton, cancelButton, deleteButton];
};

editButton.addEventListener("click", () => {
  titleElements.forEach((h3) => {
    postBody.removeChild(h3);
    const input = createInputField(h3.innerHTML);
    const wrapper = createWrapper();
    wrapper.appendChild(input);
    createButtons(input, wrapper, h3).forEach((button) => {
      wrapper.appendChild(button);
    });
    postBody.appendChild(wrapper);
  });

  paragraphElements.forEach((p) => {
    postBody.removeChild(p);
    const textarea = createTextArea(p.innerHTML);
    const wrapper = createWrapper();
    wrapper.appendChild(textarea);
    createButtons(textarea, wrapper, p).forEach((button) => {
      wrapper.appendChild(button);
    });
    postBody.appendChild(wrapper);
  });
});
