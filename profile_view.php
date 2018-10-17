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


if(isset($_GET['method']) && $_GET['method']=='insert' && $_SESSION['role']=='admin')
{
    $flag = '';
    $method = 'insert';
}
else
{
    $method = 'update';
    $flag = 'true';
    if($_SESSION['role'] == 'admin')
        $user = $_GET['user_id'];  
    else
        $user = $_SESSION['uname'];

$sql = "SELECT * from person where user_id = '$user'";


$result = mysqli_query($conn, $sql);

$row = mysqli_fetch_assoc($result);

mysqli_close($conn);
}

?>

<form id="profile" action="edit_profile.php?method=<?php echo $method; ?>" name="profile" method="post" style = "font-size: 15px; width: 500px; margin: 0 auto">
        <div class="form-group" style = style="margin:10px 0px 10px; font-size: inherit;">
            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="fname" id="fname" value="<?php if($flag) echo $row ['fname']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required pattern="[a-zA-z]+$">
            
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="lname" id="lname" value="<?php if($flag) echo $row ['lname']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> pattern="[A-Za-z]+$">
            
            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="contact" id="contact" value="<?php if($flag) echo $row ['contact']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required pattern="[0-9]{10}$">
            
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="email" id="email" aria-describedby="emailHelp" value="<?php  if($flag) echo $row ['email']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
            
            <label for="fname">Username:<span style="color : red"> * </span></label>
            &nbsp;<span id="correct" class="glyphicon glyphicon-ok" style="color:green;display:none;"></span>
            <div id = "wrong" style="display:none;"><span class="glyphicon glyphicon-remove" style="color:red;"></span>&nbsp;Already Taken!</div>

            <input type="text" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="uname" onkeyup="uname_availability(this.value)" value="<?php if($flag) echo $row ['user_id']; ?>" <?php if($flag) echo 'readonly' ?>>
            
            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="text" class="form-control" style="margin:10px 0px 10px; font-size: inherit;" name="pwd" id="pwd" value="<?php  if($flag) echo $row ['pwd']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?> required minlength="8">
			
			<?php if($_SESSION['role']=='admin')
            {
	           echo	'<label for="role">Role:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" list="role-types" style="margin:10px 0px 10px; font-size: inherit;" name="role" value="';
                if($flag)
                    echo $row ['role']; 
                echo '">';
        }
            ?>
            <datalist id="role-types">
                <option value="Customer"></option>
                <option value="Manager"></option>
                <option value="admin"></option>
            </datalist>
            
            <div id = "editable" <?php if($_SESSION['role'] != 'admin') echo 'style = "display:none"' ?>>
                <button type="submit" id = "submit" class="btn btn-primary" style="font-size: 13px">Update Profile</button>
                <button type="button" id = "cancel" class="btn btn-primary" style="font-size: 13px" onclick="location.reload()" >Cancel</button>
            </div>
			<?php 
				if($_SESSION['role'] != 'admin')
					echo '<button type="button" id = "edit" class="btn btn-primary" style="font-size: 13px" onclick="setEdit()" >Edit Info</button>';?>
        </div>
        
</form>

<?php include 'templates/footer.php' ?>
