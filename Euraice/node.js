// Controlling mobile nav bar
const navButton = document.getElementById('navButton');
const nav = document.getElementById('nav');
let isNavVisible = false;
navButton.addEventListener('click', () => {
    if (isNavVisible) {
        //Skrytí menu
        nav.style.display = 'none';
        navButton.textContent = '|||';
    } else {
        //Zobrazení menu
        nav.style.display = 'inline';
        navButton.textContent = 'X';
    }
    isNavVisible = !isNavVisible;
});



//Changing background & text & logo color after scrolled
window.addEventListener('scroll', function() {
    const header = document.getElementById('header');
    if (window.scrollY > 50) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
});