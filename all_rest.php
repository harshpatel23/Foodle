<?php 
session_start();
include 'templates/header.php';

function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/all_rest_nav.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/grid.css">';
}

include 'templates/navbar.php';
if($_GET['sort_by'])
    $sort_by=$_GET['sort_by'];
else  
    $sort_by='none';
?>
    <div class="container" id="container">
   <div class="row" id="outer-row">
        <div class="col-sm-2 sticky-top" id="column-left">
		<div class="sticky-top">

			<ul class="nav nav-pills flex-column bg-light"> 
				<li class="nav-brand bg-dark" id="nav-head">Sortby</li>
				<li class="nav-item" id="side-nav-item"><a class="nav-link" id="side-nav-link" href="all_rest.php?sort_by=rating">Rating</a></li>
				<li class="nav-item" id="side-nav-item"><a class="nav-link" id="side-nav-link" href="all_rest.php?sort_by=distance">Distance</a></li>
				<li class="nav-item" id="sidenav-item"><a class="nav-link" id="side-nav-link" href="all_rest.php?sort_by=cost">Aproxx Cost</a></li>
			</ul>
			  
			  
			  
			
			<!--
            <div id="side-nav">
        <div id="side-nav-item" style="background-color:#808080;border-radius:10px;">
            <p>Sort By</p>
		</div>
		<a href="all_rest.php?sort_by=rating" id="side-nav-link">
            <div id="side-nav-item">
			 Rating
		    </div>
        </a>
        <a href="all_rest.php?sort_by=distance" id="side-nav-link" onclick="getLocation()">
		<div id="side-nav-item">
			Distance
		</div>
        </a>
        <a href="all_rest.php?sort_by=cost" id="side-nav-link">
		<div id="side-nav-item">
            Aproxx Cost
		</div>
        </a>
        </div>
-->
		</div>
		</div>
        <div class="col-sm-9" id = "column-right">
            <div class="row" id="inner-row">
                <?php
                    include "templates/db-con.php";
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                
                    if($sort_by == "distance"){
                        $sql = "SELECT rest_id,latitude,longitude from rest";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                    }
                    else{
                        $distance = array();
                        
                        while($row = mysqli_fetch_assoc($result)){
                            $distance[$row['rest_id']] = sqrt(pow($row['latitude']-$_SESSION['latitude'],2)+pow($row['longitude']-$_SESSION['longitude'],2));
                        }
                        asort($distance);
                        $keys = array_keys($distance); 
                        for($i=0;$i<(sizeof($distance));$i++){
                            $sql = "SELECT rest_id,rating,rest_name,cost from rest where rest_id= $keys[$i];";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                    }
                    else{
                            $row = mysqli_fetch_assoc($result);
                            $id = $row['rest_id'];
                            $name = $row['rest_name'];
                            $cost = $row['cost'];
                            $rating = $row['rating'];
                            $i++;
                ?>
                            <div class="col-sm-3" id = "hotel" >
                                <div class="thumbnail">
                                <a id="rest-link" href="rest_details.php?rest_id=<?php echo $id ?>">
                                <img src="images/<?php echo abs(crc32($id))%30; ?>.jpg" alt="<?php echo "$name"?>" style="width:100%; height: 130px;">
                                <div class="caption">
                                    <div id="rest-name">
                                    <p><?php echo $name ?></p>
										</div>
                                    <div id='rate-cost'>
										<span id="cost"><?php echo "Aproxx: ₹".$cost ?></span>
                                        <span class="fa fa-star" id="star"></span>
                                        <span id="rating"><?php echo $rating ?></span>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                <?php 
                        } 
                        }
                    }
                    }
                
                    elseif($sort_by == "none")
                        $sql = "SELECT rest_id,rating,rest_name,cost from rest;";
                    elseif($sort_by == "rating")
                        $sql = "SELECT rest_id,rating,rest_name,cost from rest ORDER BY rating DESC;";
                    elseif($sort_by == "cost")
                        $sql = "SELECT rest_id,rating,rest_name,cost from rest ORDER BY cost;";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                    }
                    else{
                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['rest_id'];
                            $name = $row['rest_name'];
                            $cost = $row['cost'];
                            $rating = $row['rating'];
                ?>
                            <div class="col-sm-3" id = "hotel" >
                                <div class="thumbnail">
                                <a id="rest-link" href="rest_details.php?rest_id=<?php echo $id ?>">
                                <img src="images/<?php echo abs(crc32($id))%30; ?>.jpg" alt="<?php echo "$name"?>" style="width:100%; height: 130px;">
                                <div class="caption">
                                    <div id="rest-name">
                                    <p><?php echo $name ?></p>
										</div>
                                    <div id='rate-cost'>
										<span id="cost"><?php echo "Aproxx: ₹".$cost ?></span>
                                        <span class="fa fa-star" id="star"></span>
                                        <span id="rating"><?php echo $rating ?></span>                                        
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                <?php 
                        } 
                        }
include 'templates/footer.php';
?>