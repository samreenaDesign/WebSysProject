document.addEventListener("DOMContentLoaded", function () {
    // Code to be executed when the DOM is ready (i.e. the document is fully loaded):
    loadCartFromStorage();
    // Call saveCartToStorage when the window is unloaded (e.g., when navigating away)
    window.addEventListener('unload', saveCartToStorage);

    // Check if the cart-icon element exists before executing registerEventListeners
    if (document.getElementById("cart-icon")) {
        registerEventListeners();
    } else {
        console.error("cart-icon element not found.");
    }
});

// var currentPopup = null;

function registerEventListeners(){
    // Add click event listener to all "Add to Cart" buttons
    const addToCartButtons = document.querySelectorAll('.add-to-cart');
    addToCartButtons.forEach(button => {
        button.addEventListener('click', function(event) { // Pass event parameter here
            // Check user login status before adding to cart
            checkLoginStatus(event); // Pass event parameter to checkLoginStatus
        });
    });

    // This code below is for cart dropdown
    var cartIcon = document.getElementById("cart-icon");
    cartIcon.addEventListener("mouseenter", showCartDropdown);
    cartIcon.addEventListener("mouseleave", hideCartDropdown);

    // Update the cart dropdown initially
    updateCartDropdown();

    // Add click event listener to the offcanvas menu button
    const offcanvasMenuButton = document.querySelector('[data-bs-toggle="offcanvas"]');
    offcanvasMenuButton.addEventListener('click', function() {
        // Get the offcanvas header
        const offcanvasHeader = document.querySelector('.offcanvas-header');
        
        // Get the close button
        const closeButton = offcanvasHeader.querySelector('.btn-close');

        // Move the icons to the left side of the close button
        offcanvasHeader.insertBefore(document.getElementById('register-icon'), closeButton);
        offcanvasHeader.insertBefore(document.getElementById('login-icon'), closeButton);
        offcanvasHeader.insertBefore(document.getElementById('cart-icon'), closeButton);

        // Space out the icons
        const icons = offcanvasHeader.querySelectorAll('.icon');
        icons.forEach(icon => {
            icon.style.marginRight = '10px'; // Adjust the margin as needed
        });

         // Add left margin only to the register icon
        const registerIcon = document.getElementById('register-icon');
        registerIcon.style.marginLeft = '50px'; // Adjust the margin as needed
    });

    // Add click event listener to the offcanvas close button
    const offcanvasCloseButton = document.querySelector('.offcanvas-header .btn-close');
    offcanvasCloseButton.addEventListener('click', function() {

        // Move the icons back to their original position in the navbar header
        moveIconsToNavbarHeader();

        // Remove any additional styling classes applied during offcanvas interaction
        removeOffcanvasStylingClasses();
    });

    // Add event listener to the checkout button
    document.getElementById("checkout-button").addEventListener("click", function() {
        // Redirect to the checkout page
        window.location.href = "checkout.php"; // Replace "checkout.php" with the URL of your checkout page
    });

    // Add event listener to the logout icon
    const logoutIcon = document.getElementById("logout-icon");
    logoutIcon.addEventListener("click", function() {
        // Call the clearCartItems function when the logout icon is clicked
        clearCartItems();
    });
};

// Sample cart items (replace with actual cart items)
let cartItems = [];

// Function to save cart items to localStorage
function saveCartToStorage() {
    localStorage.setItem('cartItems', JSON.stringify(cartItems));
}

// Function to load cart items from localStorage
function loadCartFromStorage() {
    const storedCartItems = localStorage.getItem('cartItems');
    if (storedCartItems) {
        cartItems = JSON.parse(storedCartItems);
        updateCartDropdown();
    }
}

// Function to check user login status
function checkLoginStatus(event) {
    // Make an AJAX request to your server-side script (PHP)
    // Example using Fetch API
    fetch('check_login.php')
      .then(response => response.json())
      .then(data => {
        // Log the response data in the console
        console.log(data);
        // Check the response data to determine login status
        if (data.status === 'success' && data.loggedin) {
          // User is logged in, continue with adding to cart
          addToCart(event); // Pass the event parameter to addToCart
        } else {
          // User is not logged in, show pop-up message
          alert("Login into your account to add to cart!");
        }
      })
      .catch(error => console.error('Error:', error));
}

function addToCart(event) {

    // Extract item information from the clicked button's parent element
    const productItem = event.target.closest('.card-body');
    const productName = productItem.querySelector('.card-title').textContent;
    const productPrice = productItem.querySelector('.text-muted').textContent.split(': ')[1]; // Extracting the price from the text content

    // Check if the product already exists in the cart
    const existingItemIndex = cartItems.findIndex(item => item.name === productName);

    if (existingItemIndex !== -1) {
        // If the product already exists, increment its quantity
        cartItems[existingItemIndex].quantity++;
    } else {
        // Otherwise, add the item to the cart with a quantity of 1
        cartItems.push({ name: productName, price: productPrice, quantity: 1 });
    }

    // Show the cart dropdown if it's hidden
    showCartDropdown();
    console.log("Cart dropdown shown.");
    
    // Update the cart dropdown
    updateCartDropdown();

    // Log a message to indicate that the item was added to the cart
    console.log(productName + " added to cart.");

    // Print in console to check if the selector is selecting the class add-to-cart
    console.log("Clicked on Add to Cart button with class add-to-cart");
}

