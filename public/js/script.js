// Hamburger Menu Navbar
document.addEventListener("DOMContentLoaded", function () {
    var navbarToggler = document.querySelector(".navbar-toggler");
    var collapseEl = document.querySelector(
        navbarToggler.getAttribute("data-mdb-target")
    );
    var bsCollapse = new bootstrap.Collapse(collapseEl, { toggle: false });

    navbarToggler.addEventListener("click", function () {
        bsCollapse.toggle();
    });
});
