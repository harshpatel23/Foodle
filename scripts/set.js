function setEdit()
{
	document.getElementById('fname').removeAttribute("readonly");
    document.getElementById('lname').removeAttribute("readonly");
    document.getElementById('contact').removeAttribute("readonly");
    document.getElementById('email').removeAttribute("readonly");
    document.getElementById('pwd').removeAttribute("readonly");
    remove_edit_btn();
    add_confirm_btn();
    add_reset_button();
}

function remove_edit_btn() {
 var elem = document.getElementById('edit');
 elem.parentNode.removeChild(elem);
}