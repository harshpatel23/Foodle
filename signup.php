<?php include 'templates/header.php' ?>
<?php include 'templates/navbar.php' ?>

    <form id="signup-form">
        <div class="form-group">
            <label for="fname">First Name:</label>
            <input type="text" class="form-control" id="fname" autofocus=true>
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" id="lname">
            <label for="contact">Mobile no.:</label>
            <input type="text" class="form-control" id="contact">
            <label>Address:</label>
            <input type="text" class="form-control" id="bldg" placeholder="Room no./Building">
            <input type="text" class="form-control" id="street" placeholder="Street">
            <input type="text" class="form-control" id="locality" placeholder="Locality">
            <input type="text" class="form-control" id="city" placeholder="City">
            <input type="text" class="form-control" id="pin" placeholder="Pincode">
            <label for="email">Email-Id:</label>
            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="example@example.com">
            <label for="pwd">Password</label>
            <input type="password" class="form-control" id="pwd" placeholder="Min 8 characters">
            <label for="pwd1">Confirm Password</label>
            <input type="password" class="form-control" id="pwd1" placeholder="Retype password">
            <button type="submit" class="btn btn-primary" style="font-size: 13px">Submit</button>
        </div>
        
    </form>
<?php include 'templates/footer.php' ?>
