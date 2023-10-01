const navbarNav = document.querySelector('navbar-nav');
const hamburger = document.getElementById('hamburger-menu');
const login = document.getElementById('login');

// Toggle class 'active' on navbar-nav when hamburger menu is clicked
hamburger.addEventListener('click', function () {
    navbarNav.classList.toggle('active');
});

// Close the navbar-nav when clicking outside
document.addEventListener('click', function (e) {
    if (!navbarNav.contains(e.target) && e.target !== hamburger) {
        navbarNav.classList.remove('active');
    }
});

// btn vta active
hamburger.addEventListener('click', function () {
    login.classList.toggle('active');
});