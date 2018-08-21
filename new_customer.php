<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodle";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$Fname = $_POST['fname'];
$Lname = $_POST['lname'];
$Contact = $_POST['contact'];
$Email = $_POST['email'];
$Uname = $_POST['uname'];
$Pwd = $_POST['pwd'];

$sql = "INSERT INTO person (user_id,pwd,fname, lname,email,contact, role)
VALUES ('$Uname', '$Pwd', '$Fname', '$Lname', '$Email', '$Contact', 'Customer')";

if (mysqli_query($conn, $sql)) {
    echo "Account Created Successfully. Please Login to continue";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
header("refresh:3; url=index.php")
?>