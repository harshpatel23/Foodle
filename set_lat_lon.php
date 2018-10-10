<?php
session_start();
if(!isset($_SESSION['lat-lon']))
{
	$_SESSION['latitude'] = floatval($_GET['lat']);
	$_SESSION['longitude'] = floatval($_GET['lon']);
	$_SESSION['lat-lon'] = set;
}
else 
	echo 'set';
