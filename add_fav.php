<?php
session_start();

include 'templates/db-con.php';
$rest_id = intval($_GET['q']);
$flag = intval($_GET['f']);
$user_id = $_SESSION['uname'];

if($flag == 1){
	$sql="insert into favourites values($user_id, $rest_id)";
	if(mysqli_query($conn, $sql))
		echo "fav added!";
	else
		echo "error!";
}
else if($flag == 2){
	$sql="delete from favourites where user_id='$user_id', rest_id='$rest_id'";
	if(mysqli_query($conn, $sql))
		echo "fav deleted!";
	else
		echo "error!";
}

?>