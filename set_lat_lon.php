<?php
session_start();
$_SESSION['latitude'] = floatval($_GET['lat']);
$_SESSION['longitude'] = floatval($_GET['lon']);
?>