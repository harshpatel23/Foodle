<?php
session_start();

include "templates/db-con.php";

$uname = mysqli_real_escape_string($conn, $_POST["usrname"]);
$passwd = mysqli_real_escape_string($conn, $_POST["pwd"]);

$sql = "SELECT pwd, role FROM person where user_id = '$uname'";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
 
    $data = mysqli_fetch_assoc($result);
    if ($data['pwd'] == $passwd) {
		$_SESSION['uname'] = $uname;
		$_SESSION['role'] = $data['role'];	
        if($_SESSION['role'] == 'admin')
            header('Location: admin_view.php?edit_category=person');
        elseif($_SESSION['role'] == 'Manager')
        {
        	$sql = "SELECT rest_id FROM rest where manager_id = '$uname'";
        	$result = mysqli_query($conn, $sql);
        	if (mysqli_num_rows($result) != 0)
        	{
    			$data = mysqli_fetch_assoc($result);
    			$_SESSION['rest_id'] = $data['rest_id'];
        	}


        	header('Location: manager_view.php');
        }
        else
            header('Location: index.php');
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
