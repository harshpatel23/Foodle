<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "foodle";

$uname = $_POST["usrname"];
$passwd = $_POST["pwd"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

$sql = "SELECT pwd FROM person where user_id = '$uname'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
 
    $data = mysqli_fetch_assoc($result);
    if ($data['pwd'] == $passwd) {
		$_SESSION['uname'] = $uname;
        header('Location: index.php');
        exit;
    }
	else{
		echo 'incorrect password';
		header('refresh:3; index.php');
		die();
	}
		
    
} else {
    echo 'incorrect username';
	header('refresh:3; index.php');
	die();
}
?>
