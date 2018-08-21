<?php 
session_start();
include 'templates/header.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/index.css">';
}

include 'templates/navbar.php';
include 'templates/banner.php';
include 'templates/grid.php';

include 'templates/footer.php';
?>