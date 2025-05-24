<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

// You can access more user details using session
$firstName = htmlspecialchars($_SESSION['first_name']);
$email = htmlspecialchars($_SESSION['email']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - Mahinay Appliances</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/dashboard.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-transparent px-4">
        <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="img/mahinaylogo.png" height="50" class="me-2" style="object-fit: contain;">
            <span class="brand-text" style="font-size: 1.5rem; font-weight: 600;">Mahinay Appliances</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="#">Shop</a></li>
                <li class="nav-item"><a class="nav-link" href="#">About</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                <?php if(isset($_SESSION['user_id'])): ?>
                    <li class="nav-item">
                        <a class="btn btn-logout ms-3" href="logout.php">Logout</a>
                    </li>
                <?php else: ?>
                    <li class="nav-item">
                        <a class="btn btn-login ms-3" href="login.php">Login</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </nav>
    <!-- Dashboard Content -->
    <div class="container dashboard-content">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <!-- Welcome Modal -->
                <div class="modal fade" id="welcomeModal" tabindex="-1" aria-labelledby="welcomeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content" style="background-color: rgba(255, 255, 255, 0.1); color: white;">
                            <div class="modal-header border-0">
                                <h5 class="modal-title" id="welcomeModalLabel">Welcome, <?= $firstName ?>!</h5>
                                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="mb-0">Email: <?= $email ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <!-- Hero Section -->
  <div class="container hero-section">
    <div class="row align-items-center">
      <div class="col-md-6 text-md-start text-center">
        <h1 class="hero-heading">SHOPPING CAN ALSO BE SIMPLE</h1>
        <p class="hero-subtext">Find amazing deals on top quality appliances — all in one place.</p>
        <a href="#" class="btn btn-shop">SHOP NOW</a>
        <div class="app-rating mt-4">
          
        </div>
      </div>
      <div class="col-md-6 text-center mt-4 mt-md-0">
        <img src="img/washingMachine.png"
             alt="Washing Machine" class="appliance-img">
      </div>
    </div>
  </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Show the welcome modal automatically when the page loads
        document.addEventListener('DOMContentLoaded', function() {
            var welcomeModal = new bootstrap.Modal(document.getElementById('welcomeModal'));
            welcomeModal.show();
        });
    </script>
    
</body>
</html>
