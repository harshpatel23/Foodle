<?php
session_start();
include 'templates/header.php';
?>

<style>
    .media-body{
        font-size: 14px;
    }
    .textarea{
        font-size: 12px;
    }
</style>

<script>
	document.body.setAttribute("data-spy", "scroll");
	document.body.setAttribute("data-target", "#side-navigation");
	document.body.setAttribute("data-offset", "80");

	$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: "#side-navigation", offset: 50});   
   // Add smooth scrolling on all links inside the navbar
  $("#side-navigation a").on('click', function(event) {
    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();
       // Store hash
      var hash = this.hash;
       // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 300, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>
<?php
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
	echo '<link rel="stylesheet" type="text/css" href="styles/rest_details.css">';
	echo '<script src="scripts/fav.js"></script>';
	echo '<script>$("body").scrollspy({ target: "#side-navigation" })</script>';
}
$rest_id=$_GET['rest_id'];
if(isset($_SESSION['uname'])){
    $temp = $_SESSION['uname'];
    $sql = "SELECT fname,lname FROM person where user_id = '$temp';";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
    }
}
$sql = "SELECT * FROM rest where rest_id = '$rest_id'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) != 0) {
	$rest_data = mysqli_fetch_assoc($result);
}

$sql = "SELECT contact FROM rest_contact where rest_id = '$rest_id'";
$result = mysqli_query($conn, $sql);
$contact = array();
if (mysqli_num_rows($result) != 0) {
	while($contact_data = mysqli_fetch_assoc($result))
	{
		$contact[] = $contact_data['contact'];
	}
}

$sql = "select distinct category from menu";
$result = mysqli_query($conn, $sql);
$category = array();
if (mysqli_num_rows($result) != 0) {
	while($category_data = mysqli_fetch_assoc($result))
	{
		$category[] = $category_data['category'];
	}
}
?>



<div class="jumbotron jumbotron-fluid">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-3">
				<img src="images/<?php echo abs(crc32($rest_id))%30; ?>.jpg" alt="<?php echo $rest_data['rest_name'];?>" class="img-thumbnail">
			</div>
			<div class="col-sm-9" id="rest-data">
				<h1 class="display-4">
					<?php echo $rest_data['rest_name'] ?></h1>
				
			<p>	<?php
				$cuisine = explode(',', $rest_data['rest_cuisine']);
				for ($x = 0; $x < sizeof($cuisine); $x++) {
					echo $cuisine[$x];
					if($x != sizeof($cuisine)-1)
						echo ", ";
				}
				?>
			</p>
				<p>
					<span class="fa fa-star" id="rating-star"></span>
					<span id="rating-value" style="padding-right:50px"><?php echo $rest_data['rating'] ?></span>
					<span id="cost-for-2" style="padding-right:50px;">Cost for two: ₹ <?php echo $rest_data['cost'] ?></span>
					<span><button class="btn btn-light" id="fav-btn" onclick="add_fav(<?php echo $rest_id; ?>);">
						<span id="fav-heart" class="
<?php
	if(isset($_SESSION['uname'])){
		$user_id = $_SESSION['uname'];
		$sql = "select * from favourites where user_id = '$user_id' and rest_id = '$rest_id';";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) != 0) 
			echo 'fa fa-heart';
		else
			echo 'fa fa-heart-o';
	}
	else
		echo 'fa fa-heart-o';
	
?>

					"></span>Favourite</button></span>
				</p>				
			</div>
		</div>
	</div>
</div>
<div class="container-fluid">
<div class="row">
	<div class="col-sm-2">
		<div class="sticky-top">
		
			<nav id="side-navigation">
				<ul class="nav nav-pills flex-column side-nav bg-light">
				<li class="nav-item" id="side-nav-item"><a href="#rest_info" class="nav-link" id="side-nav-link">About</a></li>

				<li class="nav-item" id="side-nav-item"><a href="#menu" class="nav-link" id="side-nav-link">Menu</a>
					
						<ul class="nav nav-pills nav-stacked bg-light inner-nav">

<?php 
	foreach ($category as $cat){
		echo 	'<li class="nav-item ml-3 my-1" id="side-nav-item"><a class="nav-link" id="side-nav-link" href="#';
		echo str_replace(' ', '-', $cat);
		echo '" >';
		echo $cat;
		echo '</a></li>';
		
	}
