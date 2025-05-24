<?php
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first = $_POST['first_name'];
    $middle = $_POST['middle_name'];
    $last = $_POST['last_name'];
    $birthday = $_POST['birthday'];
    $email = $_POST['email'];
    $mobile = $_POST['mobile'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 

    $sql = "INSERT INTO users (first_name, middle_name, last_name, birthday, email, mobile, password) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";

    try {
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$first, $middle, $last, $birthday, $email, $mobile, $password]);
        $success = "Registration Successful! <a href='login.php'>Go to Login</a>";
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Register - Mahinay Appliances</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/register.css">
  <script src="register.js"></script>
</head>
<body>

  <div class="register-box">
    <h2 class="mb-4 text-center">Create an Account</h2>

    <?php
      if (!empty($success)) {
          echo "<div class='alert alert-success'>$success</div>";
      } elseif (!empty($error)) {
          echo "<div class='alert alert-danger'>$error</div>";
      }
    ?>

    <form method="POST" onsubmit="return validateForm();">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="first_name" class="form-label">First Name</label>
          <input type="text" class="form-control" name="first_name" id="first_name" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="middle_name" class="form-label">Middle Name</label>
          <input type="text" class="form-control" name="middle_name" id="middle_name">
        </div>
        <div class="col-md-6 mb-3">
          <label for="last_name" class="form-label">Last Name</label>
          <input type="text" class="form-control" name="last_name" id="last_name" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="birthday" class="form-label">Birthday</label>
          <input type="date" class="form-control" name="birthday" id="birthday" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" name="email" id="email" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="mobile" class="form-label">Mobile</label>
          <input type="text" class="form-control" name="mobile" id="mobile" required>
        </div>
        <div class="col-md-6 mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" name="password" id="password" required>
        </div>
        <div class="col-md-6 mb-4">
          <label for="confirm_password" class="form-label">Confirm Password</label>
          <input type="password" class="form-control" name="confirm_password" id="confirm_password" required>
        </div>
      </div>
      <button type="submit" class="btn btn-register w-100">Register</button>
      <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>

</body>
</html>
