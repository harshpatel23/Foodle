<style>
    #container{
        margin:10px auto;
        max-width: 100%;
    }
    #hotel{
        margin-left: 0%;
        margin-right: 0%;
        margin-top:1%;
        margin-bottom: 1%;
        height: 250px;
        border-radius: 8px;
        text-align: center;
        background-color: white;
    }
    #more{
        margin-left: 0%;
        margin-right: 0%;
        margin-top:1%;
        margin-bottom: 1%;
        height: 250px;
        border-radius: 8px;
        text-align: center;
        background-color: white;
    }
    
    #star{
        text-align: left;
    }
    
    #column-left{
        margin: 0.75%;
        padding-top: 10px;
    }
    #column-right{
        margin: 0.75%;
    }
    #outer-row{
        padding-top: 15px;
    }
    
    #icon_more{
        color: black;
        width: 74.94px;
        height:50px;
        font-size: 50px;
    }
    
    #rating-star{
        float:left;
    }
    #cost{
        float: right;
    }
    #rating{
        float: left;
    }
    
    #rate-cost{
    }
    
    p{
        font-size: 18px;
    }
    
    .thumbnail{
        border-color: darkorange;
        border-width: 2px;
        border-radius: 8px;
        background-color: #ffe0b3;
        width: 100%;
        height: 100%;
    }
    img{
        border-radius: 8px;
    }
</style>
<script>
$(document).ready(function(){
  // Add scrollspy to <body>
  $('body').scrollspy({target: "#side-nav", offset: 50});   

  // Add smooth scrolling on all links inside the navbar
  $("#side-nav a").on('click', function(event) {
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
      }, 700, function(){
   
        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    }  // End if
  });
});
</script>

<?php 
if(!isset($_SESSION['latitude'])){
   $_SESSION['latitude'] = 19.0760;
   $_SESSION['longitude'] = 72.8777;
}
?>


<div class="container" id="container">
   <div class="row" id="outer-row">
        <div class="col-sm-2 sticky-top" id="column-left">
		<div class="sticky-top">
            <div id="side-nav">
		<a href="#top-rated" id="side-nav-link">
            <div id="side-nav-item">
			Top Rated
		    </div>
        </a>
        <a href="#nearby" id="side-nav-link" onclick="getLocation()">        
		<div id="side-nav-item">
			Nearby
		</div>
        </a>
        <a href="#recommended" id="side-nav-link">
		<div id="side-nav-item">
			Recommended
		</div>
        </a>
        <a href="#" id="side-nav-link">
		<div id="side-nav-item">
			Browse All
		</div>
        </a>
        </div>
		</div>
		</div>
        <div class="col-sm-9" id = "column-right">
            <h1 id="top-rated">Top Rated!</h1>
            <div class="row" id="inner-row">
                <?php
                    include "templates/db-con.php";
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT rest_id,rating,rest_name,cost from rest ORDER BY rating DESC;";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                    }
                    else{
                        $i = 0;
                        while(($row = mysqli_fetch_assoc($result)) && $i<7){
                            $id = $row['rest_id'];
                            $name = $row['rest_name'];
                            $cost = $row['cost'];
                            $rating = $row['rating'];
                            $i++;
                ?>
                            <div class="col-sm-3" id = "hotel" >
                                <div class="thumbnail">
                                <a href="rest_details.php?rest_id=<?php echo $id ?>">
                                <img src="./images/utsav.jpg" alt="<?php echo "$name"?>" style="width:100%; height: 130px;">
                                <div class="caption">
                                    <p><?php echo $name ?></p>
                                    <div id='rate-cost'>
                                        <span class="glyphicon glyphicon-star" id='star'></span>
                                        <p id='rating'><?php echo $rating ?></p>
                                        <p id='cost'><?php echo "Aproxx: ₹".$cost ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                <?php 
                        } 
                        }
                ?>

                <div class="col-sm-3" id = "more" >
                    <div class="thumbnail">
                        <a href="#">
                            <div class="caption">
                                <p>Explore More!</p>
                            </div>
                        </a>
                    </div>
                </div>
                
            </div>
            
             <h1 id="nearby">Nearby!</h1>
            <div class="row" id="inner-row">
                <?php
                    
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
                        for($i=0;$i<14;$i++){
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
                                <a href="rest_details.php?rest_id=<?php echo $id ?>">
                                <img src="./images/utsav.jpg" alt="<?php echo "$name"?>" style="width:100%; height: 130px;">
                                <div class="caption">
                                    <p><?php echo $name ?></p>
                                    <div id='rate-cost'>
                                        <span class="glyphicon glyphicon-star" id='star'></span>
                                        <p id='rating'><?php echo $rating ?></p>
                                        <p id='cost'><?php echo "Aproxx: ₹".$cost ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                <?php 
                        } 
                        }
                    }
                ?>
                <div class="col-sm-3" id = "more" >
                    <div class="thumbnail">
                        <a href="#">
                            <div class="caption">
                                <p>Explore More!</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            
            <h1 id="recommended">Recommended!</h1>
            <div class="row" id="inner-row">
                <?php
                    include "templates/db-con.php";
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }
                    
                    $sql = "SELECT rest_id,rating,rest_name,cost from rest ;";
                    $result = mysqli_query($conn, $sql);
                    if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                    }
                    else{
                        $i = 0;
                        while(($row = mysqli_fetch_assoc($result)) && $i<7){
                            $id = $row['rest_id'];
                            $name = $row['rest_name'];
                            $cost = $row['cost'];
                            $rating = $row['rating'];
                            $i++;
                ?>
                            <div class="col-sm-3" id = "hotel" >
                                <div class="thumbnail">
                                <a href="rest_details.php?rest_id=<?php echo $id ?>">
                                <img src="./images/utsav.jpg" alt="<?php echo "$name"?>" style="width:100%; height: 130px;">
                                <div class="caption">
                                    <p><?php echo $name ?></p>
                                    <div id='rate-cost'>
                                        <span class="glyphicon glyphicon-star" id='star'></span>
                                        <p id='rating'><?php echo $rating ?></p>
                                        <p id='cost'><?php echo "Aproxx: ₹".$cost ?></p>
                                    </div>
                                </div>
                                </a>
                            </div>
                        </div>
                <?php 
                        } 
                        }
                ?>
                <div class="col-sm-3" id = "more" >
                    <div class="thumbnail">
                        <a href="#">
                            <div class="caption">
                                <p>Explore More!</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
       </div>
    </div>
</div>
