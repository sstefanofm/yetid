const post = document.querySelector(".content");
const subtitleButton = document.querySelector(".btn-subtitle");
const paragraphButton = document.querySelector(".btn-paragraph");

subtitleButton.addEventListener("click", () => {
  // create an input
  const input = createInput("input", "Subtitle");

  // create add button
  const addButton = createAddButton();
  // functionality
  addButton.addEventListener("click", () => {
    // the inner text is the input's value must be greater than 5 characters long
    if (input.value.length > 5 && input.value.length < 255) {
      // create a h3
      const newH3 = document.createElement("h3");
      newH3.classList.add("h3");
      newH3.innerHTML = input.value;
      // append it to the element wrapper
      addButton.parentNode.parentNode.appendChild(newH3);
      // delete the input wrapper
      addButton.parentNode.remove(addButton.parentNode);
    } else {
      alert("All subtitles must have 5 or more characters.");
    }
  });

  // create cancel button
  const cancelButton = createCancelButton();

  // create a wrapper to wrap all the elements of the input
  const inputWrapper = createInputWrapper(input, addButton, cancelButton);

  // create the main wrapper
  const elementWrapper = document.createElement("div");

  elementWrapper.appendChild(inputWrapper);

  post.appendChild(elementWrapper);
});

// same logic as the subtitle button
paragraphButton.addEventListener("click", () => {
  const textarea = createInput("textarea", "Add text here...");

  const addButton = createAddButton();
  addButton.addEventListener("click", () => {
    if (textarea.value.length > 15 && textarea.value.length < 65535) {
      const newP = document.createElement("p");
      newP.classList.add("p");
      newP.innerHTML = textarea.value;
      addButton.parentNode.parentNode.appendChild(newP);
      addButton.parentNode.remove(addButton.parentNode);
    } else {
      alert("All paragraphs must have 15 or more characters.");
    }
  });

  const cancelButton = createCancelButton();

  const textareaWrapper = createInputWrapper(textarea, addButton, cancelButton);

  const elementWrapper = document.createElement("div");
  elementWrapper.appendChild(textareaWrapper);

  post.appendChild(elementWrapper);
});

/* Functions */

const createInput = (name, placeholder) => {
  const input = document.createElement(`${name}`);
  input.type = "text";
  input.classList.add(`${name}`, "form-control");
  input.placeholder = `${placeholder}`;

  return input;
};

const createAddButton = () => {
  const button = document.createElement("button");
  button.classList.add("btn", "btn-add-element");
  const checkIcon = document.createElement("i");
  checkIcon.classList.add("bi", "bi-check");
  button.appendChild(checkIcon);
  button.innerHTML += "Add";

  return button;
};

const createCancelButton = () => {
  const button = document.createElement("button");
  button.classList.add("btn", "btn-cancel-element");
  const xIcon = document.createElement("i");
  xIcon.classList.add("bi", "bi-x");
  button.appendChild(xIcon);
  button.innerHTML += "Cancel";
  // functionality
  button.addEventListener("click", () => {
    // delete input wrapper's parent node
    button.parentNode.parentNode.remove(button.parentNode.parentNode);
  });

  return button;
};

const createInputWrapper = (input, addButton, cancelButton) => {
  const wrapper = document.createElement("div");
  wrapper.classList.add("input-wrapper");
  wrapper.append(input, addButton, cancelButton);

  return wrapper;
};
