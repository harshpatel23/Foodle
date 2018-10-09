function add_fav(rest_id) {
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) 
			if(this.responseText == "login")
				alert("Please login to continue!");
			else
				if(this.responseText == "fav added"){
					alert("Added to favourites!")
					document.getElementById("fav-heart").className="fa fa-heart";
				}
				else if(this.responseText == "fav deleted")
					document.getElementById("fav-heart").className="fa fa-heart-o";
				else if(this.responseText == "error")
					alert("Something went wrong, please try again later");
				else
					alert(this.responseText);
	};
	
	if(document.getElementById("fav-heart").className=="fa fa-heart-o")
		flag = 1;
	else
		flag = 2;
	xmlhttp.open("GET","add_fav.php?rest_id="+rest_id+"&flag="+flag, true);
	xmlhttp.send();

}