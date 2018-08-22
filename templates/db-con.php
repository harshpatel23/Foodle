<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database_name = "foodle";

$uname = $_POST["usrname"];
$passwd = $_POST["pwd"];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database_name);

?>