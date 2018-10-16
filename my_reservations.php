<?php
session_start();
include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/reservation.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/my_resv.css">';
}

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $user_id = $_SESSION['uname'];
    $sql = "SELECT * from reservations WHERE user_id = '$user_id';";
    $result = mysqli_query($conn, $sql); 
    if (mysqli_num_rows($result) != 0) {
        while($row = mysqli_fetch_assoc($result)){
            $size = $row['size'];
            $datetime = $row['date_time'];
            $rest_id = $row['rest_id'];
            $resv_id = $row['resv_id'];
            
            $sql1 = "Select rest_name from rest where rest_id = $rest_id;";
            $result1 = mysqli_query($conn, $sql1);
            if (mysqli_num_rows($result) != 0){
                $row1 = mysqli_fetch_assoc($result1);
                $rest_name = $row1['rest_name'];
            }

?>
            <div class="panel panel-primary" id="my-reservation-panel">
      <div class="panel-heading"><?php echo $rest_name ?></div>
    <div class="panel-body">
        
    </div>
    </div>
<?php
        }
    }
    else{
        echo "<br><h2 align = 'center'>You do not have any reservations.</h2>";
    }
include 'templates/footer.php';