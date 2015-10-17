
<html>
    <head>
        <link rel="stylesheet" href="style.css" type="text/css">
             <script>
                 function report(id)
                 {
                     var report=prompt("Reason for report");
                    
                    
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
        xmlhttp.open("GET","increment.php?q=report&&aid="+id+"&&report="+report,true);
        xmlhttp.send();       
                     
                 }
                 
        function increment(id) {
 document.getElementById(id).src="ok.png";
            var len=id.length;
            var eid=id.substring(0,len-1);
            eid=eid+'c';
        var aid = document.getElementById(eid).value;    
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
        xmlhttp.open("GET","increment.php?q=true&&aid="+aid,true);
        xmlhttp.send();
    }
        
        
        
         function decrement(id) {
   document.getElementById(id).src="down.png";
             var len=id.length;
            var eid=id.substring(0,len-1);
            eid=eid+'c';
              var aid = document.getElementById(eid).value;   
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
        xmlhttp.open("GET","increment.php?q=false&&aid="+aid,true);
        xmlhttp.send();
    }
   
    </script>
    </head>
<body>
    <div align="center" style="background-color: #222222;    height: 26%;    border-bottom: 12px solid #171717;
    border-top: 12px solid #171717;">
   
   
    
<div style="color: white;
    font-size: 6em;    font-weight: 600;
    text-decoration: underline;" >FLOWLEDGE</div>     <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:10px"><a href="logout.php" >SignOut</a></div>         <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:50px"><a href="profile.php" >See Profile</a></div>
      <div id="content2" style="color:red;">Questions You Asked</div>
    </div>
    <div id="container" style="font-size:45px;" align="center"></div>
<?php 
session_start();
include('main.php');
$uid=$_SESSION['varname'];
$sql = "SELECT u.*,q.* FROM user u, questions q WHERE u.username = q.postedby AND username='$uid' ORDER BY posteddate DESC";
$retval = mysqli_query( $con,$sql);
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
echo <<<_END
<div id='qa'>
<div id='qblock'>
<br>    
<div><p style="float:left;font-size: -webkit-xxx-large;font-weight:600;">$row[question]<p>
<p style="float:right;">$row[posteddate]<p>
</div>
<br>
</div>


<div id='ablock' style="clear:both;">
_END;
$sql2 = "SELECT a.* FROM questions q, answer a WHERE a.qid = q.ID AND q.ID= $row[ID] ";
$retval2 = mysqli_query( $con,$sql2);
while($row2 = mysqli_fetch_array($retval2, MYSQL_ASSOC))
{
echo <<<_END
<div class='answer'>
<div>$row2[reply]</div>

<img id="$row2[aid].b" src="thumbs-up-icon.png" width="45px" data-toggle="tooltip" title="UpVote" style="cursor:pointer" onclick="increment(this.id)">
    <img id="$row2[aid].a" src="thumbs-down-icon.png" width="45px" data-toggle="tooltip" title="Disagree" style="cursor:pointer" onclick="decrement(this.id)">
    <input id='$row2[aid].c' value='$row2[aid]' style='display:none' name='aid'>
    <span id='$row2[aid]' style="cursor:pointer;font-size: 1.7em;color:red" onclick="report(this.id)">report</span>
</div>
_END;
}
echo <<<_END
</div>
</div>

_END;
}
?>

    
</body>


</html>