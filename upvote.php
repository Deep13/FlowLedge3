<html>
    <script src="jquery.min.js" type="text/javascript"></script>
    <script>
        function increment() {
  var sr=document.getElementById('pic').src;
            alert(sr);
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("inner").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","increment.php?q=true",true);
        xmlhttp.send();
    }
        
        
        
         function decrement() {
   document.getElementById('dpic').src="down.png";
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("inner").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET","increment.php?q=false",true);
        xmlhttp.send();
    }
   
    </script>
<body>
   <img id="pic" src="thumbs-up-icon.png" width="45px" onclick="increment()">
    <img id="dpic" src="thumbs-down-icon.png" width="45px" onclick="decrement()">
    </body>
</html>