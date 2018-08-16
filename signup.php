<?php include 'templates/header.php' ?>
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

    <script>
        function Validate_form(){
            var f_name = document.signup.fname;
            var l_name = document.signup.lname;
            var contact_no = document.signup.contact;
            var email_id = document.signup.email;
            var u_name = document.signup.uname;
            var p_wd = document.signup.pwd;
            var p_wd1 = document.signup.pwd1;
            
            if(fname_valid(f_name)){
                if(lname_valid(l_name)){
                    if(contact_valid(contact,10)){
                        if(email_valid(email)){
                            if(uname_valid(u_name,6,10)
                                if(pwd_valid(p_wd,p_wd1,8){
                                    return true;
                                }
                            }
                        }
                    }
                }
            }
            return false;
            
            function fname_valid(name){
                var letters = /^[A-Za-z]+$/;
                if(name.value.match(letters))
                    return true;
                else{
                    alert("First Name must have alphabet characters only");
                    f_name.focus();
                    return false;
                }
            }
            
            function lname_valid(name){
                var letters = /^[A-Za-z]+$/;
                if(name.value.match(letters))
                    return true;
                else{
                    alert("Last Name must have alphabet characters only");
                    l_name.focus();
                    return false;
                }
            }
            
                            
            function contact_valid(num,l){
                var len = num.value.length;
                var digits = /^[0-9]+$/
                if(num.value.match(digits)){
                    if(len==l){
                        return true;
                    }
                    else{
                        alert("Contact must be of "+dig " digits");
                        contact.focus();
                        return false;
                    }
                else{
                     alert("Contact must contain only numeric characters");
                        contact.focus();
                        return false;
                    }
                }
            }
                            
            function email_valid(mail){
                var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
                if(mail.value.match(mailformat)){
                    return true;
                }
                else{
                    alert("Invalid email address!");
                    mail.focus();
                    return false;
                }
            }
                            
            function uname_valid(id,ll,ul){
                var letters = /^[0-9a-zA-Z]+$/;
                var len = id.value.length;
                if(len <= ul && len >= ll){
                    if(id.value.match(letters)){
                        return true;
                    }
                    else{
                        alert("User address must have alphanumeric characters only");
                        id.focus();
                        return false;
                    }
                }
                else{
                    alert("Username must be between "+ll+ " - " +ul+ " characters");
                    id.focus();
                    return false;
                }
            }
            
            function pwd_validate(p1,p2,l){
                if(p1==p2){
                    if(p1.value.length >= l){
                        return true;
                    }
                    else{
                        alert("Password must be greater than " +l+ " characters");
                        p1.focus();
                        return false;
                    }
                }
                else{
                    alert("Passwords do not match");
                    p1.focus();
                    return false;
                }
            }
        }
    </script>
<?php include 'templates/footer.php' ?>
