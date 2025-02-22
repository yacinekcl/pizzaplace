/*
const name = document.getElementById('name')
const email = document.getElementById('email')
const password = document.getElementById('password')
const form = document.getElementById('form')
const errorElement = document.getElementById('error')

form.addEventListener('submit', (e) => {
    let messages = []
    if (name.value === '' || name.value == null) {
        messages.push('Name is required')
    }

    if (messages.length > 0) {
    e.preventDefault()
    errorElement.innerText = messages.join(', ')
}
}) */

// Get form and form elements
const loginForm = document.getElementById('loginForm');
const nameInput = document.getElementById('name');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');

// Function to show error message
function showError(input, message) {
    const errorDiv = document.createElement('div');
    errorDiv.className = 'error-message';
    errorDiv.style.color = 'red';
    errorDiv.style.fontSize = '12px';
    errorDiv.style.marginTop = '5px';
    errorDiv.textContent = message;
    
    // Remove any existing error message
    const existingError = input.parentElement.querySelector('.error-message');
    if (existingError) {
        existingError.remove();
    }
    
    // Insert error message after the input
    input.parentElement.insertBefore(errorDiv, input.nextSibling);
}

// Function to remove error message
function removeError(input) {
    const errorDiv = input.parentElement.querySelector('.error-message');
    if (errorDiv) {
        errorDiv.remove();
    }
}

// Validation functions
function validateName(name) {
    return name.length >= 2;
}

function validateEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}

function validatePassword(password) {
    return password.length >= 8 && /\d/.test(password);
}

// Add event listeners for real-time validation
nameInput.addEventListener('input', () => {
    if (!validateName(nameInput.value.trim())) {
        showError(nameInput, 'Name must be at least 2 characters long');
    } else {
        removeError(nameInput);
    }
});

emailInput.addEventListener('input', () => {
    if (!validateEmail(emailInput.value.trim())) {
        showError(emailInput, 'Please enter a valid email address');
    } else {
        removeError(emailInput);
    }
});

passwordInput.addEventListener('input', () => {
    if (!validatePassword(passwordInput.value)) {
        showError(passwordInput, 'Password must be at least 8 characters long and contain a number');
    } else {
        removeError(passwordInput);
    }
});

// Form submission handler
loginForm.addEventListener('submit', (e) => {
    e.preventDefault();
    
    const name = nameInput.value.trim();
    const email = emailInput.value.trim();
    const password = passwordInput.value;
    
    let isValid = true;
    
    // Validate all fields
    if (!validateName(name)) {
        showError(nameInput, 'Name must be at least 2 characters long');
        isValid = false;
    }
    
    if (!validateEmail(email)) {
        showError(emailInput, 'Please enter a valid email address');
        isValid = false;
    }
    
    if (!validatePassword(password)) {
        showError(passwordInput, 'Password must be at least 8 characters long and contain a number');
        isValid = false;
    }
    
    if (isValid) {
        // Here you would typically send the form data to your server
        console.log('Form submitted successfully', { name, email, password });
        loginForm.reset();
        // Remove any remaining error messages
        [nameInput, emailInput, passwordInput].forEach(input => removeError(input));
    }
});