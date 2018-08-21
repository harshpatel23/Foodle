<?php 
session_start();
include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
<?php 
function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}?>

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

$user = $_SESSION['uname'];

$sql = "SELECT * from person where user_id = '$user'";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);


?>

<form id="profile" action="profile_view.php"name="profile" method="post" style = "font-size: 15px; width: 500px; margin: 0 auto">
        <div class="form-group" style = "margin:10px 0px 10px; font-size: inherit;">
            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="fname" id="fname" value="<?php echo $row ['fname']; ?> " readonly>
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="lname" value="<?php echo $row ['lname']; ?> " readonly>
            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="contact" value="<?php echo $row ['contact']; ?> " readonly>
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="email" aria-describedby="emailHelp" value="<?php echo $row ['email']; ?> " readonly>
            <label for="fname">Username:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="uname" value="<?php echo $row ['user_id']; ?> " readonly>
            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="pwd" value="<?php echo $row ['pwd']; ?> " readonly>
            <button type="button" class="btn btn-primary" style="font-size: 13px" onclick="setEdit()">Edit Info</button>
        </div>
        
</form>

<?php include 'templates/footer.php' ?>
