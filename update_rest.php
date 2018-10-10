<?php
$method = $_GET['method'];
include 'templates/db-con.php';

if($method == 'insert')
	$sql = "INSERT INTO `rest`(`rest_name`, `rest_addr`, `rest_cuisine`, `rating`, `cost`, `start_time`, `end_time`, `rating_count`, `latitude`, `longitude`) VALUES ('".$_POST['rest_name']."', '".$_POST['rest_addr']."', '".$_POST['rest_cuisine']."', '".$_POST['rating']."', '".$_POST['cost']."', '".$_POST['start_time']."', '".$_POST['end_time']."', '".$_POST['rating_count']."', '".$_POST['latitude']."', '".$_POST['longitude']."');";
else if($method == 'update')
	$sql = "UPDATE `rest` SET `rest_name`='".$_POST['rest_name']."', `rest_addr`='".$_POST['rest_addr']."', `rest_cuisine`='".$_POST['rest_cuisine']."', `rating`='".$_POST['rating']."', `cost`='".$_POST['cost']."', `start_time`='".$_POST['start_time']."', `end_time`='".$_POST['end_time']."', `rating_count`='".$_POST['rating_count']."', `latitude`='".$_POST['latitude']."', `longitude`='".$_POST['longitude']."' WHERE rest_id='".$_POST['rest_id']."'";

if (mysqli_query($conn, $sql)) {
    echo "Operation successful";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
header("refresh:2; url=admin_view.php?edit_category=rest");
?>