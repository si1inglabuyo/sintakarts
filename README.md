# Shopping Cart with User Login

A full-featured e-commerce shopping cart web application with user authentication, product management, and order placement functionality.

## Features

- **User Authentication**
  - User registration with email and password
  - Secure login system with session management
  - Password hashing using MD5 encryption

- **Shopping Cart**
  - Add/remove products from cart
  - Update product quantities
  - Real-time cart total calculations
  - Persistent cart storage in database

- **Product Management**
  - Browse all products
  - Search products by name
  - Product details with pricing and images

- **Order Placement**
  - Complete checkout process
  - Order history tracking
  - User profile management

- **Responsive Design**
  - Modern, user-friendly interface
  - Mobile-friendly layout
  - Interactive form validation

## Tech Stack

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP 7.0+
- **Database**: MySQL
- **Web Server**: Apache (XAMPP/WAMP/LAMP)

## Installation & Setup

### Prerequisites
- XAMPP/WAMP/LAMP (Apache + MySQL + PHP)
- Web browser
- Text editor or IDE

### Step 1: Install XAMPP
1. Download XAMPP from [https://www.apachefriends.org/](https://www.apachefriends.org/)
2. Install XAMPP on your system
3. Start Apache and MySQL from XAMPP Control Panel

### Step 2: Set Up Database
1. Open phpMyAdmin: `http://localhost/phpmyadmin`
2. Create a new database named `shop_db`
3. Import the database tables:

```sql
-- Create user_info table
CREATE TABLE `user_info` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Create products table
CREATE TABLE `products` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Create cart table
CREATE TABLE `cart` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;

-- Create orders table (if needed)
CREATE TABLE `orders` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `user_id` int(100) NOT NULL,
  `total_price` varchar(100) NOT NULL,
  `order_date` timestamp DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4;
```

### Step 3: Add Sample Products
In phpMyAdmin, go to the `products` table and insert sample data:

```sql
INSERT INTO `products` (name, price, image) VALUES
('Laptop', '899.99', 'laptop.jpg'),
('Phone', '599.99', 'phone.jpg'),
('Headphones', '199.99', 'headphones.jpg'),
('Tablet', '399.99', 'tablet.jpg');
```

### Step 4: Configure Database Connection
Update `config.php` with your database credentials:

```php
<?php
$conn = mysqli_connect('localhost','root','your_password','shop_db') or die('connection failed');
?>
```

### Step 5: Place Files in Web Root
1. Copy the project folder to your XAMPP `htdocs` folder:
   - Windows: `C:\xampp\htdocs\shopping-cart`
   - Linux: `/opt/lampp/htdocs/shopping-cart`
   - macOS: `/Applications/XAMPP/htdocs/shopping-cart`

2. Access the application: `http://localhost/shopping-cart`

## Usage

### User Registration
1. Click "Register now" on the login page
2. Enter your name, email, and password
3. Confirm your password
4. Click "Register now" to create an account

### Login
1. Enter your email and password
2. Click "Login now"
3. You'll be redirected to the home page

### Shopping
1. Browse products on the home page
2. Use the search bar to find specific products
3. Enter quantity and click "Add to Cart"
4. Click on your profile to view cart
5. Adjust quantities or remove items
6. Click "Place Order" to checkout

## File Structure

```
shopping-cart/
├── index.php              # Main dashboard & products
├── login.php              # User login page
├── register.php           # User registration page
├── landing-page.php       # Landing/home page
├── place-order.php        # Order checkout page
├── clear-cart.php         # Cart clearing functionality
├── config.php             # Database configuration
├── table database.txt     # Database schema
├── css/
│   ├── style.css          # Main stylesheet
│   ├── login.css          # Login page styles
│   ├── register.css       # Register page styles
│   ├── landing-page.css   # Landing page styles
│   └── place-order.css    # Order page styles
├── js/
│   ├── index.js           # Main functionality
│   ├── login-signup.js    # Login/signup animations
│   ├── landing-page.js    # Landing page scripts
│   └── place-order.js     # Order page scripts
├── images/                # Product and UI images
└── README.md              # This file
```

## Database Schema

### user_info
- `id` - Primary key
- `name` - User's full name
- `email` - User's email address
- `password` - Hashed password

### products
- `id` - Primary key
- `name` - Product name
- `price` - Product price
- `image` - Product image filename

### cart
- `id` - Primary key
- `user_id` - Reference to user_info.id
- `name` - Product name
- `price` - Product price
- `image` - Product image filename
- `quantity` - Quantity in cart

## Security Notes

⚠️ **Important**: This is a learning project. For production use:
- Use stronger password hashing (bcrypt, argon2)
- Implement prepared statements to prevent SQL injection
- Add CSRF tokens for form protection
- Use HTTPS for secure data transmission
- Add input validation on both client and server side
- Implement proper error handling and logging

## Troubleshooting

### "Table doesn't exist" Error
- Ensure database tables are created correctly
- Verify database name is `shop_db`
- Check `config.php` database credentials

### Products Not Showing
- Add sample products to the `products` table
- Ensure images exist in the `images/` folder
- Check database connection in `config.php`

### Login Issues
- Verify user was registered correctly
- Check password is hashed with MD5
- Clear browser cache and cookies

## Future Enhancements

- [ ] Add product categories
- [ ] Implement payment gateway integration
- [ ] Add order tracking system
- [ ] Include product ratings and reviews
- [ ] Improve security with prepared statements
- [ ] Add admin panel for product management
- [ ] Implement email notifications
- [ ] Add wishlist functionality

## Contributing

Feel free to fork this project and submit pull requests for improvements.

## License

This project is open source and available under the MIT License.

## Support

For issues or questions, please create an issue in the GitHub repository.

## Author

Created as a learning project for e-commerce web development.

---

**Last Updated**: December 2025
