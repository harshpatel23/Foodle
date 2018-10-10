function setEdit()
{
	document.getElementById('fname').removeAttribute("readonly");
    document.getElementById('lname').removeAttribute("readonly");
    document.getElementById('contact').removeAttribute("readonly");
    document.getElementById('email').removeAttribute("readonly");
    document.getElementById('pwd').removeAttribute("readonly");
    change_buttons();
}

function change_buttons() {
 var edit = document.getElementById('edit');
 var x = document.getElementById("editable")
 edit.parentNode.removeChild(edit);
 x.style.display = "block";
}