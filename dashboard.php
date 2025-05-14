<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// You can access more user details using session
$firstName = htmlspecialchars($_SESSION['first_name']);
$email = htmlspecialchars($_SESSION['email']);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?= $firstName ?>!</h2>
    <p>Email: <?= $email ?></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