// Function to update cart dropdown
function updateCartDropdown() {
    const cartItemsContainer = document.getElementById("cart-items");
    const badge = document.querySelector("#cart-icon .badge");

     // Check if the badge element exists before setting its textContent
     if (badge) {
        // Update badge content with the total number of items in the cart
        badge.textContent = cartItems.length;
    } else {
        console.error("Badge element not found.");
    }

    // Check the number of items in the cart
    console.log("Number of cart items:", cartItems.length);
    // Check if the cartItemsContainer element exists before setting its innerHTML
    if (cartItemsContainer) {
        // Update cart items in the dropdown
        if (cartItems.length === 0) {
            cartItemsContainer.innerHTML = "<p style='text-align: center; font-weight: bold; text-decoration: underline;'>Your cart is empty</p>";
        } else {
            // Clear existing content
            cartItemsContainer.innerHTML = "";

            // Render cart items
            cartItems.forEach(item => {
                const itemContainer = document.createElement("div");
                itemContainer.classList.add("cart-item");

                // Product name
                const itemName = document.createElement("p");
                itemName.textContent = item.name;
                itemContainer.appendChild(itemName);

                // Quantity controls
                const quantityControls = document.createElement("div");
                quantityControls.classList.add("quantity-controls");

                // Minus button
                const minusButton = document.createElement("button");
                minusButton.textContent = "-";
                minusButton.style.marginRight = "10px"; // Add margin-right to the minus button
                minusButton.addEventListener("click", () => decreaseQuantity(item));
                quantityControls.appendChild(minusButton);

                // Quantity display
                const quantityDisplay = document.createElement("span");
                quantityDisplay.textContent = item.quantity;
                quantityControls.appendChild(quantityDisplay);

                // Plus button
                const plusButton = document.createElement("button");
                plusButton.textContent = "+";
                plusButton.style.marginLeft = "10px"; // Add margin-left to the plus button
                plusButton.addEventListener("click", () => increaseQuantity(item));
                quantityControls.appendChild(plusButton);

                itemContainer.appendChild(quantityControls);

                // Remove button with icon
                const removeButton = document.createElement("img");
                removeButton.src = "/images/dustbin_icon.png"; // Path to your dustbin icon image
                removeButton.alt = "Remove";
                removeButton.classList.add("remove-button");
                removeButton.style.width = "20px"; // Adjust the width of the icon
                removeButton.style.height = "20px"; // Adjust the height of the icon
                removeButton.addEventListener("click", () => removeFromCart(item));
                itemContainer.appendChild(removeButton);

                cartItemsContainer.appendChild(itemContainer);
            });
        }
    } else {
        console.error("Cart items container element not found.");
    }
}

// Function to remove item from cart
function removeFromCart(item) {
    const index = cartItems.findIndex(cartItem => cartItem.name === item.name);
    if (index !== -1) {
        cartItems.splice(index, 1);
        updateCartDropdown();
    }
}

// Function to increase quantity
function increaseQuantity(item) {
    item.quantity++;
    updateCartDropdown();
}

// Function to decrease quantity
function decreaseQuantity(item) {
    if (item.quantity > 1) {
        item.quantity--;
    }
    updateCartDropdown();
}

// This code is for cart
function showCartDropdown() {
    var cartDropdown = document.getElementById("cart-dropdown");
    cartDropdown.classList.add("show");
}

function hideCartDropdown() {
    var cartDropdown = document.getElementById("cart-dropdown");
    cartDropdown.classList.remove("show");
}

function topBtn() { 
    var btn = $('#back-to-top'); 
   
    $(window).scroll(function() { 
        if ($(window).scrollTop() > 300) { 
            btn.show(); 
        } else { 
            btn.hide(); 
        } 
    });
}    

// Function to clear cart items when user logs out
function clearCartItems() {
    // Empty the cartItems array
    cartItems = []; 

    // Update the cart dropdown to reflect the changes
    updateCartDropdown(); 

    // Log a message to indicate that the cart items are cleared
    console.log("Cart items cleared."); 

    // Make an AJAX request to store the cart items in the database
    storeCartItemsInDatabase();
}

// Function to store cart items in the database
function storeCartItemsInDatabase() {
    // Make an AJAX request to your server-side script (PHP) to store the cart items in the database
    fetch('store_cart_items.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify(cartItems),
    })
    .then(response => response.json())
    .then(data => {
        // Log the response from the server
        console.log(data);
    })
    .catch(error => console.error('Error:', error));
}




