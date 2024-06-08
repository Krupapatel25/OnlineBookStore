
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Book</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Add Book</h2>
    <form action="admin_add_book.php" method="post" enctype="multipart/form-data">
        <label for="title">Title:</label>
        <input type="text" name="title" required>
        <label for="author">Author:</label>
        <input type="text" name="author" required>
        <label for="genre">Genre:</label>
        <input type="text" name="genre" required>
        <label for="price">Price:</label>
        <input type="text" name="price" required>
        <label for="description">Description:</label>
        <textarea name="description" required></textarea>
       
        <button type="submit">Add Book</button>
    </form>


    <div class="container">
        <div class="card">
            <h2>Home Page</h2>
            <a href="home.php" class="button">Home Page</a>
        </div>
       
    </div>








</body>
</html>
<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
    header("Location: admin_login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $title = $_POST['title'];
    $author = $_POST['author'];
    $genre = $_POST['genre'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Handle file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

    $stmt = $conn->prepare("INSERT INTO books (title, author, genre, price, description, image) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $title, $author, $genre, $price, $description, $target_file);

    if ($stmt->execute()) {
        header("Location: admin_dashboard.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
