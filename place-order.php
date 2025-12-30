<?php
session_start();
include 'config.php';
$user_id = $_SESSION['user_id'];
if (!isset($user_id)) {
    header('location:login.php');
    exit();
}
$cart_query = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    
    // Here you would typically save this info to orders table
    // For now we'll just clear the cart
    mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');
    
    // Set success message in session
    $_SESSION['order_success'] = true;
    header('Location: index.php');
    exit();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Place Order</title>
    <link rel="stylesheet" href="css/place-order.css">
</head>
<body>
    <div class="container">
        <h1>Place Order</h1>
        
        <div class="checkout-grid">
            <!-- Contact Information Form -->
            <div class="contact-form">
                <h2>Contact Information</h2>
                <form method="POST" action="">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="tel" id="phone" name="phone" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Shipping Address</label>
                        <textarea id="address" name="address" rows="3" required></textarea>
                    </div>
            </div>
            
            <!-- Order Summary -->
            <div class="order-summary">
                <h2>Order Summary</h2>
                <div class="cart-items">
                    <?php if (mysqli_num_rows($cart_query) > 0): ?>
                        <?php while ($item = mysqli_fetch_assoc($cart_query)): ?>
                            <div class="cart-item">
                              <img src="images/<?php echo $item['image']; ?>" alt="<?php echo $item['name']; ?>">
                                <div class="item-details">
                                    <h3><?php echo $item['name']; ?></h3>
                                    <p>Price: $<?php echo number_format($item['price'], 2); ?></p>
                                    <p>Quantity: <?php echo $item['quantity']; ?></p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php mysqli_data_seek($cart_query, 0); ?>
                    <?php else: ?>
                        <p class="empty-cart">Your cart is empty</p>
                    <?php endif; ?>
                </div>
                
                <div class="order-total">
                    <h3>Total: $<?php 
                        $total = 0;
                        while ($item = mysqli_fetch_assoc($cart_query)) {
                            $total += $item['price'] * $item['quantity'];
                        }
                        echo number_format($total, 2);
                    ?></h3>
                </div>
                
                <button type="submit" class="checkout-btn">Place Order</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>