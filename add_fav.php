<?php
session_start();

include 'templates/db-con.php';
if(isset($_SESSION['uname'])){
$rest_id = intval($_GET['rest_id']);
$flag = intval($_GET['flag']);
$user_id = $_SESSION['uname'];

if($flag == 1){
	$sql="insert into favourites values('$user_id', '$rest_id')";
	if(mysqli_query($conn, $sql))
		echo 'fav added';
	else
		echo "error $sql";
}
else if($flag == 2){
	$sql="delete from favourites where user_id='$user_id' AND rest_id='$rest_id';";
	if(mysqli_query($conn, $sql))
		echo "fav deleted";
	else
		echo "error $sql";
}
}
else 
	echo 'login';
?>