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

function setEditManagerPage()
{
	document.getElementById('cost').removeAttribute("readonly");
	document.getElementById('rest_name').removeAttribute("readonly");
	document.getElementById('latitude').removeAttribute("readonly");
	document.getElementById('manager_id').removeAttribute("readonly");
	document.getElementById('rest_addr').removeAttribute("readonly");
	document.getElementById('rest_cuisine').removeAttribute("readonly");
	document.getElementById('rating').removeAttribute("readonly");
	document.getElementById('start_time').removeAttribute("readonly");
	document.getElementById('end_time').removeAttribute("readonly");
	document.getElementById('longitude').removeAttribute("readonly");
	document.getElementById('rating_count').removeAttribute("readonly");
	change_buttons();
}	