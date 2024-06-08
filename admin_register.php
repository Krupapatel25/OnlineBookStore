
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Register</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Admin Register</h2>
    <form action="admin_register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="email">Email:</label>
        <input type="email" name="email" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Register</button>
    </form>


    <div class="container">
        
        <div class="card">
            <h2>Admin Login</h2>
            <a href="admin_login.php" class="button">Login</a>
        </div>
        <div class="card">
            <h2>User Registration</h2>
            <a href="register.php" class="button">Register</a>
        </div>
        <div class="card">
            <h2>User Login</h2>
            <a href="login.php" class="button">Login</a>
        </div>


        
        <div class="card">
            <h2>Home Page</h2>
            <a href="home.php" class="button">Home Page</a>
        
       
    </div>

    </div>





</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO admins (username, email, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $username, $email, $password);

    if ($stmt->execute()) {
        header("Location: admin_login.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
