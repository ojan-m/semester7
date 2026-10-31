const hamburger = document.querySelector("#hamburger-menu");
const navbarNav = document.querySelector(".navbar-nav");

hamburger.addEventListener("click", function (event) {
  event.preventDefault();
  navbarNav.classList.toggle("active");

  console.log("Menu aktif:", navbarNav.classList.contains("active"));
});

// klik diluar sidebar untuk menghilangkan nav
document.addEventListener("click", function (e) {
  if (!hamburger.contains(e.target) && !navbarNav.contains(e.target)) {
    navbarNav.classList.remove("active");
  }
});

