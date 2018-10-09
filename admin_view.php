<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin')
{
	echo '<h1>Unauthorized access!!</h1><p>Redirecting...</p>';
	header('refresh: 3; index.php');
	exit;
}

include 'templates/header.php';
include 'templates/navbar.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
	echo '<link rel="stylesheet" type="text/css" href="styles/admin_page.css">';
}

if(!isset($_GET['edit_category']))
	$table = 'person';
else
	$table = $_GET['edit_category'];

if(!isset($_GET['page']))
	$page = 0;
else
	$page = intval($_GET['page'])-1;

include 'templates/db-con.php';

$sql = "SELECT TABLE_NAME, COLUMN_NAME FROM INFORMATION_SCHEMA.key_column_usage WHERE table_schema = '$database_name' AND CONSTRAINT_NAME = 'PRIMARY';";
$result = mysqli_query($conn, $sql);
$primary_keys = array();
if (mysqli_num_rows($result) != 0)
{
	while($data = mysqli_fetch_assoc($result))
		$primary_key[$data['TABLE_NAME']] = $data['COLUMN_NAME'];
}

$sql = "SELECT count(*) from $table;";
$result = mysqli_query($conn, $sql);
$column = array();
if (mysqli_num_rows($result) != 0)
{
	$data = mysqli_fetch_assoc($result);
	$total_rows = $data['count(*)'];
}

$sql = "SELECT `COLUMN_NAME` FROM `INFORMATION_SCHEMA`.`COLUMNS` WHERE `TABLE_SCHEMA`='$database_name' AND `TABLE_NAME`='$table';";

$result = mysqli_query($conn, $sql);
$column = array();
if (mysqli_num_rows($result) != 0)
	while($data = mysqli_fetch_assoc($result))
		$column[] = $data['COLUMN_NAME'];

?>
<div class="container-fluid">
<div class="row">
	<div class="col-sm-2">
		<nav id="side-navigation">
			<ul class="nav nav-pills flex-column side-nav bg-light">
				<li class="nav-item <?php if($table == 'person') echo 'active';?>" id="side-nav-item"><a href="admin_view.php?edit_category=person&page=1" class="nav-link" id="side-nav-link">Users</a></li>
				<li class="nav-item <?php if($table == 'rest') echo 'active';?>" id="side-nav-item"><a href="admin_view.php?edit_category=rest&page=1" class="nav-link" id="side-nav-link">Restaurants</a></li>
				<li class="nav-item <?php if($table == 'review') echo 'active';?>" id="side-nav-item"><a href="admin_view.php?edit_category=review&page=1" class="nav-link" id="side-nav-link">Reviews</a></li>
			</ul>
		</nav>
	</div>
	<div class="col-sm-10" id="result-table">
		<table class="table table-hover table-bordered">
		  <thead>
			<tr>
				<th>Edit</th>
				<th>Delete</th>
	
			
<?php	
foreach ($column as $heading)
	echo "<th scope=\"col\">$heading</th>";
?>
			</tr>
		  </thead>
		<tbody>
<?php
$results_per_page = 10;
$start = $page * $results_per_page;		
$sql = "select * from $table LIMIT $start, $results_per_page;";
$result = mysqli_query($conn, $sql);
			
$result_length = mysqli_num_rows($result);
$limit = ($result_length < $results_per_page)  ? $result_length : $results_per_page;

if ($result_length != 0) {
	for ($x = 0; $x < $limit; $x++) {
		$row_data = mysqli_fetch_assoc($result);
		$curr_key = $row_data[$primary_key[$table]];
		echo "<tr><td><a><button class=\"btn btn-primary\">Edit</button></a></td>
			  <td><a href=\"delete_data.php?table=$table&id=$primary_key[$table]&value=$curr_key\"><button class=\"btn btn-danger\" onclick=\"\">Delete</button></a></td>";
		
		foreach($column as $attr)
		{
			$row = $row_data["$attr"];
			echo "<td scope=\"col\">$row</td>";
		}
		echo '</tr>';
	}
}
?>
			
		</tbody>
		</table>
		
		<nav aria-label="Results">
		  <ul class="pagination">
<!--			<li class="page-item"><a class="page-link" href="#">Previous</a></li>-->
			  <?php
			  
			  for ($x = 1; $x <= ceil($total_rows/$results_per_page); $x++) {
				  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"admin_view.php?edit_category=$table&page=$x\">$x</a></li>";
			  }?>
			
			
<!--			<li class="page-item"><a class="page-link" href="#">Next</a></li>-->
		  </ul>
		</nav>
	</div>
	
</div>

</div>

<?php
include 'templates/footer.php'; 
?>