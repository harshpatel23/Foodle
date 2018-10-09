<?php
session_start();
if(!isset($_SESSION['uname']) || $_SESSION['uname']!='admin')
{
	echo '<h1>You do not have permission!!</h1><p>Redirecting u in 3 seconds</p>';
	header('refresh: 3; index.php');
	die();	
}

include 'templates/header.php';
include 'templates/navbar.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
}

?>

<div class="row">
	<div class="col-sm-2">
		<nav id="side-navigation">
			<ul class="nav nav-pills flex-column side-nav bg-light">
				<li class="nav-item" id="side-nav-item"><a href="#" class="nav-link" id="side-nav-link">About</a></li>
				<li class="nav-item" id="side-nav-item"><a href="#" class="nav-link" id="side-nav-link">About</a></li>
				<li class="nav-item" id="side-nav-item"><a href="#" class="nav-link" id="side-nav-link">About</a></li>
			</ul>
		</nav>
	</div>
</div>

<?php
include 'templates/footer.php'; 
?>