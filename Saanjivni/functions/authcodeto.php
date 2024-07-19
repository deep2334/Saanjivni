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

    $FullName = mysqli_real_escape_string($con,$_POST['name']);
    $MobileNumber = mysqli_real_escape_string($con,$_POST['ContactNumber']);
    $EmailId = mysqli_real_escape_string($con,$_POST['EmailId']);
    $BloodGroup = mysqli_real_escape_string($con,$_POST['BloodGroup']);
    $BloodRequirefor = mysqli_real_escape_string($con,$_POST['BloodRequirefor']);
    $Password = mysqli_real_escape_string($con,$_POST['password']);
    $Cpassword = mysqli_real_escape_string($con,$_POST['Cpassword']);


    // check if email alerady registerd
    $check_email_query = "SELECT EmailId from tblbloodrequirer WHERE EmailId ='$EmailId' ";
    $check_email_query_run = mysqli_query($con,$check_email_query);

    if(mysqli_num_rows($check_email_query_run)  > 0){
        $_SESSION['message'] = 'Email already registered';
        header('Location: ../Bregister.php');
    }else{
        if($Password == $Cpassword){
            $sql = "INSERT INTO `tblbloodrequirer` (`BloodGroup`, `name`, `EmailId`, `ContactNumber`, `BloodRequirefor`, `Password`) 
            VALUES ('$BloodGroup','$FullName','$EmailId','$MobileNumber','$BloodRequirefor','$Password')";
            if($con->query($sql) == TRUE){
                header('Location: ../bdash.php');
        
                //flag for successfull insertion 
            }else{
                echo "ERROR: $sql <br> $con->error";
                header('Location: ../Bregister.php');
            }
    
        }else{
           $_SESSION['message'] = 'Passwords do not match';
            header('Location: ../Bregister.php');
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

    $login_query = "SELECT * FROM tblbloodrequirer WHERE EmailId='$EmailId' AND password = '$Password'";
    $login_query_run = mysqli_query($con,$login_query);

    if(mysqli_num_rows($login_query_run) > 0){
        $_SESSION['auth'] = true;

        $userdata = mysqli_fetch_array($login_query_run);
        $username = $userdata['FullName'];
        $useremail = $userdata['EmailId'];

        $_SESSION['auth_user'] = [
            'FullName' => $username,
            'EmailId' => $useremail
        ];

        $_SESSION['message'] = "Welcome to Beneficiary Dashboard";
        header('Location: ../bdash.php');

    }else{
        $_SESSION["message"] = "Invalid Credentials";
        header('Location: ../blogin.php');
    }
}
?>