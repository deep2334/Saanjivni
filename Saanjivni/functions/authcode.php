<?php
session_start();
if(isset($_POST['register_btn'])){ // if name is entered then only it will take value

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Sanjivni";

    // connection variable

    $con = mysqli_connect($server, $username, $password, $database); //function to connect sql

    //check for connection success
    if(!$con){
        die("connection to this database faliled due to ". mysqli_connect_error());
    }
    // echo "success connecting to the db";

    // collect post variables

    $FullName = mysqli_real_escape_string($con,$_POST['FullName']);
    $MobileNumber = mysqli_real_escape_string($con,$_POST['MobileNumber']);
    $EmailId = mysqli_real_escape_string($con,$_POST['EmailId']);
    $Gender = mysqli_real_escape_string($con,$_POST['Gender']);
    $Age = mysqli_real_escape_string($con,$_POST['Age']);
    $BloodGroup = mysqli_real_escape_string($con,$_POST['BloodGroup']);
    $Address = mysqli_real_escape_string($con,$_POST['Address']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);
    $Cpassword = mysqli_real_escape_string($con,$_POST['Cpassword']);


    // check if email alerady registerd
    $check_email_query = "SELECT EmailId from tblblooddonars WHERE EmailId ='$EmailId' ";
    $check_email_query_run = mysqli_query($con,$check_email_query);

    if(mysqli_num_rows($check_email_query_run)  > 0){
        $_SESSION['message'] = 'Email already registered';
        header('Location: ../register.php');
    }else{
        if($Password == $Cpassword){
            $sql = "INSERT INTO `tblblooddonars` (`FullName`, `MobileNumber`, `EmailId`, `Gender`, `Age`, `BloodGroup`, `Address`, `Password`) 
            VALUES ('$FullName','$MobileNumber','$EmailId','$Gender','$Age','$BloodGroup','$Address','$Password')";
            if($con->query($sql) == TRUE){
                header('Location: ../ddash.php');
        
                //flag for successfull insertion 
            }else{
                echo "ERROR: $sql <br> $con->error";
                header('Location: ../register.php');
            }
    
        }else{
           $_SESSION['message'] = 'Passwords do not match';
            header('Location: ../register.php');
        }
    } 
}else if(isset($_POST['login_btn'])){

    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "Sanjivni";

    // connection variable

    $con = mysqli_connect($server, $username, $password, $database); //function to connect sql

    //check for connection success
    if(!$con){
        die("connection to this database faliled due to ". mysqli_connect_error());
    }

    $EmailId = mysqli_real_escape_string($con,$_POST['EmailId']);
    $Password = mysqli_real_escape_string($con,$_POST['Password']);

    $login_query = "SELECT * FROM tblblooddonars WHERE EmailId='$EmailId' AND Password = '$Password'";
    $login_query_run = mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['FullName'];
        $useremail = $userdata['EmailId'];
        $role_as = $userdata['role_as'];

        $_SESSION['auth_user'] = [
            'FullName' => $username,
            'EmailId' => $useremail
        ];

        $_SESSION['role_as'] = $role_as;

        if($role_as == 1){
            $_SESSION['message'] = "Welcome to Admin Dashboard";
            header('Location: ../adash.php');
        }else{
            $_SESSION['message'] = "Welcome to Donor Dashboard";
            header('Location: ../ddash.php');
        }

    }else{
        $_SESSION["message"] = "Invalid Credentials";
        header('Location: ../login.php');
    }
}
?>