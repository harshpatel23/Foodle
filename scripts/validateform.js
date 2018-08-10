function validateLogin() {
    var x = document.forms["login-form"]["email"].value;
    if (x == "") {
        alert("Email must be filled out");
        return false;
    }
}