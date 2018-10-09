<?php
session_start();
include "templates/db-con.php";
$uname = $_GET['username'];
    $sql = "SELECT fname from person where user_id = '$uname'";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    else{
        if(mysqli_num_rows($result) == 0)
            echo 'valid';
        else
            echo 'not valid';
    }
?>