<?php 
session_start();
include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
<?php 
function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}?>

    <form id="signup-form" action="new_customer.php"name="signup" onsubmit="return Validate_form()" method="post">
        <div class="form-group">
            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="fname" autofocus=true required>
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname">
            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="contact" required>
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@example.com">
            <label for="fname">Username:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="uname" placeholder = "6-10 Characters" required>
            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd" placeholder="Min 8 characters" required>
            <label for="pwd1">Confirm Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd1" placeholder="Retype password" required>
            <button type="submit" class="btn btn-primary" style="font-size: 13px">Submit</button>
        </div>
        
    </form>
<?php include 'templates/footer.php' ?>
