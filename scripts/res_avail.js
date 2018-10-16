function table_check(rest_id){
    var size = document.getElementById('table-size').value;
    var time = document.getElementById('datetime').value;
    var res = document.getElementById("reserve");
    var message = document.getElementById("message");
    xhttp=new XMLHttpRequest();
    xhttp.onreadystatechange = function(){
            if(this.readyState == 4 && this.status == 200){
                var response = this.responseText;
                if(response == "available"){
                    message.style.display = "none";
                    res.disabled = false;
                }
                else{
                    message.style.display = "block";
                    res.disabled = true;
                }
            }
        };
        xhttp.open("GET", "table_availability.php?rest_id="+rest_id+"&size="+size+"&time="+time, true);
        xhttp.send();
}