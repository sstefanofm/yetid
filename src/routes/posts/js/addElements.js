const post = document.querySelector(".post");
const titleButton = document.querySelector(".btn-title");
const paragraphButton = document.querySelector(".btn-paragraph");
const imageButton = document.querySelector(".btn-image");

/* general */

const createWrapper = () => {
  return document.createElement("div");
};

const createInput = (type) => {
  let newInput = document.createElement("input");
  newInput.type = `${type}`;
  newInput.classList.add("input");

  return newInput;
};

const createButtons = (inputElement, newElement) => {
  let addButton = document.createElement("button");
  addButton.classList.add("btn");
  addButton.classList.add("btn-add-element");
  addButton.innerHTML = "Add";

  addButton = addButtonFunctionality(addButton, inputElement, newElement);

  let cancelButton = document.createElement("button");
  cancelButton.classList.add("btn");
  cancelButton.classList.add("btn-cancel-element");
  cancelButton.innerHTML = "Cancel";

  cancelButton = cancelButtonFunctionality(cancelButton, inputElement);

  return [addButton, cancelButton];
};

const addButtonFunctionality = (button, inputElement, newElement) => {
  button.addEventListener("click", () => {
    const textElement = document.querySelector(`.${inputElement}`);
    let createdElement = document.createElement(`${newElement}`);

    createdElement.innerHTML = textElement.value;
    createdElement.classList.add(`${newElement}`);
    createdElement.classList.add("upload");

    post.appendChild(createdElement);
    post.removeChild(textElement.parentNode);
  });

  return button;
};

const cancelButtonFunctionality = (button, inputElement) => {
  button.addEventListener("click", () => {
    const textElement = document.querySelector(`.${inputElement}`);

    post.removeChild(textElement.parentNode);
  });

  return button;
};

/* add title */

titleButton.addEventListener("click", () => {
  let wrapper = createWrapper();

  wrapper.appendChild(createInput("text"));
  createButtons("input", "h3").forEach((button) => {
    wrapper.appendChild(button);
  });

  post.appendChild(wrapper);
});

/* add paragraph */

const createTextArea = () => {
  let textArea = document.createElement("textarea");
  textArea.classList.add("textarea");

  return textArea;
};

paragraphButton.addEventListener("click", () => {
  let wrapper = createWrapper();

  wrapper.appendChild(createTextArea());
  createButtons("textarea", "p").forEach((button) => {
    wrapper.appendChild(button);
  });

  post.appendChild(wrapper);
});

/* add image */

const fileTypes = [
  "image/gif",
  "image/jpeg",
  "image/png",
  "image/webp",
  "image/jpg",
];

const validFileType = (file) => {
  return fileTypes.includes(file.type);
};

const createFileInput = () => {
  let newInput = createInput("file");
  newInput.classList.add("filechooser");
  newInput.accept = ".jpg, .jpeg, .png, .gif, .webp";

  newInput.addEventListener("input", updateImageDisplay);

  return newInput;
};

const createDefaultText = () => {
  let defaultText = document.createElement("p");
  defaultText.innerHTML = "No image currently selected to upload";

  return defaultText;
};

const createImagePreview = () => {
  let imagePreview = createWrapper();
  imagePreview.classList.add("image-preview");
  imagePreview.appendChild(createDefaultText());

  return imagePreview;
};

const createImage = (file) => {
  let image = document.createElement("img");
  image.src = URL.createObjectURL(file);
  image.classList.add("image");

  return image;
};

const updateImageDisplay = () => {
  let preview = document.querySelector(".image-preview");
  const filechooser = document.querySelector(".filechooser");

  preview.removeChild(preview.firstChild);

  const selectedFiles = filechooser.files;

  if (selectedFiles.length === 0) {
    preview.appendChild(createDefaultText());
    return;
  }

  for (const file of selectedFiles) {
    if (validFileType(file)) {
      preview.appendChild(createImage(file));
      return;
    }
    preview.appendChild(createDefaultText());
    return;
  }
};

const addNewImage = () => {
  let filechooser = document.querySelector(".filechooser");

  for (const file of filechooser.files) {
    post.appendChild(createImage(file));
  }

  post.removeChild(filechooser.parentNode);
};

const createImageButtons = () => {
  let addButton = document.createElement("button");
  addButton.classList.add("btn");
  addButton.classList.add("btn-add-element");
  addButton.innerHTML = "Add";

  addButton.addEventListener("click", addNewImage);

  let cancelButton = document.createElement("button");
  cancelButton.classList.add("btn");
  cancelButton.classList.add("btn-cancel-element");
  cancelButton.innerHTML = "Cancel";

  cancelButton = cancelButtonFunctionality(cancelButton, "filechooser");

  return [addButton, cancelButton];
};

imageButton.addEventListener("click", () => {
  let wrapper = createWrapper();

  wrapper.appendChild(createImagePreview());
  wrapper.appendChild(createFileInput());
  createImageButtons().forEach((button) => {
    wrapper.appendChild(button);
  });

  post.appendChild(wrapper);
});
