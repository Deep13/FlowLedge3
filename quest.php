<?php
session_start();
include('main.php');
?>



<html>
    <head>
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
        <link rel="stylesheet" href="style.css" type="text/css">
    </head>
<body>
  <div align="center" style="background-color: #222222;    height: 26%;    border-bottom: 12px solid #171717;
    border-top: 12px solid #171717;">
   
   
    
<div style="color: white;
    font-size: 6em;    font-weight: 600;
    text-decoration: underline;" >FLOWLEDGE</div>     <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:10px"><a href="logout.php" >SignOut</a></div>         <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:50px"><a href="profile.php" >See Profile</a></div>
      <div id="content2" style="color:red;">Questions You Asked</div>
    </div>
    <div id="container" style="font-size:45px;" >
    
    
    <?php
$uid=$_SESSION['varname'];
if(!($_GET['id']))
{
    header("Location:index.php");
}
$qid=$_GET['id'];
$sqlq = "SELECT * FROM questions WHERE ID='$qid'";
$retvalq = mysqli_query( $con ,$sqlq);

while($row = mysqli_fetch_array($retvalq, MYSQL_ASSOC))
{
   $question=$row['question'];
    $qid=$row['ID'];
echo <<<_END
<div style="font-size: -webkit-xxx-large;font-weight:600;">$question</div><br>
_END;
}


$sql = "SELECT * FROM answer WHERE  qid='$qid'";
$retval = mysqli_query( $con ,$sql);

while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    
   $ans=$row['reply'];
    $aid=$row['aid'];
    $date=$row['date'];
echo <<<_END
<div class="answer" style:"margin-left: 22px;    font-size: xx-large;">
<span>$ans</span><br><img id="$aid.b" src="thumbs-up-icon.png" width="45px" data-toggle="tooltip" title="UpVote" style="cursor:pointer" onclick="increment(this.id)">
    <img id="$aid.a" src="thumbs-down-icon.png" width="45px" data-toggle="tooltip" title="Disagree" style="cursor:pointer" onclick="decrement(this.id)"><span>$date</span>
    <input id='$aid.c' value='$aid' style='display:none' name='aid'>
    <span id='$aid' style="cursor:pointer;font-size: 0.7em;color:red" onclick="report(this.id)">report</span>
</div>
_END;
}
?>
    
    
    </div>    
    <br>
    <form action="submit.php" method="post">
    
    <textarea name="answer" placeholder="Write your reply to  the question" rows="10" cols="80"></textarea>
         <input type="text" name="quesid" value="<?php echo $qid?>" style="display:none"><br><br>
    <input type="submit" value="Submit Answer">
    </form>
    
    </body>

</html>