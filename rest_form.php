<?php
session_start();
if(!isset($_SESSION['role']) || ($_SESSION['role']!='admin' && $_SESSION['role']!='Manager'))
{
	echo '<h1>Unauthorized access!!</h1><p>Redirecting...</p>';
	header('refresh: 3; index.php');
	exit;
}

include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
	echo '<script src="scripts/confirm_changes.js"></script>';
}

$method = $_GET['method'];

if($method == 'update')
{
	$rest_id = $_GET['rest_id'];
	
	if (!$conn) {
    	die("Connection failed: " . mysqli_connect_error());
	}
	
	$sql = "SELECT * from rest where rest_id = '$rest_id'";


	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
}

?>

<form id="login-form" action="<?php echo "update_rest.php?method=$method" ?>" name="profile" method="post" style = "font-size: 15px; width: 500px; margin: 0 auto">
        <div class="form-group" style = "margin:10px 0px 10px; font-size: inherit;">
			<?php if($method != 'insert'){?>
            <label for="rest_id">rest_id:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="rest_id" id="rest_id" value="<?php if($method !='insert') echo $row ['rest_id']; ?>" readonly>
			<?php } ?>
			
			<label for="rest_name">rest_name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="rest_name" id="rest_name" value="<?php if($method !='insert') echo $row ['rest_name']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>

            <label for="manager_id">manager_id:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="manager_id" id="manager_id" value="<?php if($method !='insert') echo $row ['manager_id']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="rest_addr">rest_addr:<span style="color : red"> * </span></label>
			<textarea class="form-control" rows="4" "margin:10px 0px 10px; font-size: inherit;" name="rest_addr" id="rest_addr" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>><?php if($method !='insert') echo $row ['rest_addr']; ?></textarea>
			
			<label for="rest_cuisine">rest_cuisine:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="rest_cuisine" id="rest_cuisine" value="<?php if($method !='insert') echo $row ['rest_cuisine']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="rating">rating:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="rating" id="rating" value="<?php if($method !='insert') echo $row ['rating']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="start_time">start_time:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="start_time" id="start_time" value="<?php if($method !='insert') echo $row ['start_time']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="end_time">end_time:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="end_time" id="end_time" value="<?php if($method !='insert') echo $row ['end_time']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="cost">cost:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="cost" id="cost" value="<?php if($method !='insert') echo $row ['cost']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="rating_count">rating_count:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="rating_count" id="rating_count" value="<?php if($method !='insert') echo $row ['rating_count']; ?>" required <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="latitude">latitude:</label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="latitude" id="latitude" value="<?php if($method !='insert') echo $row ['latitude']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>
			
			<label for="longitude">longitude:</label>
            <input type="text" class="form-control" "margin:10px 0px 10px; font-size: inherit;" name="longitude" id="longitude" value="<?php if($method !='insert') echo $row ['longitude']; ?>" <?php if($_SESSION['role'] != 'admin') echo "readonly" ?>>

            <div id = "editable" <?php if($_SESSION['role'] != 'admin') echo 'style = "display:none"' ?>>
                <button type="submit" id = "submit" class="btn btn-primary" style="font-size: 13px" onclick="edit_profile.php" >Update Profile</button>
                <button type="button" id = "cancel" class="btn btn-primary" style="font-size: 13px" onclick="location.reload()" >Cancel</button>
            </div>
			<?php 
				if($_SESSION['role'] != 'admin')
					echo '<button type="button" id = "edit" class="btn btn-primary" style="font-size: 13px" onclick="setEditManagerPage()" >Edit Info</button>';?>
			
			<!-- <button type="submit" id = "submit" class="btn btn-primary" style="font-size: 13px">Update data</button>
			
			<button type="button" id = "cancel" class="btn btn-primary" style="font-size: 13px" onclick="location.reload()">Cancel</button>
 -->
	</div>
</form>