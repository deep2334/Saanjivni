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
function getAll($table){
    global $con;
    $query = "SELECT * FROM $table";
    return $query_run = mysqli_query($con, $query);
}

function redirect($url, $message) {
    $_SESSION['message'] = $message;
    header('Location: '. $url);
    exit();
}
?>