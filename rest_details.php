<?php
session_start();
include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_det.css">';
}

$sql = "SELECT * FROM rest where rest_id = '$rest_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
	$data = mysqli_fetch_assoc($result);
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
?>

<div class="jumbotron jumbotron-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<img src="images/dominos.jpg" alt="Dominos" class="img-thumbnail">
			</div>
			<div class="col-sm-9" id="rest-data">
				<h1 class="display-4">
					<?php echo $data['rest_name'] ?></h1>
				<p> <?php echo $data['rest_addr'] ?></p>
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
					<span id="rating-value" style="padding-right:50px"><?php echo $data['rating'] ?></span>
					<span id="cost-for-2">Cost for two: Rs. <?php echo $data['cost'] ?></span>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" id="side-nav">
		<div class="sticky-top">
		<div id="side-nav-item">
			<a href="#" id="side-nav-link">Recommended</a>
		</div>
		<div id="side-nav-item">
			<a href="#menu-categories" id="side-nav-link" data-toggle="collapse">Menu</a>
		</div>
		<div class="collapse" id="menu-categories" aria-expanded="false" aria-controls="collapseExample">
			<div id="side-nav-item">
				<a href="#" id="side-nav-link">category 1</a>
			</div>
			<div id="side-nav-item">
				<a href="#" id="side-nav-link">category 2</a>
			</div>
			<div id="side-nav-item">
				<a href="#" id="side-nav-link">category 3</a>
			</div>
		</div>
		<div id="side-nav-item">
			<a href="#" id="side-nav-link">About</a>
		</div>
		<div id="side-nav-item">
			<a href="#" id="side-nav-link">ener ere</a>
		</div>
		<div id="side-nav-item">
			<a href="#" id="side-nav-link">jasbfjh jabds</a>
		</div>
		</div>
		</div>
	<div class="col-sm-10">rest-details</div>
</div>

<?php
include 'templates/footer.php';
?>
