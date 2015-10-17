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
        xmlhttp.open("GET","increment.php?q=report&&qid="+id+"&&report="+report,true);
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
                 
                 function dontknow(id) {
   document.getElementById(id).src="down.png";
              var qid = document.getElementById(id).id;   
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
        
        xmlhttp.open("GET","increment.php?q=dont&&aid="+qid,true);
        xmlhttp.send();
    }
   
    </script>   
    </head>
<body>
<div align="center" style="background-color: #222222;    height: 26%;    border-bottom: 12px solid #171717;
    border-top: 12px solid #171717;">
   
<div id="inner" style="display:none"></div>  
    
<div style="color: white;
    font-size: 6em;    font-weight: 600;
    text-decoration: underline;" >FLOWLEDGE</div>     <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:10px"><a href="logout.php" >SignOut</a></div>         <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:50px"><a href="profile.php" >See Profile</a></div>
      <div id="content2" style="color:red;">Select a Question to Answer</div>
    </div>
    <div id="container" style="font-size:45px;" align="center"></div>    
<?php
include('main.php');
if(!($_GET['user']))
{
    header("Location:index.php");
}
$uid=$_GET['user'];
$sqlq = "SELECT * FROM user WHERE username='$uid'";
$retvalq = mysqli_query( $con,$sqlq );
while($row = mysqli_fetch_array($retvalq, MYSQL_ASSOC))
{
   $current=$row['current'];
}


$sql = "SELECT * FROM questions WHERE  currentclass='$current' AND postedby!='$uid'";
$retval = mysqli_query( $con,$sql );

while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    
   $question=$row['question'];
    $id=$row['ID'];
echo <<<_END
<li style="color:black;font-size: -webkit-xxx-large;font-weight:600;list-style-type:cirle"><a href="quest.php?id=$id">$question</a></li><br><img id="$id" src="thumbs-down-icon.png" width="45px" data-toggle="tooltip" title="Can't Solve" style="cursor:pointer" onclick="dontknow(this.id)">
<span id='$id' style="cursor:pointer;font-size: 1.7em;color:red" onclick="report(this.id)">report</span>
</div>
<br>
_END;
}
?>    
<?php  
if($current != "primary")
echo "<h2>Question From Juniors</h2>"
 ?>
<?php
$sql2 = "SELECT * FROM questions WHERE currentclass='primary' AND dontknow >= 1000";
if($current == "secondary")
$sql2 = "SELECT * FROM questions WHERE currentclass='primary' AND dontknow >= 10";
if($current == "stream")
$sql2 = "SELECT * FROM questions WHERE currentclass='secondary' AND dontknow >= 10";
if($current == "degree")
$sql2 = "SELECT * FROM questions WHERE currentclass='pu' AND dontknow >= 10";
if($current == "job")
$sql2 = "SELECT * FROM questions WHERE currentclass='degree' AND dontknow >= 10";
$retval2 = mysqli_query( $con,$sql2);
while($row2 = mysqli_fetch_array($retval2, MYSQL_ASSOC))
{
    
   $question=$row2['question'];
    $id=$row2['ID'];
echo <<<_END
<li style="color:black;font-size: -webkit-xxx-large;font-weight:600;list-style-type:cirle"><a href="quest.php?id=$id">$question</a></li><br><br>
_END;
}
?>
    </body>
</html>
