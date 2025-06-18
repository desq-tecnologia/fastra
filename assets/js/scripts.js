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

    // Smooth Scroll to Anchor Links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener("click", function (e) {
            const target = document.querySelector(this.getAttribute("href"));
            if (target) {
                e.preventDefault();
                target.scrollIntoView({ behavior: "smooth", block: "start" });
            }
        });
    });

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

    // Back to Top Button
    const backToTop = document.createElement("button");
    backToTop.classList.add("back-to-top");
    backToTop.innerHTML = "↑";
    document.body.appendChild(backToTop);

    backToTop.addEventListener("click", function () {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

    window.addEventListener("scroll", function () {
        if (window.scrollY > 300) {
            backToTop.classList.add("visible");
        } else {
            backToTop.classList.remove("visible");
        }
    });
});
