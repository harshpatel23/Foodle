<?php
session_start();

include "templates/db-con.php";

$uname = $_POST["usrname"];
$passwd = $_POST["pwd"];

$sql = "SELECT pwd, role FROM person where user_id = '$uname'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
 
    $data = mysqli_fetch_assoc($result);
    if ($data['pwd'] == $passwd) {
		$_SESSION['uname'] = $uname;
		$_SESSION['role'] = $data['role'];	
        if($_SESSION['uname'] != 'admin')
            header('Location: index.php');
        else
            header('Location: admin_view.php?edit_category=person');
        exit;
    }
	else{
		$_SESSION['temp'] = $uname;
		$_SESSION['error'] = 'password';
		header('Location: login.php');
		exit;
	}
		
    
} else {
	$_SESSION['error'] = 'username';
	header('Location: login.php');
	exit;
}
?>
