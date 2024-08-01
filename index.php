<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: ./login/login.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Phone Accessories Store</title>
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Phones Store & Accessories</h1>
            <nav>
                <ul>
                    <li><a href="#home">Home</a></li>
                    <li><a href="#products">Products</a></li>
                    <li><a href="#on-sale">On-Sale</a></li>
                    <li><a href="#featured">Featured</a></li>
                    <li><a href="#contact">Contact Us</a></li>
                    <li><a href="./logout.php">Logout</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div id="home" class="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="images/banner1.jpg" alt="Banner 1">
            </div>
            <div class="carousel-item">
                <img src="images/banner2.jpg" alt="Banner 2">
            </div>
            <div class="carousel-item">
                <img src="images/banner3.jpg" alt="Banner 3">
            </div>
        </div>
        <a class="prev" onclick="changeSlide(-1)">&#10094;</a>
        <a class="next" onclick="changeSlide(1)">&#10095;</a>
    </div>

    <section id="featured" class="featured">
        <h2>Featured Phones</h2>
        <div class="products" id="featured-phones">
            <!-- Featured phones will be loaded here -->
        </div>
    </section>

    <section id="on-sale" class="on-sale">
        <h2>On Sale</h2>
        <div class="products" id="on-sale-phones">
            <!-- On sale phones will be loaded here -->
        </div>
    </section>

    <section id="products" class="accessories">
        <h2>Accessories</h2>
        <div class="products" id="accessories">
            <!-- Accessories will be loaded here -->
        </div>
    </section>

    <section id="testimonials" class="testimonials">
        <h2>Testimonials</h2>
        <div class="testimonials-container">
            <div class="testimonial">
                <p>"Great products and fantastic service!"</p>
                <h4>- First Code Inc.</h4>
            </div>
            <div class="testimonial">
                <p>"Love the new phone I got, very satisfied!"</p>
                <h4>- Kwame Gilbert</h4>
            </div>
        </div>
    </section>

    <section id="contact" class="contact">
        <h2>Contact Us</h2>
        <form action="contact.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
            <label for="message">Message:</label>
            <textarea id="message" name="message" required></textarea>
            <button type="submit">Send</button>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if ($conn->query($sql) === TRUE) {
                echo "<p>Thank you for your message! We will get back to you soon.</p>";
            } else {
                echo "<p>There was an error submitting your message. Please try again later.</p>";
            }
        }
        ?>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 FirstCode Inc. All rights reserved.</p>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
