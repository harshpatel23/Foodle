<?php
session_start();
/*
<p>Contact: 
					<?php
						for ($x = 0; $x < sizeof($contact); $x++) {
							echo $contact[$x];
							if($x != sizeof($contact)-1)
								echo ", ";

						}
					?>
				</p>*/
include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
	echo '<script src="scripts/fav.js"></script>';
}
$rest_id=$_GET['rest_id'];

$sql = "SELECT * FROM rest where rest_id = '$rest_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
	$rest_data = mysqli_fetch_assoc($result);
}

$sql = "SELECT contact FROM rest_contact where rest_id = '$rest_id'";
$result = mysqli_query($conn, $sql);
$contact = array();
if (mysqli_num_rows($result) != 0) {
	while($contact_data = mysqli_fetch_assoc($result))
	{
		$contact[] = $contact_data['contact'];
	}
}

$sql = "select distinct category from menu";
$result = mysqli_query($conn, $sql);
$category = array();
if (mysqli_num_rows($result) != 0) {
	while($category_data = mysqli_fetch_assoc($result))
	{
		$category[] = $category_data['category'];
	}
}
?>



<div class="jumbotron jumbotron-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<img src="images/<?php echo abs(crc32($rest_id))%30; ?>.jpg" alt="<?php echo $rest_data['rest_name'];?>" class="img-thumbnail">
			</div>
			<div class="col-sm-9" id="rest-data">
				<h1 class="display-4">
					<?php echo $rest_data['rest_name'] ?></h1>
				
			<p>	<?php
				$cuisine = explode(',', $rest_data['rest_cuisine']);
				for ($x = 0; $x < sizeof($cuisine); $x++) {
					echo $cuisine[$x];
					if($x != sizeof($cuisine)-1)
						echo ", ";
				}
				?>
			</p>
				<p>
					<span class="fa fa-star" id="rating-star"></span>
					<span id="rating-value" style="padding-right:50px"><?php echo $rest_data['rating'] ?></span>
					<span id="cost-for-2" style="padding-right:50px;">Cost for two: Rs. <?php echo $rest_data['cost'] ?></span>
					<span><button class="btn btn-light" id="fav-btn" onclick="add_fav(<?php echo $rest_id; ?>);">
						<span id="fav-heart" class="
<?php
	if(isset($_SESSION['uname'])){
		$user_id = $_SESSION['uname'];
		$sql = "select * from favourites where user_id = '$user_id' and rest_id = '$rest_id';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) != 0) 
			echo 'fa fa-heart';
		else
			echo 'fa fa-heart-o';
	}
	else
		echo 'fa fa-heart-o';
	
?>

					"></span>Favourite</button></span>
				</p>				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" id="side-nav">
		<div class="sticky-top">
		
			<nav id="side-navigation">
			<div id="side-nav-item">
				<a href="#rest_info" id="side-nav-link">About</a>
			</div>
			<div id="side-nav-item">
				<a href="#menu-categories" data-toggle="collapse" id="side-nav-link">Menu</a>
			</div>
			<div class="collapse" id="menu-categories" aria-expanded="false" aria-controls="collapseExample">

<?php 
	foreach ($category as $cat){
		echo '<div id="side-nav-item">
			<a href="#';
		echo $cat;
		echo '" id="side-nav-link">';
		echo $cat;
		echo '</a>
		</div>';
		
	}
?>
				</div>
			<div id="side-nav-item">
				<a href="#reviews" id="side-nav-link">Reviews</a>
			</div>
				</nav>
			</div>
		
		
	</div>
	
	
	
	<div class="col-sm-10" data-spy="scroll" data-target="#side-navigation" data-offset="0">
		<div class="row" id="rest_info">
			<div class="col-md">
				<h1>Address</h1>
				<p><?php echo $rest_data['rest_addr']; ?></p>
			</div>
			<div class="col-md">
				<h1>Contact</h1>
				<p><?php
						for ($x = 0; $x < sizeof($contact); $x++) {
							echo $contact[$x];
							if($x != sizeof($contact)-1)
								echo ", ";

						}
					?></p>
			</div>
			<div class="col-md">
				<h1>Timings</h1>
				<p>
					<?php 	echo $rest_data['start_time'];
							echo ' to ';
							echo $rest_data['end_time'];
					?>
				</p>
			</div>
		</div>
		
		<div id="menu">
		<div class="table-responsive">
<?php
	
	foreach ($category as $cat){
		echo '<h2 id="';
		echo $cat;
		echo '">';
		echo $cat;
		echo "</h2>";
		echo '<table class="table table-hover" id="menu-table">
				<colgroup>
					 <col span="1" style="width: 20%;">
					 <col span="1" style="width: 70%;">
					 <col span="1" style="width: 10%;">
  				</colgroup>
				<thead>
					<tr>
					  <th scope="col">Name</th>
					  <th scope="col">Description</th>
					  <th scope="col">Price</th>
					</tr>
				</thead>
				<tbody>'; 
		$sql = "SELECT item_name, description, price FROM menu WHERE category = '$cat'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) != 0) {
			while($menu_item = mysqli_fetch_assoc($result))
			{
				echo "<tr>
					  <td>";
				echo $menu_item['item_name'];
				echo "</td>
					  <td>";
				echo $menu_item['description'];
				echo "</td>
				 <td>";
				echo $menu_item['price'];
				echo "</td>
    				</tr>";
				
			}
		}
		echo '</tbody>		
			</table>';
	}
	
?>
		</div>
	</div>
		</div>
		</div>


<?php
include 'templates/footer.php';
?>
