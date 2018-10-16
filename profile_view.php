<?php 
session_start();
include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
<?php 
function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}?>

<?php

include 'templates/db-con.php';

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SESSION['role'] == 'admin')
	$user = $_GET['user_id'];
else
	$user = $_SESSION['uname'];

if(isset($_GET['method']) && $_GET['method']=='insert')
    $flag = 'true';
else
    $flag = '';
$sql = "SELECT * from person where user_id = '$user'";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);


?>

<form id="profile" action="edit_profile.php"name="profile" method="post" style = "font-size: 15px; width: 500px; margin: 0 auto">
        <div class="form-group" style = "margin:10px 0px 10px; font-size: inherit;">
            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="fname" id="fname" value="<?php if() echo $row ['fname']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required pattern="[a-zA-z]+$">
            
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="lname" id="lname" value="<?php echo $row ['lname']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> pattern="[A-Za-z]+$">
            
            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="contact" id="contact" value="<?php echo $row ['contact']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required pattern="[0-9]{10}$">
            
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="email" id="email" aria-describedby="emailHelp" value="<?php echo $row ['email']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
            
            <label for="fname">Username:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="uname" value="<?php echo $row ['user_id']; ?>" readonly>
            
            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="pwd" id="pwd" value="<?php echo $row ['pwd']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required minlength="8">
			
			<?php if($_SESSION['role']=='admin')
	echo 	'<label for="role">Role:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="role" value="'.$row ['role'].'">'; ?>
            
            <div id = "editable" <?php if($_SESSION['role'] != 'admin') echo 'style = "display:none"' ?>>
                <button type="submit" id = "submit" class="btn btn-primary" style="font-size: 13px" onclick="edit_profile.php" >Update Profile</button>
                <button type="button" id = "cancel" class="btn btn-primary" style="font-size: 13px" onclick="location.reload()" >Cancel</button>
            </div>
			<?php 
				if($_SESSION['role'] != 'admin')
					echo '<button type="button" id = "edit" class="btn btn-primary" style="font-size: 13px" onclick="setEdit()" >Edit Info</button>';?>
        </div>
        
</form>

<?php include 'templates/footer.php' ?>
