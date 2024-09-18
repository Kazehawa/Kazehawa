const slides = document.querySelectorAll(".slide");
let currentSlide = 0;

function showSlide(index) {
    slides.forEach((slide, i) => {
        if (i === index) {
            slide.classList.add("active");
        } else {
            slide.classList.remove("active");
        }
    });
}

function nextSlide() {
    currentSlide = (currentSlide + 1) % slides.length;
    showSlide(currentSlide);
}

function prevSlide() {
    currentSlide = (currentSlide - 1 + slides.length) % slides.length;
    showSlide(currentSlide);
}

// Automatic slideshow
setInterval(nextSlide, 3000); // Change slide every 3 seconds

// Initial slide display
showSlide(currentSlide);

const slideshowContainer = document.querySelector(".slideshow-container");
const firstSlideCaption = slideshowContainer.querySelector(".caption");
firstSlideCaption.classList.add("visible");
