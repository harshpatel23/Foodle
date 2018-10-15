<?php 
session_start();
include 'templates/header.php';

function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/all_rest_nav.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/grid.css">';
}

include 'templates/navbar.php';
include "templates/db-con.php";

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            else{
                $rest_name = mysqli_real_escape_string($conn, $_POST['search-bar']);            
                echo "<h2 align='center'>Showing Search Results for '<strong>$rest_name</strong>'</h2>";                
                $sql = "SELECT rest_id from rest where rest_name like '$rest_name%'";
                $result = mysqli_query($conn, $sql);
                if(!$result){
                        die("QUERY FAILED ".mysqli_error($conn));
                }
                elseif(mysqli_num_rows($result) == 0)
                    echo "<br><br><p align='center'>No Results Found.</p>";
                else{?>
                <div class="container" id="container">
                    <div class="row" id="outer-row">

<?php
                    while($row = mysqli_fetch_assoc($result)){
                        $id = $row['rest_id'];
                        $sql1 = "select rest_name, cost,rating from rest where rest_id = $id";
                        $result1 = mysqli_query($conn, $sql1);
                        if(!$result1)
                            die("QUERY FAILED ".mysqli_error($conn));
                        else{
                            $row1 = mysqli_fetch_assoc($result1);
                            $name = $row1['rest_name'];
                            $cost = $row1['cost'];
                            $rating = $row1['rating'];
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
                        ?>