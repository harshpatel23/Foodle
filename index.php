<?php 
session_start();
include 'templates/header.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/index.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/grid.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
    echo '<script src="scripts/location.js"></script>';
}

include 'templates/navbar.php';
//include 'templates/banner.php';
include 'templates/grid.php';

include 'templates/footer.php';
?>