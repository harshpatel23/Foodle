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
    <form id="signup-form" action="reserve.php" name="reservation" method="post">
        <label for="restaurant-name">Restaurant Name:<span style="color : red"> * </span></label>
        <input id = "restaurant-name" class="form-control" name="restaurant" value="<?php echo $rest_name?>" readonly required>
        
        <label for="table-size">Table Size</label>
            <select class="form-control" id="table-size" style="height:34px">
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
        <input id = "datetime" class="form-control" name="datetime" autofocus=true required style="width:61.6%;">
    </form> 
</div>
<script>
    $("#datetime").datetimepicker(); 
</script>

<?php include 'templates/footer.php' ?>
