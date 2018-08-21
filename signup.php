<?php 
session_start();
include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
<?php 
function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}?>

    <form id="signup-form" action="new_customer.php"name="signup" onsubmit="return validateForm()" method="post">
        <div class="form-group">

            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="fname" autofocus=true required pattern="[a-zA-z]+$">

            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" pattern="[A-Za-z]+$">

            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="contact" required pattern="[0-9]{10}$">

            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@example.com">

            <label for="fname">Username:<span style="color : red"> * </span></label>
            <input type="text" class="form-control" name="uname" placeholder = "6-10 Characters" required minlength="6" maxlength="10">

            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd" placeholder="Min 8 characters" required minlength="8" id="pwd">

            <label for="pwd1">Confirm Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Retype password" required minlength="8">

            <button type="submit" class="btn btn-primary" style="font-size: 13px">Submit</button>
        </div>
        
    </form>
<?php include 'templates/footer.php' ?>
