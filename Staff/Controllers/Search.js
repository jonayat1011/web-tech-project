function Search(){
    let eqp = document.getElementById("search").value;
    let xhttp = new XMLHttpRequest();
           xhttp.onreadystatechange = function() {
  
               if (this.readyState == 4 && this.status == 200) {
                 document.getElementById("searcheqp").innerHTML =this.responseText;
               }
  
               else
               {
                   document.getElementById("searcheqp").innerHTML = this.status;
               }
             };
             xhttp.open("POST", "../controller/SearchCheck.php", true);
             xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
             xhttp.send("Search="+eqp);
            }
  
  