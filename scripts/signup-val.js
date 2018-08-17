function Validate_form(){
            var f_name = document.forms["signup"]["fname"].value;
            var l_name = document.forms["signup"]["lname"].value;
            var contact_no = document.forms["signup"]["contact"].value;
            var email_id = document.forms["signup"]["email"].value;
            var u_name = document.forms["signup"]["uname"].value;
            var p_wd = document.forms["signup"]["pwd"].value;
            var p_wd1 = document.forms["signup"]["pwd1"].value;
            
            if(fname_valid(f_name)){
                if(lname_valid(l_name)){
                    if(contact_valid(contact_no,10)){
                        if(email_valid(email_id)){
                            if(uname_valid(u_name,6,10)){
                                if(pwd_valid(p_wd,p_wd1,8)){
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
                        alert("Contact must be of "+l+" digits");
                        contact_no.focus();
                        return false;
                    }
				}
                else{
                     alert("Contact must contain only numeric characters");
                        contact.focus();
                        return false;
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
            
            function pwd_valid(p1,p2,l){
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