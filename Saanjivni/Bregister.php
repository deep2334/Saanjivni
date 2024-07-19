<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beneficiary Sign Up</title>

    <!-- Link to external CSS file -->
    <link rel="stylesheet" href="css/Bregister.css">

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
        <h1>Beneficiary Sign Up</h1>
        
        <!-- Form for donor sign up -->
        <form action="functions/authcodeto.php" name="myForm" onsubmit="return validateForm()" method="POST"> 
            <!-- Name field -->
            <div class="form-group">
                <label for="name">Full Name:<span class="s">*</span></label>
                <input type="text" id="name" name="name" placeholder="Enter your Full Name">
                <span class="form-error" id="nameError"></span>
            </div>
            <!-- Email field -->
            <div class="form-group">
                <label for="email">Email:<span class="s">*</span></label>
                <input type="email" id="email" name="EmailId" placeholder="Enter your email">
                <span class="form-error" id="emailError"></span>
            </div>
            <!-- Mobile Number field -->
            <div class="form-group">
                <label for="mobno">Mobile No.<span class="s">*</span></label>
                <input type="tel" id="mobno" name="ContactNumber" placeholder="Enter your Mobile Number">
                <span class="form-error" id="mobnoError"></span>
            </div>
            <!-- Blood group selection -->
            <div class="form-group">
                <label for="bg">Blood Group<span class="s">*</span></label>
                <select id="bg" name="BloodGroup">
                    <option value="">Select Blood Group</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O">O-</option>
                </select>
                <span class="form-error" id="bgError"></span>
            </div>
            <!-- Address field -->
            <div class="form-group">
                <label for="address">Blood Require For:<span class="s">*</span></label>
                <textarea id="address" name="BloodRequirefor" rows="4" placeholder="Blood Require For"></textarea>
                <span class="form-error" id="addressError"></span>
            </div>
            <!-- Password field -->
            <div class="form-group">
                <label for="password">Password:<span class="s">*</span></label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
                <span class="form-error" id="passwordError"></span>
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password:<span class="s">*</span></label>
                <input type="password" id="cpassword" name="Cpassword" placeholder="Confirm Password">
                <span class="form-error" id="cpasswordError"></span>
            </div>
            <!-- Submit button -->
            <div class="submit">
                <button class="btn" name="register_btn" type="submit">Sign Up</button>
            </div>
        </form>
    </div>
    <!-- Link to external JavaScript file -->
    <script src="js/Bregister.js"></script>
</body>
</html>

