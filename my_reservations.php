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
        while($row = mysqli_fetch_assoc($result)){?>
            <div class="panel panel-primary" id="my-reservation-card">
      <div class="panel-heading">Panel with panel-primary class</div>
      <div class="panel-body">Panel Content</div>
    </div><?php
        }
    }
    else{
        echo "<br><h2 align = 'center'>You do not have any reservations.</h2>";
    }
include 'templates/footer.php';