?>
						</ul>
				</li>
				<li class="nav-item" id="side-nav-item"><a href="#reviews" class="nav-link" id="side-nav-link" >Reviews</a></li>
					</ul>
				</nav>
			</div>
		
		
	</div>
	
	
	
	<div class="col-sm-10"><div class="container">
		<div class="row" id="rest_info">
			<div class="col-md">
				<h1>Address</h1>
				<div class="uline"></div>
				
				<p><a target="_blank" href="https://maps.google.com/maps/search/<?php echo $rest_data['rest_name'];
				echo ',';
				echo $rest_data['rest_addr'];?>"><?php echo $rest_data['rest_addr']; ?></a></p>
			</div>
			<div class="col-md" >
				<h1>Contact</h1>
				<div class="uline"></div>
				<p><?php
						for ($x = 0; $x < sizeof($contact); $x++) {
							echo $contact[$x];
							if($x != sizeof($contact)-1)
								echo ", ";

						}
					?></p>
			</div>
			<div class="col-md">
				<h1>Timings</h1>
				<div class="uline"></div>
				<p>
					<?php 	echo $rest_data['start_time'];
							echo ' to ';
							echo $rest_data['end_time'];
					?>
				</p>
			</div>
		</div>
        </div>
		<div class="table-responsive" id="menu">
<?php
	
	foreach ($category as $cat){
		echo '<h2 id="';
		echo str_replace(' ', '-', $cat);
		echo '">';
		echo $cat;
		echo "</h2>";
		echo '<table class="table table-hover" id="menu-table">
				<colgroup>
					 <col span="1" style="width: 20%;">
					 <col span="1" style="width: 70%;">
					 <col span="1" style="width: 10%;">
  				</colgroup>
				<thead>
					<tr>
					  <th scope="col">Name</th>
					  <th scope="col">Description</th>
					  <th scope="col">Price</th>
					</tr>
				</thead>
				<tbody>'; 
		$sql = "SELECT item_name, description, price FROM menu WHERE category = '$cat'";
		$result = mysqli_query($conn, $sql);
		if (mysqli_num_rows($result) != 0) {
			while($menu_item = mysqli_fetch_assoc($result))
			{
				echo "<tr>
					  <td>";
				echo $menu_item['item_name'];
				echo "</td>
					  <td>";
				echo $menu_item['description'];
				echo "</td>
				 <td>";
				echo $menu_item['price'];
				echo "</td>
    				</tr>";
				
			}
		}
		echo '</tbody>		
			</table>';
	}
	
?>
		</div>
        <hr>        <h1 id="reviews">Reviews</h1><br>
        <?php
        if(isset($_SESSION['uname'])){ ?>
        <div id="write-review">
            <div class="media">
            <img class="mr-3" src="images/profile.jpeg" alt="Generic placeholder image" height="64px" width="64px">
            <div class="media-body">
                <h4 class="mt-0"><?php echo $fname.' '.$lname;?></h4>
                <div class="container">
	<div class="row" style="margin-top:10px;">
		<div class="col-md-6">
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-info" href="#reviews-anchor" id="open-review-box"><h5 style><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Write Review</h5></a>
            </div>
        
            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" method="post">
                        <input id="ratings-hidden" name="rating" type="hidden"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="10" style="font-size:16px"></textarea>
        
                        <div class="text-right"style="padding-top:10px;">
                            <!--<div class="stars starrr" data-rating="0" style="font-size:22px;float:left"></div>-->
                            <a class="btn btn-danger btn-sm" href="#" id="close-review-box" style="display:none; margin-right: 10px;">
                                <h4><span class="glyphicon glyphicon-remove"></span>&nbsp;Cancel&nbsp;</h4></a>
                            <button class="btn btn-success btn-sm" type="submit" formaction="new_review.php?uid=<?php echo $_SESSION['uname'].'&rid='.$rest_id;?>"><h4><span class="glyphicon glyphicon-ok"></span>&nbsp;&nbsp;Save&nbsp;&nbsp;</h4></button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
		</div>
	</div>
</div>
            </div>
        </div>
        </div><?php } ?>
        <hr>
        <div id="read-reviews">
            <?php
                $sql = "select user_id, comment,date_time from review where rest_id = '$rest_id' ORDER BY date_time DESC;";
                $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) != 0) {
                    while($row = mysqli_fetch_assoc($result)){
                        $comment = $row['comment'];
                        $time = $row['date_time'];
                        $user_name = $row['user_id'];
                        $sql1 = "select fname, lname from person where user_id = '$user_name';";
                        $result1 = mysqli_query($conn, $sql1);
                        if (mysqli_num_rows($result) != 0) {
                            $row1 = mysqli_fetch_assoc($result1);
                            $fname = $row1['fname'];
                            $lname = $row1['lname'];?>
                            <div class="media">
                                <img class="mr-3" src="images/profile.jpeg" alt="Generic placeholder image" height="64px" width="64px">
                                    <div class="media-body">
                <h4 class="mt-0"><?php echo $fname.' '.$lname;?></h4>
                                        <p><?php echo $time;?></p><hr><strong><?php echo $comment;?></strong><hr>
            </div>
        </div>
                        
            
            <?php
                        }
                    }
                }
            
            ?>
        </div>
	
	</div>
	</div>
		</div>
<hr>
<?php
include 'templates/footer.php';
?>