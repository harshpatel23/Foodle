function check_fname(){
    var name = document.getElementById("fname").value;
    var letters = /^[A-Za-z]+$/;
		if(name.match(letters)){
		document.getElementById("fname").setAttribute("style","border-color:green;border-width:1x");
            return true;
        }
		else{
			document.getElementById("fname").setAttribute("style","border-color:red;border-width:1px"); 
			return false;
        }
}

function check_lname(){
    var name = document.getElementById("lname").value;
    var letters = /^[A-Za-z]+$/;
    if(name.match(letters) || name == ""){
		document.getElementById("lname").setAttribute("style","border-color:green;border-width:1px");
            return true;
        }
		else{
			document.getElementById("lname").setAttribute("style","border-color:red;border-width:1px");
			return false;
        }
}

function check_contact(){
        var contact = document.getElementById("contact").value;
        var len = contact.length;
        var digits = /^[0-9]+$/
		if(contact.match(digits)){
			if(len==10){
				document.getElementById("contact").setAttribute("style","border-color:green;border-width:1px");
                return true;
			}
			else{
				document.getElementById("contact").setAttribute("style","border-color:red;border-width:1px");
                return false;
			}
        }
        else{
			 document.getElementById("contact").setAttribute("style","border-color:red;border-width:1px");
             return false;
			}
}

function check_uname(){
        var uname = document.getElementById("uname").value;
        var letters = /^[0-9a-zA-Z]+$/;
		var len = uname.length;
		if(len <= 12 && len >= 6){
			if(uname.match(letters)){
                document.getElementById("uname").setAttribute("style","border-color:green;border-width:1px");
                return true;			}
			else{
				document.getElementById("uname").setAttribute("style","border-color:red;border-width:1px");
                return false;
			}
		}
		else{
			document.getElementById("uname").setAttribute("style","border-color:red;border-width:1px");
            return false;
		}
}

function check_pwd(){
        var pwd = document.getElementById("pwd").value;
        if(pwd.length >=8){
            document.getElementById("pwd").setAttribute("style","border-color:green;border-width:1px");
            return true;
        }
        else{
            document.getElementById("pwd").setAttribute("style","border-color:red;border-width:1px");
            return false;
        }
}

function check_pwd1(){
        var pwd = document.getElementById("pwd").value;
        var pwd1 = document.getElementById("pwd1").value;
        if(pwd==pwd1){
            document.getElementById("pwd1").setAttribute("style","border-color:green;border-width:1px");
            return true;
        }
        else{
            document.getElementById("pwd1").setAttribute("style","border-color:red;border-width:1px");
            return false;
        }
}

function validateForm(){
	if(check_fname())
		if(check_lname())
			if(check_contact())
				if(check_uname())
					if(check_pwd())
						if(check_pwd1())
							return true;
	return false;
}

function uname_availability(uname){
    var correct = document.getElementById("correct");
    var wrong = document.getElementById("wrong");
    if(uname.length >= 6 && uname.length <= 12){
        xhttp=new XMLHttpRequest();
        xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                if(response == "available"){
                    correct.style.display = "inline";
                    wrong.style.display = "none";
                    document.getElementById("uname").setAttribute("style","border-color:green;border-width:1px");
                }
                else{
                    correct.style.display = "none";
                    wrong.style.display = "inline";
                    document.getElementById("uname").setAttribute("style","border-color:red;border-width:1px");
                }
            }
        };
        xhttp.open("GET", "uname_availability.php?username="+uname, true);
        xhttp.send();
    }
    else{
        correct.style.display = "none";
        wrong.style.display = "none";            
        document.getElementById("uname").setAttribute("style","border-color:red;border-width:1px");
    }
}