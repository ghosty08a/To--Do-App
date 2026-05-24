<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $users = json_decode(file_get_contents('users.json'), true);

    $users[] = [
        "username" => $_POST['username'],
        "password" => password_hash($_POST['password'], PASSWORD_DEFAULT)
    ];

    file_put_contents('users.json', json_encode($users, JSON_PRETTY_PRINT));

    header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" href="style.css?v=2">
</head>
<body class="auth-body">

<div class="auth-box">
    <h2>Register</h2>

    <form method="POST">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="password" placeholder="Password" required>
        <button>Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>