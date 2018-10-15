<?php
session_start();
include "templates/db-con.php";

$time = $_GET['time'];
$size = $_GET['size'];
$rest_id = $_GET['rest_id'];
    
    $sql = "SELECT quantity from tables where rest_id = $rest_id && size = '$size';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $max_tables = $row['quantity'];
    }
    
    $sql = "select COUNT(*) from reservations where rest_id = $rest_id and size = $size and date_time = '$time';";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $booked_tables = $row['COUNT(*)'];
    }
    
    if($booked_tables < $max_tables)
        echo 'available';
    else
        echo 'not-available';
mysqli_close($conn);
?>