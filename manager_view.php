<?php 
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='Manager')
{
	echo '<h1>Unauthorized access!!</h1><p>Redirecting...</p>';
	header('refresh: 3; index.php');
	exit;
}

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
	echo '<link rel="stylesheet" type="text/css" href="styles/admin_page.css">';
	echo '<script src="scripts/confirm_changes.js"></script>';
}

$table = 'reservations';

include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

if(!isset($_GET['page']))
	$page = 0;
else
	$page = intval($_GET['page'])-1;
?>
<h2 style="margin-left: 20px;">Reservations</h2>
<?php


$sql = "SELECT count(*) from reservations where rest_id = '".$_SESSION['rest_id']."';";
$result = mysqli_query($conn, $sql);
$column = array();
if (mysqli_num_rows($result) != 0)
{
	$data = mysqli_fetch_assoc($result);
	$total_rows = $data['count(*)'];
}

?>
<div class="container-fluid">
	<table class="table table-hover table-bordered">
	  	<thead>
			<tr>
				<th>Cancel</th>
				<th>Resv. Id</th>
				<th>Customer Name</th>
				<th>Time</th>
				<th>Table size</th>
			</tr>
		</thead>
		<tbody>


<?php

$results_per_page = 15;
$start = $page * $results_per_page;

if(isset($_POST['search-bar']))
{
	$flag = "";
	if(is_numeric($_POST['search-bar']))
		$sql = "SELECT `resv_id`, `fname`, `user_id`, `lname`, `date_time`, `size` FROM `reservations` natural join person WHERE resv_id = '".$_POST['search-bar']."' ORDER BY date_time DESC";
	else
	{
		$names = array();
		$names = explode(" ", $_POST['search-bar']);
		$fname = $names[0];
		if(sizeof($names) == 2)
		{
			$lname = $names[1];
			$sql = "SELECT `resv_id`, `fname`, `user_id`, `lname`, `date_time`, `size` FROM `reservations` natural join person WHERE fname like '".$fname."%' and lname like '".$lname."%' ORDER BY date_time DESC";
		}
		else
			$sql = "SELECT `resv_id`, `fname`, `user_id`, `lname`, `date_time`, `size` FROM `reservations` natural join person WHERE fname like '".$fname."%' or lname like '".$fname."%' ORDER BY date_time DESC";
		
	}
}
else
{
	$flag = "true";
	$sql = "SELECT `resv_id`, `fname`, `user_id`, `lname`, `date_time`, `size` FROM `reservations` natural join person WHERE rest_id = '".$_SESSION['rest_id']."' ORDER BY date_time DESC LIMIT $start, $results_per_page";
}
$result = mysqli_query($conn, $sql);
$result_length = mysqli_num_rows($result);

$limit = ($result_length < $results_per_page)  ? $result_length : $results_per_page;

if ($result_length != 0) {
	for ($x = 0; $x < $limit; $x++) {
		$row_data = mysqli_fetch_assoc($result);
		if($row_data['date_time'] > date("Y-m-d H:i:s"))
			echo '<tr class="table-success"><td><button class="btn btn-danger" onclick="return confirm_changes()"><a href="delete_data.php?table=reservations&id=resv_id&value='.$row_data['resv_id'].'" id="butt-link">Cancel</a></button></td>';
		else
			echo '<tr><td></td>';
		echo '<td>'.$row_data['resv_id'].'</td>';
		echo '<td>'.$row_data['fname'].' '.$row_data['lname'].'</td>';
		echo '<td>'.$row_data['date_time'].'</td>';
		echo '<td>'.$row_data['size'].'</td>';
	}
}


?>

</tbody>
</table>
<?php if($flag) { ?>
<nav aria-label="Results">
		  <ul class="pagination">
			  
			<li class="page-item"><a class="page-link" href="
				<?php 
				
				if($page == 0)
					$prev = 1;
				else
					$prev = $page;
				
				$last_page = ceil($total_rows/$results_per_page);
				$start_index = $page-3>1 ? $page-3 : 1;
				$end_index = $page+5<$last_page ? $page+5 : $last_page;
				
				echo "manager_view.php?page=$prev";?>
				">Previous</a></li>
			  <?php			  
			  if($page != ceil($total_rows/$results_per_page)-1)
			  	$next = $page+2;
			  else
			  	$next = $page+1;
			  if($start_index != 1)
				  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"manager_view.php?page=1\">1</a></li><li class=\"page-item\"><a class=\"page-link\">...</a></li>";
			  for ($x = $start_index; $x <= $end_index; $x++) {
				  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"manager_view.php?page=$x\">$x</a></li>";
			  }?>
			
			<?php
			  if($end_index != $last_page)
			  {
				  echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>
				  		<li class=\"page-item\"><a class=\"page-link\" href=\"manager_view.php?page=$last_page\">$last_page</a></li>";
			  }
			  
			  ?>
			  
			<li class="page-item"><a class="page-link" href="<?php echo "manager_view.php?page=$next";?> ">Next</a></li>
			  
		  </ul>
		</nav>

<?php } ?>
</div>



<?php include 'templates/footer.php'; ?>