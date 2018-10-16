<?php
session_start();
if(!isset($_SESSION['role']) || $_SESSION['role']!='admin')
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

if(!isset($_GET['edit_category']))
	$table = 'person';
else
	$table = $_GET['edit_category'];

if(!isset($_GET['page']))
	$page = 0;
else
	$page = intval($_GET['page'])-1;

include 'templates/header.php';
include 'templates/navbar.php';
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
				<li class="nav-item <?php if($table == 'favourites') echo 'active';?>" id="side-nav-item"><a href="admin_view.php?edit_category=favourites&page=1" class="nav-link" id="side-nav-link">Favourites</a></li>
			</ul>
		</nav>
	</div>
	<div class="col-sm-10" id="result-table">
		<?php if($table == 'rest'){
		?>
		<a href="rest_form.php?method=insert"><button class="btn btn-primary" style="margin:5px 0px;">Add New</button></a>
		<?php }?>
		<table class="table table-hover table-bordered">
		  <thead>
			<tr>
				<?php if($table != 'favourites' && $table != 'review') echo '<th>Edit</th>' ?>
				
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
if (isset($_POST['search-bar'])) {

	$search = mysqli_real_escape_string($conn, $_POST['search-bar']);
	if($table=='rest')
		$sql = "SELECT * FROM rest where rest_name like '$search%'";
	elseif($table=='person')
	{
		$names = array();
		$names = explode(" ",$search);

		if(sizeof($names) == 1)
		{
			$x = $names[0];
			$sql = "SELECT * FROM person where fname like '$x%' or lname like '$x%'";
		}
		else
		{
			$fname = $names[0];
			$lname = $names[1];
			$sql = "SELECT * FROM person where fname like '$fname%' or lname like '$lname%'";
		}
		
	}
	else 
		$sql = "select * from $table LIMIT $start, $results_per_page;"; 

}
else
	$sql = "select * from $table LIMIT $start, $results_per_page;";

$result = mysqli_query($conn, $sql);
$result_length = mysqli_num_rows($result);

if(isset($_POST['search-bar']))
	$limit = mysqli_num_rows($result);
else
	$limit = ($result_length < $results_per_page)  ? $result_length : $results_per_page;

if ($result_length != 0) {
	for ($x = 0; $x < $limit; $x++) {
		$row_data = mysqli_fetch_assoc($result);
		
		
		if($table == 'favourites')
			echo "<tr><td><button class=\"btn btn-danger\" onclick=\"return confirm_changes()\"><a id=\"butt-link\" href=\"delete_data.php?table=favourites&user_id=".$row_data['user_id']."&rest_id=".$row_data['rest_id']."\">Delete</a></button></td>";
        
        else if($table == 'review')
            echo "<tr><td><button class=\"btn btn-danger\" onclick=\"return confirm_changes()\"><a id=\"butt-link\" href=\"delete_data.php?table=review&user_id=".$row_data['user_id']."&rest_id=".$row_data['rest_id']."\">Delete</a></button></td>";

		else
		{
			$curr_key = $row_data[$primary_key[$table]];
			echo '<tr><td><button class="btn btn-primary"><a href="';
			if($table == 'person')
				echo "profile_view.php?user_id=".$row_data['user_id'];
			else if($table == 'rest')
				echo "rest_form.php?method=update&rest_id=".$row_data['rest_id'];
			echo "\"id=\"butt-link\">Edit</a></button></td>
			  <td><button class=\"btn btn-danger\" onclick=\"return confirm_changes()\"><a id=\"butt-link\" href=\"delete_data.php?table=$table&id=$primary_key[$table]&value=$curr_key\">Delete</a></button></td>";
		}

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
		<?php if (!isset($_POST['search-bar'])) { ?>
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
				
				echo "admin_view.php?edit_category=$table&page=$prev";?>
				">Previous</a></li>
			  <?php			  
			  if($page != ceil($total_rows/$results_per_page)-1)
			  	$next = $page+2;
			  else
			  	$next = $page+1;
			  if($start_index != 1)
				  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"admin_view.php?edit_category=$table&page=1\">1</a></li><li class=\"page-item\"><a class=\"page-link\">...</a></li>";
			  for ($x = $start_index; $x <= $end_index; $x++) {
				  echo "<li class=\"page-item\"><a class=\"page-link\" href=\"admin_view.php?edit_category=$table&page=$x\">$x</a></li>";
			  }?>
			
			<?php
			  if($end_index != $last_page)
			  {
				  echo "<li class=\"page-item\"><a class=\"page-link\">...</a></li>
				  		<li class=\"page-item\"><a class=\"page-link\" href=\"admin_view.php?edit_category=$table&page=$last_page\">$last_page</a></li>";
			  }
			  
			  ?>
			  
			<li class="page-item"><a class="page-link" href="<?php echo "admin_view.php?edit_category=$table&page=$next";?> ">Next</a></li>
			  
		  </ul>
		</nav>
	<?php } ?>
	</div>
	
</div>

</div>

<?php
include 'templates/footer.php'; 
?>