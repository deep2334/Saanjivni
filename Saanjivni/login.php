<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="css/login.css">

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

</head>
<body>

<header class="header">
    <a class="logo">SANJIVNI</a>
    <nav class="navbar">
      <a href="index.php">Home</a>
      <a href="login.php">Donate</a>
      <a href="blogin.php">Beneficary</a>
      <a href="login.php">Login</a>
      <a href="aboutus.php">About Us</a>
    </nav>
  </header>

    <!-- alert slide -->
    <?php if(isset($_SESSION['message']))
    {   ?>
        <div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
        <strong>Hey! </strong> <?= $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>


    <!-- Container for the form -->
    <div class="container">
        <h1>Login</h1>
        
        <!-- Form for donor sign up -->
        <form action="functions/authcode.php" name="myForm" method="POST"> 
            <!-- Email field -->
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="EmailId" placeholder="Enter your email">
            </div>
            <!-- Password field -->
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="Password" placeholder="Enter your password">
            </div>
            <!-- Submit button -->
            <div class="submit">
                <button class="btn" name="login_btn" type="submit">Login</button>
            </div>
        </form>

        <!-- Line for creating an account -->
        <div class="create-account">
            Don't have an account? <a href="register.php">Create Account</a>
        </div>

    </div>
    <!-- Link to external JavaScript file -->
    <script src="js/login.js"></script>
</body>
</html>

