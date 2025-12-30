document.getElementById('confirm-order').addEventListener('click', function() {
    // Show confirmation message
    alert('Order placed successfully!');
    
    // Clear the cart by making an AJAX request to clear-cart.php
    fetch('clear-cart.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        }
    })
    .then(response => response.text())
    .then(() => {
        // Redirect back to index.php after clearing cart
        window.location.href = 'index.php';
    })
    .catch(error => {
        console.error('Error:', error);
        window.location.href = 'index.php';
    });
});