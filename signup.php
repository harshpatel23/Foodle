<?php 
session_start();
include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>
<?php 
function addcss(){
    echo '<link rel="stylesheet" type="text/css" href="styles/forms.css">';
}?>

    <form id="signup-form" action="new_customer.php" name="signup" onsubmit="return validateForm()" method="post">
        <div class="form-group">

            <label for="fname">First Name:<span style="color : red"> * </span></label>
            <input id = "fname" title="only letters allowed" type="text" class="form-control" name="fname" autofocus=true required pattern="[a-zA-z]+$" onfocusout = "check_fname()">

            <label for="lname">Last Name:</label>
            <input id="lname" title="only letters allowed" type="text" class="form-control" name="lname" pattern="[A-Za-z]+$" onfocusout = "check_lname()">

            <label for="contact">Mobile no.: <span style="color : red"> * </span></label>
            <input  id="contact" title="10 digit mobile number" type="text" class="form-control" name="contact" required pattern="[0-9]{10}$" onfocusout = "check_contact()" readonly 
                   <?php 
                    echo "value='";
				    echo $_SESSION['contact'];
				    echo "'";
                   ?>
                   >

            <label for="email">Email-Id:</label>
            <input id="email" type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="example@example.com">

            <label for="uname">Username:<span style="color : red"> * </span></label>&nbsp;
            <span id="correct" class="glyphicon glyphicon-ok" style="color:green;display:none;"></span>
            <div id = "wrong" style="display:none;"><span class="glyphicon glyphicon-remove" style="color:red;"></span>&nbsp;Already Taken!</div>            
            <input id="uname" type="text" class="form-control" name="uname" placeholder = "6-12 Characters" required minlength="6" maxlength="12" onkeyup = "uname_availability(this.value)">

            <label for="pwd">Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd" placeholder="Min 8 characters" required minlength="8" id="pwd" onfocusout = "check_pwd()">

            <label for="pwd1">Confirm Password<span style="color : red"> * </span></label>
            <input type="password" class="form-control" name="pwd1" id="pwd1" placeholder="Retype password" required minlength="8" onfocusout = "check_pwd1()">

            <button type="submit" class="btn btn-primary" style="font-size: 13px">Submit</button>
        </div>
        
    </form>
<?php include 'templates/footer.php' ?>
