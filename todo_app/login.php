<?php
session_start();
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="auth-box">
    <h2>Welcome Back 👋</h2>
    <p style="color:gray; margin-bottom:15px;">Login to continue</p>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>

        <button name="login">Login</button>
    </form>

    <p style="margin-top:10px;">
        No account? <a href="register.php">Register</a>
    </p>
</div>

<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE username='$username'");
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user'] = $user['id'];
        header("Location: index.php");
        exit();
    } else {
        echo "<p style='color:red; text-align:center;'>Invalid login!</p>";
    }
}
?>

</body>
</html>
