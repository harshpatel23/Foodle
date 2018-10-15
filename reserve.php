<?php
session_start();
include 'templates/db-con.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$rest_id = $_GET['rest_id'];
$datetime = $_POST['datetime'];
$user_id = $_SESSION['uname'];
$size = $_POST['table-size'];

$sql = "INSERT into reservations(rest_id,user_id,date_time,size) values('$rest_id','$user_id','$datetime','$size');";

if (mysqli_query($conn, $sql)) {
    echo "Reservation Successfull. You will soon get confirmation SMS containing your Reservation ID on your Mobile";
    header("refresh:2  ; url=rest_details.php?rest_id=$rest_id");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>