let currentSlide = 0;
const totalSlides = document.querySelectorAll('.slider-image').length;

function showSlide(index) {
  const slides = document.querySelectorAll('.slider-image');
  currentSlide = (index + totalSlides) % totalSlides;

  slides.forEach((slide, i) => {
    slide.style.display = i === currentSlide ? 'block' : 'none';
  });
}

function changeSlide(direction) {
  showSlide(currentSlide + direction);
}

showSlide(currentSlide);
