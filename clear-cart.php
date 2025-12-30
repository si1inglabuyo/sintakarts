   <?php
   session_start();
   $_SESSION['cart'] = []; // Empty the cart
   echo json_encode(['success' => true]);
   ?>