<!DOCTYPE html>
<html lang="en">
<?php
    include "inc/head.inc.php";
?>
<body>
<?php
    include "inc/nav.inc.php";
?>
<div class="container mt-5">
    <h1 class="mb-4">Checkout</h1>
    <form id="checkoutForm" action="process_checkout.php" method="post">

    <!-- Product details table -->
    <table class="table">
        <thead>
            <tr>
                <th>Image</th>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody id="cart-items-body">
            <!-- Items will be added here dynamically -->
        </tbody>
    </table>
    
    <!-- Order button -->
    <div class="text-center">
        <!-- <button type="submit" class="btn btn-primary btn-lg">Order</button> -->
        <button type="button" class="btn btn-primary btn-lg" onclick="checkout()">Order</button>

    </div>
</div>
<?php
    include "inc/footer.inc.php";
?>

<script>
    // Retrieve cart items from local storage
    var cartItemsLocalStorage = localStorage.getItem('cartItems');
    if (cartItemsLocalStorage) {
        cartItemsLocalStorage = JSON.parse(cartItemsLocalStorage);
        var tbody = document.getElementById('cart-items-body');

        // Loop through cart items and dynamically create table rows
        cartItemsLocalStorage.forEach(function(item) {
            var tr = document.createElement('tr');
            tr.innerHTML = `
                <td><img src="${item.image}" alt="Product Image" class="img-thumbnail" style="width: 100px;"></td>
                <td>${item.name}</td>
                <td>${item.quantity}</td>
                <td>$${item.price}</td>
            `;
            tbody.appendChild(tr);
        });
    } else {
        // Display a message if the cart is empty
        var tbody = document.getElementById('cart-items-body');
        var tr = document.createElement('tr');
        tr.innerHTML = '<td colspan="4">Your cart is empty</td>';
        tbody.appendChild(tr);
    }


    function checkout() {
    var cartItems = localStorage.getItem('cartItems');
    if (cartItems) {
        // Send cart data to the server using AJAX
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "process_checkout.php", true);
        xhr.setRequestHeader("Content-Type", "application/json");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        try {
                            localStorage.removeItem('cartItems');
                        } catch (e) {
                            console.error('Error removing item from local storage:', e);
                        }

                        // Handle successful checkout
                        alert(response.message);
                        // Empty the local storage                        
                        // Redirect to a new page after successful checkout
                        window.location.href = "success_page.php";
                    } else {
                        // Handle checkout failure
                        alert(response.message);
                    }
                } else {
                    // Handle HTTP error
                    alert('Error occurred during checkout. Please try again.');
                }
            }
        };
        xhr.send(cartItems);
    } else {
        // Handle case where cart is empty
        alert('Your cart is empty');
    }
}



</script>
</body>
</html>
