const container = document.querySelector(".sidebar-nav");
const linkItems = document.querySelectorAll(".link-item");
const darkMode = document.querySelector(".dark-mode");
const logo = document.querySelector(".logo svg");

container.addEventListener("mouseenter", () => {
  container.classList.add("active");
});

container.addEventListener("mouseleave", () => {
  container.classList.remove("active");
});

for (let i = 0; i < linkItems.length; i++) {
  linkItems[i].addEventListener("click", (e) => {
    linkItems.forEach((linkItem) => {
      linkItem.classList.remove("active");
    });
    linkItems[i].classList.add("active");
  });
}
