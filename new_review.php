<?php
session_start();
include "templates/db-con.php";
$review = $_POST['comment'];
$user_id = $_GET['uid'];
$rest_id = $_GET['rid'];

    $sql = "insert into review(rest_id,user_id,comment) values ('$rest_id','$user_id','$review');";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    else{
        echo "Review Added";
        header('Location: rest_details.php?rest_id=$rest_id#reviews');
    }
?>