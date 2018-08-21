function validateForm()
{
	var p1 = document.getElementById('pwd').value;
	var p2 = document.getElementById('pwd1').value;
	if(p1==p2)
		return true;
	else{
		alert("passwords do not match");
		return false;
	}
}