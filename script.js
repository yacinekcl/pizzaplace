function scrollToMenu() {
    document.getElementById('ourmenu').scrollIntoView({ behavior: 'smooth' });
  }
  
  // Get the button
var mybutton = document.getElementById("scrollToTopBtn");

// When the user scrolls down 100px from the top of the document, show the button
window.onscroll = function() {
  if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
};

// When the user clicks on the button, scroll to the top of the document
function scrollToTop() {
  window.scrollTo({ top: 0, behavior: 'smooth' }); 
}

// dark mode button
function myFunction() {
  // Toggle body dark mode
  var body = document.body;
  body.classList.toggle("dark-mode");

  // Toggle navbar classes
  var navbar = document.querySelector(".navbar");
  if (navbar.classList.contains("navbar-light")) {
    navbar.classList.remove("navbar-light", "bg-light");
    navbar.classList.add("navbar-dark", "bg-dark");
  } else {
    navbar.classList.remove("navbar-dark", "bg-dark");
    navbar.classList.add("navbar-light", "bg-light");
  }
  
}

// carousel
const container = document.querySelector('.carousel-container');
        const slides = document.querySelectorAll('.carousel-slide');
        const indicatorsContainer = document.querySelector('.indicators');
        const leftArrow = document.querySelector('.left-arrow');
        const rightArrow = document.querySelector('.right-arrow');
        let currentIndex = 0;
        let interval;

        // Create indicators
        slides.forEach((_, index) => {
            const indicator = document.createElement('span');
            indicator.classList.add('indicator');
            indicator.addEventListener('click', () => goToSlide(index));
            indicatorsContainer.appendChild(indicator);
        });

        const indicators = document.querySelectorAll('.indicator');
        indicators[currentIndex].classList.add('active');

        function updateCarousel() {
            container.style.transform = `translateX(-${currentIndex * 100}%)`;
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentIndex);
            });
        }

        function goToSlide(index) {
            currentIndex = index;
            updateCarousel();
            resetAutoSlide();
        }

        function prevSlide() {
            currentIndex = (currentIndex - 1 + slides.length) % slides.length;
            updateCarousel();
            resetAutoSlide();
        }

        function nextSlide() {
            currentIndex = (currentIndex + 1) % slides.length;
            updateCarousel();
            resetAutoSlide();
        }

        function startAutoSlide() {
            interval = setInterval(nextSlide, 3000);
        }

        function resetAutoSlide() {
            clearInterval(interval);
            startAutoSlide();
        }

        // Arrow event listeners
        leftArrow.addEventListener('click', prevSlide);
        rightArrow.addEventListener('click', nextSlide);

        // Start auto-slide
        startAutoSlide();
        updateCarousel();
