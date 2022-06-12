const orderByButton = document.querySelector(".btn-order-by");
const orderByContent = document.querySelector(".order-by-content");

orderByButton.addEventListener("click", () => {
  orderByContent.classList.toggle("hidden");
});
