<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <h1>Your Shopping Cart</h1>
    </header>
    <div class="container">
        <?php
        session_start();
        require 'config.php';

        if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
            echo "<table>";
            echo "<tr><th>Title</th><th>Author</th><th>Price</th><th>Quantity</th><th>Total</th></tr>";
            $total = 0;
            foreach ($_SESSION['cart'] as $book_id => $quantity) {
                $stmt = $conn->prepare("SELECT title, author, price FROM books WHERE id = ?");
                $stmt->bind_param("i", $book_id);
                $stmt->execute();
                $stmt->bind_result($title, $author, $price);
                $stmt->fetch();
                $stmt->close();

                $book_total = $price * $quantity;
                $total += $book_total;

                echo "<tr>";
                echo "<td>$title</td>";
                echo "<td>$author</td>";
                echo "<td>$$price</td>";
                echo "<td>$quantity</td>";
                echo "<td>$$book_total</td>";
                echo "</tr>";
            }
            echo "<tr><td colspan='4'>Total</td><td>$$total</td></tr>";
            echo "</table>";
            echo "<a href='checkout.php' class='button'>Proceed to Checkout</a>";
        } else {
            echo "<p>Your cart is empty.</p>";
        }

        $conn->close();
        ?>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Online Bookstore. All rights reserved.</p>
    </footer>
</body>





<div class="container">
        
       


        
        <div class="card">
            <h2>Home Page</h2>
            <a href="home.php" class="button">Home Page</a>
        
       
    </div>

    </div>









</html>
