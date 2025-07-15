document.addEventListener("DOMContentLoaded", () => {
  const buttons = document.querySelectorAll(".product-card");
  buttons.forEach((btn) => {
    btn.addEventListener("click", () => {
      alert("Product clicked!");
    });
  });
});
