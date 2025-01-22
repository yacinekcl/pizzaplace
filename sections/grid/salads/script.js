// Select all "Add to Cart" buttons and the cart count element
const addToCartButtons = document.querySelectorAll('.add-to-cart');
const cartCount = document.getElementById('cart-count');

// Initialize cart count
let count = 0;

// Add event listener to each "Add to Cart" button
addToCartButtons.forEach(button => {
  button.addEventListener('click', () => {
    // Increment cart count
    count++;
    // Update the cart count in the navbar
    cartCount.textContent = count;
  });
});
