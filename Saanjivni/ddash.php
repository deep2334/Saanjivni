<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Sanjivni";

    $con = mysqli_connect($host, $username, $password, $database);

    if (!$con){
        die("Connection Failed: ". mysqli_connect_error());
    }

  session_start();

  // if (isset($_SESSION['auth'])){
  //     $_SESSION['message'] = "You are alerady logged in";
  //     header('Location: adash.php');
  //     exit(); // so it does not exectute after this line
  // }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Donor Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/adash.css">
  </head>
  <body>

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

    <div class="grid-container">

      <!-- Header -->
      <header class="header">
        <div class="menu-icon" onclick="openSidebar()">
          <span class="material-icons-outlined">menu</span>
        </div>
        <div class="header-left">

        </div>
        <div class="header-right">
            <span class="material-icons-outlined">account_circle</span>
        </div>
      </header>
      <!-- End Header -->

      <!-- Sidebar -->
      <aside id="sidebar">
        <div class="sidebar-title">
          <div class="sidebar-brand">
          SANJIVNI
          </div>
          <span class="material-icons-outlined" onclick="closeSidebar()">close</span>
        </div>

        <ul class="sidebar-list">
          <li class="sidebar-list-item">
            <a href="ddash.php">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="donate.php">
                <span class="material-icons-outlined">volunteer_activism</span> Donated
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php">
                <span class="material-icons-outlined">logout</span> Logout
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

      <!-- Main -->
      <main class="main-container">
        <div class="main-title">
          <h2>DONOR DASHBOARD</h2>
        </div>

        <div class="main-cards">

          <div class="card">
            <div class="card-inner">
              <h3>CAMPS</h3>
              <span class="material-icons-outlined">water_damage</span>
            </div>
            <h1>249</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>DONORS</h3>
              <span class="material-icons-outlined">person</span>
            </div>
            <h1>25</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>BENEFICIARY</h3>
              <span class="material-icons-outlined">diversity_1</span>
            </div>
            <h1>15</h1>
          </div>

          <div class="card">
            <div class="card-inner">
              <h3>RECIPIENTS</h3>
              <span class="material-icons-outlined">vaccines</span>
            </div>
            <h1>50</h1>
          </div>

        </div>
      </main>
      <!-- End Main -->

    </div>

    <!-- Scripts -->
    <!-- ApexCharts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/apexcharts/3.35.5/apexcharts.min.js"></script>
    <!-- Custom JS -->
    <script src="js/adash.js"></script>
  </body>
</html>