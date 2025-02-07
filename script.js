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
  var element = document.body;
  element.classList.toggle("dark-mode");
}

