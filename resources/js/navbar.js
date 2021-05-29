const navbarBurger = document.querySelector(".navbar__burger-menu");
const navbar = document.querySelector(".navbar-default__container");

navbarBurger.addEventListener("click", () => {
    navbar.classList.toggle("active");
});
