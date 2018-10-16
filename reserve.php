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
    $sql = "SELECT resv_id from reservations where rest_id = $rest_id and user_id = '$user_id' and date_time = '$datetime' and size = $size ORDER BY resv_id DESC;";
    $result = mysqli_query($conn, $sql);
    if(!$result){
        die("QUERY FAILED ".mysqli_error($conn));
    }
    if(mysqli_num_rows($result) != 0){
        $row = mysqli_fetch_assoc($result);
        $resv_id = $row['resv_id'];
    }
		header("refresh:0; url=resv_SMS.php?resv_id=$resv_id");

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);

?>