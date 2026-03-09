
let lastScrollY = 0;
const header = document.querySelector('header');
  
window.addEventListener('scroll', () => {
    const currentScrollY = window.pageYOffset || document.documentElement.scrollTop;
  
    if (currentScrollY > lastScrollY + 10) {
      // Scroll dolů - schovat header
      header.style.top = '-100px'; // Nastavte hodnotu podle výšky vašeho headeru
    } else if (currentScrollY < lastScrollY - 1) {
      // Scroll nahoru - zobrazit header
      header.style.top = '1rem';
    }
    
    lastScrollY = currentScrollY;
  });


document.addEventListener("DOMContentLoaded", () => {
  const tsText = document.getElementById("TS_text");

  // Handle scroll event
  window.addEventListener("scroll", () => {
    const scrollY = window.scrollY; // Get the current scroll position
    const scaleFactor = Math.max(0.9, 1.5 - scrollY / 1100); // Calculate scale factor

    // Update the transform property on desktop screens
    if (window.innerWidth >= 1001) {
      tsText.style.transform = `translateX(-50%) scale(${scaleFactor})`;
    }
  });
});


document.addEventListener("DOMContentLoaded", function () {
    const backToTopBtn = document.querySelector(".back_to_top");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 300) {
            backToTopBtn.classList.add("visible");
        } else {
            backToTopBtn.classList.remove("visible");
        }
    });

    backToTopBtn.addEventListener("click", () => {
        window.scrollTo({
            top: 0,
            behavior: "smooth"
        });
    });
});



document.addEventListener("DOMContentLoaded", () => {
  const navButton = document.getElementById("navButton");
  const nav = document.getElementById("nav");
  let isNavVisible = false;

  navButton.addEventListener("click", () => {
    if (isNavVisible) {
      nav.style.visibility = "hidden";
      navButton.textContent = "|||";
    } else {
      nav.style.visibility = "visible";
      navButton.textContent = "X";
    }
    isNavVisible = !isNavVisible;
  });
});

  
