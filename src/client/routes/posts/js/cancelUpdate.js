// create cancel update button
const cancelUpdateButton = document.createElement("button");
cancelUpdateButton.classList.add("btn", "btn-secondary", "btn-cancel-update");
createButtonIcon("x", cancelUpdateButton, "Cancel edit");
// append it to the post footer. Did a timeout because sometimes the cancel button was putting before the edit button.
setTimeout(() => {
  document.querySelector(".post-footer").appendChild(cancelUpdateButton);
}, 0);

cancelUpdateButton.addEventListener("click", () => {
  window.location.reload();
});
