<?php
session_start();
include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
//	$rest_id=$_GET['rest_id'];
}

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
				<img src="images/dominos.jpg" alt="Dominos" class="img-thumbnail">
			</div>
			<div class="col-sm-9" id="rest-data">
				<h1 class="display-4">
					<?php echo $rest_data['rest_name'] ?></h1>
				<p> <?php echo $rest_data['rest_addr'] ?></p>
				<p>Contact: 
					<?php
						for ($x = 0; $x < sizeof($contact); $x++) {
							echo $contact[$x];
							if($x != sizeof($contact)-1)
								echo ", ";

						}
					?>
				</p>
				<p>
					<span class="fa fa-star" id="rating-star"></span>
					<span id="rating-value" style="padding-right:50px"><?php echo $rest_data['rating'] ?></span>
					<span id="cost-for-2" style="padding-right:50px;">Cost for two: Rs. <?php echo $rest_data['cost'] ?></span>
					<span><button class="btn btn-light" id="fav-btn" onclick="add_fav($rest_id)"><span id="fav-heart" class="fa fa-heart-o"></span>Favourite</button></span>
				</p>				
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" id="side-nav">
		<div class="sticky-top">

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
	</div>
	
	
	
	<div class="col-sm-10">
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

<?php
include 'templates/footer.php';
?>
