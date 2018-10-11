<?php
session_start();
$search = $_GET['name'];

include "templates/db-con.php";
$sql = "SELECT distinct rest_name FROM rest where rest_name like '$search%' && rest_name !='$search' ORDER BY rest_name limit 5";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) != 0) {
    $name = array();
	while($row = mysqli_fetch_assoc($result))
	{
		$name[] = $row['rest_name'];
	}
    $Json_data = json_encode($name);
    echo $Json_data;
}
?>