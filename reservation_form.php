<?php
session_start();
include 'templates/header.php';
include 'templates/navbar.php';
include 'templates/db-con.php';

function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/reservation.css">';
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}

$rest_id = $_GET['rest_id'];

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

    $sql = "SELECT rest_name from rest WHERE rest_id = $rest_id;";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) != 0) {
        $row = mysqli_fetch_assoc($result);
        $rest_name = $row['rest_name'];
    }
?>

<div class = "container">
    
    <form id="reservation-form" action="reserve.php?rest_id=<?php echo $rest_id ?>" name="reservation" method="post">
        <label for="restaurant-name">Restaurant Name:<span style="color : red"> * </span></label>
        <input id = "restaurant-name" class="form-control" name="restaurant" value="<?php echo $rest_name?>" readonly required>
        
        <label for="table-size">Table Size</label>
            <select class="form-control" id="table-size" name="table-size" style="width:20%;height:34px">
                <?php
                    $sql = "SELECT size from tables WHERE rest_id = $rest_id;";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) != 0) {
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<option>".$row['size']."</option>";
                        }
                    }
                ?>
            </select> 
        
        <label for="datetime">Date and Time for reservation:<span style="color : red"> * </span></label>
        <input id = "datetime" class="form-control" name="datetime" autocomplete="off" required style="width:61.6%;" onfocusout = "table_check(<?php echo $rest_id ?>)">
        <div id="message" style="display:none">
            <p style="color:red">All the tables for selected time and table size are booked.<br>Try selecting different time or table size.</p>
        </div>
        <button type="submit" class="btn btn-primary" style="font-size: 13px" id='reserve' disabled>Reserve</button>
    </form> 
</div>
<script>
    $("#datetime").datetimepicker(); 
</script>

<?php include 'templates/footer.php' ?>
