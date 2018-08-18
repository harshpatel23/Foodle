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

$sql = "Select * from dbname.person where uname = $user";
$result = mysql_query($sql) or die (mysql_error ());;
while ($row = mysql_fetch_assoc ($result)){}

mysqli_close($conn);
?>

<form id="profile" action="profile_view.php"name="profile" method="post">
        <div class="form-group">
            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="fname" value="<?php echo $row ['fname']; ?> ">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" value="<?php echo $row ['lname']; ?> ">
            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="contact" value="<?php echo $row ['contact']; ?> ">
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" value="<?php echo $row ['email']; ?> ">
            <label for="fname">Username:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="uname" value="<?php echo $row ['user_id']; ?> ">
            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd" value="<?php echo $row ['pwd']; ?> ">
            <button type="submit" class="btn btn-primary" style="font-size: 13px">Edit</button>
        </div>
        
</form>

<?php include 'templates/footer.php' ?>
