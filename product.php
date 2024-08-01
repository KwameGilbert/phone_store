<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login/login.html");
    exit();
}

require './database/connect_db.php'; // Make sure to include your database connection

// Fetch product details based on the ID passed in the URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
$product = null;

if ($product_id > 0) {
    $stmt = $conn->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
    }
    $stmt->close();
}

if (!$product) {
    echo "<p>Product not found.</p>";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($product['name']); ?> - Product Details</title>
    <link rel="stylesheet" href="product.css">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Phones Store & Accessories</h1>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#products">Products</a></li>
                    <li><a href="index.php#on-sale">On-Sale</a></li>
                    <li><a href="index.php#featured">Featured</a></li>
                    <li><a href="index.php#contact">Contact Us</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="product-details">
        <div class="product-image">
            <img src="images/<?php echo htmlspecialchars($product['image']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>">
        </div>
        <div class="product-info">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p><strong>Price:</strong> $<?php echo htmlspecialchars($product['price']); ?></p>
            <p><strong>Details:</strong> <?php echo nl2br(htmlspecialchars($product['details'])); ?></p>
            <p><strong>Specifications:</strong> <?php echo nl2br(htmlspecialchars($product['specifications'])); ?></p>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>&copy; 2024 FirstCode Inc. All rights reserved.</p>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
