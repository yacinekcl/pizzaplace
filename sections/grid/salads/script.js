// cart count
/* // Select all "Add to Cart" buttons and the cart count element
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

// Initialize cart array to store items
let cart = [];
let cartCount = 0;

// Add click event listeners to all "Add to Cart" buttons
document.querySelectorAll('.add-to-cart').forEach((button, index) => {
    button.addEventListener('click', () => {
        const productCard = button.closest('.product-card');
        const name = productCard.querySelector('h3').textContent;
        const price = parseFloat(productCard.querySelector('p').textContent.split(' ')[0]);
        
        // Check if item already exists in cart
        const existingItem = cart.find(item => item.name === name);
        
        if (existingItem) {
            existingItem.quantity += 1;
            existingItem.totalPrice = existingItem.quantity * existingItem.price;
        } else {
            cart.push({
                id: index + 1,
                name: name,
                quantity: 1,
                price: price,
                totalPrice: price
            });
        }
        
        // Update cart count badge
        cartCount++;
        document.getElementById('cart-count').textContent = cartCount;
        
        // Update modal table
        updateCartModal();
    });
}); */

// modal
// Initialize cart array to store items
let cart = [];
let cartCount = 0;

// Add click event listeners to all "Add to Cart" buttons
document.querySelectorAll('.add-to-cart').forEach((button, index) => {
    button.addEventListener('click', () => {
        const productCard = button.closest('.product-card');
        const name = productCard.querySelector('h3').textContent;
        const price = parseFloat(productCard.querySelector('p').textContent.split(' ')[0]);
        
        // Check if item already exists in cart
        const existingItem = cart.find(item => item.name === name);
        
        if (existingItem) {
            existingItem.quantity += 1;
            existingItem.totalPrice = existingItem.quantity * existingItem.price;
        } else {
            cart.push({
                id: index + 1,
                name: name,
                quantity: 1,
                price: price,
                totalPrice: price
            });
        }
        
        // Update cart count badge
        cartCount++;
        document.getElementById('cart-count').textContent = cartCount;
        
        // Update modal table
        updateCartModal();
    });
});

function updateCartModal() {
    const tbody = document.querySelector('.modal-body tbody');
    tbody.innerHTML = '';
    
    cart.forEach(item => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.id}</td>
            <td>${item.name}</td>
            <td>
                <button class="btn btn-sm btn-secondary decrease-qty" data-name="${item.name}">-</button>
                <span class="mx-2">${item.quantity}</span>
                <button class="btn btn-sm btn-secondary increase-qty" data-name="${item.name}">+</button>
            </td>
            <td>${item.totalPrice.toFixed(2)} DZD</td>
            <td>
                <button class="btn btn-danger btn-sm delete-item" data-name="${item.name}">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        `;
        tbody.appendChild(row);
    });
    
    // Add event listeners for quantity buttons and delete buttons
    addQuantityButtonListeners();
}

function addQuantityButtonListeners() {
    // Increase quantity
    document.querySelectorAll('.increase-qty').forEach(button => {
        button.addEventListener('click', (e) => {
            const name = e.target.dataset.name;
            const item = cart.find(item => item.name === name);
            if (item) {
                item.quantity++;
                item.totalPrice = item.quantity * item.price;
                cartCount++;
                document.getElementById('cart-count').textContent = cartCount;
                updateCartModal();
            }
        });
    });
    
    // Decrease quantity
    document.querySelectorAll('.decrease-qty').forEach(button => {
        button.addEventListener('click', (e) => {
            const name = e.target.dataset.name;
            const item = cart.find(item => item.name === name);
            if (item && item.quantity > 1) {
                item.quantity--;
                item.totalPrice = item.quantity * item.price;
                cartCount--;
                document.getElementById('cart-count').textContent = cartCount;
                updateCartModal();
            }
        });
    });
    
    // Delete item
    document.querySelectorAll('.delete-item').forEach(button => {
        button.addEventListener('click', (e) => {
            const name = e.target.closest('.delete-item').dataset.name;
            const itemIndex = cart.findIndex(item => item.name === name);
            if (itemIndex > -1) {
                cartCount -= cart[itemIndex].quantity;
                document.getElementById('cart-count').textContent = cartCount;
                cart.splice(itemIndex, 1);
                updateCartModal();
            }
        });
    });
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