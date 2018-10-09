<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin')
{
	echo '<h1>Unauthorized access!!</h1><p>Redirecting...</p>';
	header('refresh: 3; index.php');
	exit;
}


if((!isset($_GET['table'])) && (!isset($_GET['id'])) && (!isset($_GET['value'])))
{
	header('Location: index.php');
	exit;
}

include 'templates/db-con.php';

$table = $_GET['table'];
$id = $_GET['id'];
$value = $_GET['value'];

$sql = "delete from $table where $id = '$value'";
if(!$result = mysqli_query($conn, $sql))
{
	echo '<h3>Cannot delete now! Some error occured</h3> <p>Redirecting...</p>';
	header('refresh: 3; admin_view.php');
}
/*else
	successful*/

?>