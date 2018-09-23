<?php
session_start();
include 'templates/header.php';
include 'templates/navbar.php';
//include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_det.css">';
}
?>

<div class="jumbotron jumbotron-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<img src="images/dominos.jpg" alt="Dominos" class="img-thumbnail">
			</div>
			<div class="col-sm-9" id="rest-data">
				<h1 class="display-4">Restaurant Name</h1>
				<p>Address, address</p>
				<p>Contact</p>
				<p>
					<span class="fa fa-star" id="rating-star"></span>
					<span id="rating-value" style="padding-right:50px">4.3</span>
					<span id="cost-for-2">Cost for two: Rs. 500</span>
				</p>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-2" id="side-nav">
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
	<div class="col-sm-10">rest-details</div>
</div>

<?php
include 'templates/footer.php';
?>