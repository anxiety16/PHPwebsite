<?php
$host = 'localhost';
$user = 'root';      // replace with your DB username
$pass = 'root';      // replace with your DB password
$db   = 'user_auth'; // your database name

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully"; // Optional: comment out in production
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
