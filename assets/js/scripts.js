/**
 * Custom JavaScript for the theme
 * Ensures lightweight, fast, and efficient interactions
 */

document.addEventListener("DOMContentLoaded", function () {
    // Responsive Mobile Menu Toggle
    const menuToggle = document.createElement("button");
    menuToggle.classList.add("menu-toggle");
    menuToggle.innerHTML = "☰";
    
    const navMenu = document.querySelector(".main-navigation .nav-menu");
    if (navMenu) {
        navMenu.parentNode.insertBefore(menuToggle, navMenu);
        
        menuToggle.addEventListener("click", function () {
            navMenu.classList.toggle("active");
            this.classList.toggle("open");
        });
    }

    // Lazy Loading Images
    const lazyImages = document.querySelectorAll("img[data-src]");
    const lazyLoad = target => {
        const observer = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.removeAttribute("data-src");
                    observer.unobserve(img);
                }
            });
        });
        observer.observe(target);
    };
    lazyImages.forEach(lazyLoad);

});
