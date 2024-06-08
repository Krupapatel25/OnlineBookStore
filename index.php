<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Bookstore</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header class="header">
        <h1>Welcome to the Online Bookstore</h1>
        <p>Your one-stop shop for all your reading needs.</p>
    </header>
    <div class="container">
        <?php
        require 'config.php';
        $result = $conn->query("SELECT * FROM books");
        while ($row = $result->fetch_assoc()) {
            echo "<div class='card'>";
           
            echo "<h2>" . $row['title'] . "</h2>";
            echo "<p>Author: " . $row['author'] . "</p>";
            echo "<p>Genre: " . $row['genre'] . "</p>";
            echo "<p>Price: $" . $row['price'] . "</p>";
            echo "<p>" . $row['description'] . "</p>";
            echo "<form action='cart.php' method='post'>";
            echo "<input type='hidden' name='book_id' value='" . $row['id'] . "'>";
            echo "<button type='submit' class='button'>Buy</button>";
            echo "</form>";
            echo "</div>";
        }
        $conn->close();
        ?>
    </div>
    <footer class="footer">
        <p>&copy; 2024 Online Bookstore. All rights reserved.</p>
    </footer>





    <div class="container">
        
       


        
        <div class="card">
            <h2>Home Page</h2>
            <a href="home.php" class="button">Home Page</a>
        
       
    </div>

    </div>
</body>
</html>
