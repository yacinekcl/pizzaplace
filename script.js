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
