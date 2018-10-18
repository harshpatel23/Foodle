<?php
session_start();

include "templates/db-con.php";

$search = $_GET['name'];
$table = $_GET['table'];

if($table == 'rest')
	$sql = "SELECT distinct rest_name FROM rest where rest_name like '$search%' && rest_name !='$search' ORDER BY rest_name limit 5;";
elseif($table=='person' || ($table=='reservations' && $_SESSION['role']=='Manager'))
	$sql = "SELECT distinct fname, lname FROM person where fname like '$search%' or lname like '$search%' ORDER BY fname limit 5;";
elseif($table=='review' || $table=='favourites' || ($table=='reservations' && $_SESSION['role']=='admin'))
	$sql = "SELECT distinct user_id FROM person where user_id like '$search%' ORDER BY user_id limit 5;";

$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
    $name = array();
	while($row = mysqli_fetch_assoc($result))
	{
		if($table=='rest')
			$name[] = $row['rest_name'];
		elseif($table=='person' || ($table=='reservations' && $_SESSION['role']=='Manager'))
			if(!$row['lname'])
				$name[] = $row['fname'];
			else
				$name[] = $row['fname'].' '.$row['lname'];
		elseif($table=='review' || $table=='favourites' || ($table=='reservations' && $_SESSION['role']=='admin'))
			$name[] = $row['user_id'];
	}
    $Json_data = json_encode($name);
    echo $Json_data;
}
?>