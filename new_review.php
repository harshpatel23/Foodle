<?php
session_start();
include "templates/db-con.php";
$user_id = $_GET['user'];
$rest_id = $_GET['rest'];
$comment = $_GET['review'];

    $sql = "insert into review('rest_id','user_id','date_time','comment') values ('$rest_id','$user_id','CURRENT_TIMESTAMP','$comment');";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    else{
        echo "success";
    }
?>