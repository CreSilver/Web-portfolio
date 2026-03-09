// NavBar - tlačítko
document.addEventListener("DOMContentLoaded", () => {
    const navButton=document.getElementById("navButton");
    const nav=document.getElementById("nav");
    let isNavVisible=false;

    navButton.addEventListener("click", () => {
        if(isNavVisible){// schování menu
            nav.style.visibility="hidden";
            navButton.textContent="|||";
        }else{// viditelné menu
            nav.style.visibility="visible";
            navButton.textContent="X";
        }
        isNavVisible = !isNavVisible;
    });
});