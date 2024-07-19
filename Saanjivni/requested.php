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
  include('functions/myfunction.php');

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
    <title>Recipients Dashboard</title>

    <!-- Montserrat Font -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Outlined" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/bloodgroup.css">
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
            <span class="material-icons-outlined">perm_identity</span>
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
            <a href="bdash.php" target="_blank">
              <span class="material-icons-outlined">dashboard</span> Dashboard
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="requested.php" target="_blank">
                <span class="material-icons-outlined">person</span> Requested
            </a>
          </li>
          <li class="sidebar-list-item">
            <a href="logout.php" target="_blank">
                <span class="material-icons-outlined">logout</span> Logout
            </a>
          </li>
        </ul>
      </aside>
      <!-- End Sidebar -->

          <!-- table -->

    <div>
    <div class="data-table">
        <div>
            <div class="bloodgroup">
                <div class="blood-header">
                    <h3>Blood Group</h3>
                </div>
                <div class="blood-body">
                    <div class="table-group">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Blood Group</th>
                                    <th>Name</th>
                                    <th>Request For</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $category = getAll("blbloodrequirer");

                                if(mysqli_num_rows($category) > 0){
                                    foreach($category as $item){
                                        ?>
                                            <tr>
                                                <td><?= $item['id'];?></td>
                                                <td><?= $item['BloodGroup'];?></td>
                                                <td><?= $item['name'];?></td>
                                                <td><?= $item['BloodRequirefor'];?></td>
                                            </tr>
                                        <?php
                                    }
                                }else{
                                    echo "No records found";
                                }
                                ?>
                                <!-- Add more rows as needed -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>




    <!-- Scripts -->
    <script src="js/adash.js"></script>
  </body>
</html>