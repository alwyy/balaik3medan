document.addEventListener("DOMContentLoaded", function () {

    /* SLIDER */
    const slides = document.querySelectorAll(".slide");
    const slider = document.getElementById("slider");
    let index = 0;
    let interval;

    function showSlide(i) {
        slides.forEach(slide => slide.classList.remove("active"));
        slides[i].classList.add("active");
    }

    function nextSlide() {
        index = (index + 1) % slides.length;
        showSlide(index);
    }

    function startSlide() {
        interval = setInterval(nextSlide, 3500);
    }

    function stopSlide() {
        clearInterval(interval);
    }

    if (slider) {
        slider.addEventListener("mouseenter", stopSlide);
        slider.addEventListener("mouseleave", startSlide);
    }

    startSlide();

    /* NAVBAR SCROLL */
    const navbar = document.getElementById("navbar");
    window.addEventListener("scroll", () => {
        navbar.classList.toggle("scrolled", window.scrollY > 60);
    });

    /* HAMBURGER */
    const hamburger = document.getElementById("hamburger");
    const navMenu = document.getElementById("navMenu");

    hamburger.addEventListener("click", () => {
        navMenu.classList.toggle("show");
    });

    /* DROPDOWN CLICK */
document.querySelectorAll(".dropdown").forEach(dropdown => {
    const btn = dropdown.querySelector(".drop-btn");

    btn.addEventListener("click", function (e) {
        e.preventDefault();
        e.stopPropagation();

        // Tutup dropdown lain
        document.querySelectorAll(".dropdown").forEach(d => {
            if (d !== dropdown) d.classList.remove("active");
        });

        dropdown.classList.toggle("active");
    });
});


document.addEventListener("click", function () {
    document.querySelectorAll(".dropdown").forEach(dropdown => {
        dropdown.classList.remove("active");
    });
});


    /* WHATSAPP & SCROLL TOP */
    const wa = document.getElementById("wa-float");
    const scrollTopBtn = document.getElementById("scrollTop");

    window.addEventListener("scroll", () => {
        wa.classList.toggle("scrolled", window.scrollY > 100);
        scrollTopBtn.style.display = window.scrollY > 200 ? "block" : "none";
    });

    scrollTopBtn.addEventListener("click", () => {
        window.scrollTo({ top: 0, behavior: "smooth" });
    });

});
