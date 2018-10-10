function search(str){
    if(str.length > 0){
        alert(str);
        if(window.XMLHttpRequest){
            xhttp=new XMLHttpRequest();
        } 
        else{  
            xhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    
        xhttp.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
              alert(this.responseText);
                var names = JSON.parse(this.responseText);
                for(var i=1;i<=names.length;i++){
                    document.getElementById(i).setAttribute("value",names[i]);
                }
              for(;i<=5;i++){
                    document.getElementById(i).setAttribute("value","");
                }
             }
        };
        alert("search_results.php?name="+str);
        xmlhttp.open("GET","search_results.php?name="+str,true);
        xmlhttp.send();
    }
}