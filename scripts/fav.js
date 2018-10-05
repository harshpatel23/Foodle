function add_fav(rest_id) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			if(document.getElementById("fav-btn").className=="btn btn-danger")
				document.getElementById("fav-btn").className="btn btn-light";
			else
				document.getElementById("fav-btn").className="btn btn-danger";
		}
	};
	
	if(document.getElementById("fav-btn").className=="btn btn-danger")
		flag = 2;
	else
		flag = 1;
	xmlhttp.open("GET","add_fav.php?rest_id="+rest_id+"?flag="+flag, true);
	alert("add_fav.php?rest_id="+rest_id+"&flag="+flag)
	xmlhttp.send();

}