<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = $_POST['first_name'];
    $middle = $_POST['middle_name'];
    $last = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Secure hashing

    $sql = "INSERT INTO users (first_name, middle_name, last_name, birthday, email, mobile, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$first, $middle, $last, $birthday, $email, $mobile, $password]);
        echo "<h2>Registration Successful!</h2><a href='login.php'>Go to Login</a>";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <script src="register.js"></script>
</head>
<body>
    <h2>Registration Form</h2>
    <form name="regForm" method="POST" onsubmit="return validateForm();">
        First Name: <input type="text" name="first_name" required><br>
        Middle Name: <input type="text" name="middle_name"><br>
        Last Name: <input type="text" name="last_name" required><br>
        Birthday: <input type="date" name="birthday" required><br>
        Email: <input type="email" name="email" required><br>
        Mobile: <input type="text" name="mobile" required><br>
        Password: <input type="password" name="password" required><br>
        Confirm Password: <input type="password" name="confirm_password" required><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
