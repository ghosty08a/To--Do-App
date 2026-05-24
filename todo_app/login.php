<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $users = json_decode(file_get_contents('users.json'), true);

    foreach ($users as $user) {
        if ($user['username'] == $_POST['username'] &&
            password_verify($_POST['password'], $user['password'])) {

            $_SESSION['user'] = $user['username'];
            header("Location: index.php");
            exit();
        }
    }

    $error = "Invalid login!";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body class="auth-body">

<div class="auth-box">
    <h2>Login</h2>

    <?php if(isset($error)) echo "<p class='error'>$error</p>"; ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Login</button>
    </form>

    <p>Don't have an account? <a href="register.php">Register</a></p>
</div>

</body>
</html>