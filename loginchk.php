<?php
$servername = "localhost";
$username = "root";
$password = "";
$database_name = "foodle";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

$uname = $_POST["usrname"];
$passwd = $_POST["psw"];
$sql = "SELECT pwd FROM person where uname = '$uname'";
if (mysqli_num_rows($result) != 0) {
 
    $data = mysqli_fetch_assoc($result);
    if ($data["pwd"] == $passwd) {
    	$_SESSION["uname"] = $uname;
    }
    
} else {
    echo "0 results";
}
?>

<?php 

 ?>
