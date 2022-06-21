const orderByButton = document.querySelector(".btn-order-by");
const orderByContent = document.querySelector(".order-by-content");
const orderByRecent = document.querySelector(".btn-recent");
const orderByOld = document.querySelector(".btn-old");

orderByButton.addEventListener("click", () => {
  orderByContent.classList.toggle("hidden");
});

orderByRecent.addEventListener("click", () => {
  let request = new XMLHttpRequest();
  request.open(
    "GET",
    "http://localhost/stf/yetid/src/utils/order_by_recent.php"
  );
  request.send();
  window.location.href = window.location.href;
});

orderByOld.addEventListener("click", () => {
  let request = new XMLHttpRequest();
  request.open("GET", "http://localhost/stf/yetid/src/utils/order_by_old.php");
  request.send();
  window.location.href = window.location.href;
});
