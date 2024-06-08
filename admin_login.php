
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Admin Login</h2>
    <form action="admin_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" name="username" required>
        <label for="password">Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>


    <div class="container">
        <div class="card">
            <h2>Admin Registration</h2>
            <a href="admin_register.php" class="button">Register</a>
        </div>
       
        <div class="card">
            <h2>User Registration</h2>
            <a href="register.php" class="button">Register</a>
        </div>
        <div class="card">
            <h2>User Login</h2>
            <a href="login.php" class="button">Login</a>
        </div>
    </div>


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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'config.php';

    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, password FROM admins WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['admin_id'] = $id;
            header("Location: admin_dashboard.php");
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No admin found with that username.";
    }

    $stmt->close();
    $conn->close();
}
?>
