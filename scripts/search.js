function search(str){
    if(str.length > 0){
        if(window.XMLHttpRequest){
            xhttp=new XMLHttpRequest();
        } 
        else{  
            xhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
        xhttp.onreadystatechange = function(){
          if(this.readyState == 4 && this.status == 200){
                var names = JSON.parse(this.responseText);
                for(var i=1;i<=names.length;i++){
                    document.getElementById(i).setAttribute("value",names[i-1]);
                }
              for(;i<=5;i++){
                    document.getElementById(i).setAttribute("value","");
                }
             }
            };
        xhttp.open("GET","search_results.php?name="+str,true);
        xhttp.send();
    }
}