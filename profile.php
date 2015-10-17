<?php 
session_start();
include('main.php');
$uid=$_SESSION['varname'];
$sql = "SELECT * FROM user WHERE username='$uid'";
$retval = mysqli_query( $con,$sql );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    $uname=$row['name'];
$uid=$row['username'];
$email=$row['email'];
$primary=$row['primary'];
    $degree=$row['degree'];
$secondary=$row['secondary'];
$pu=$row['pu'];
$job=$row['job'];
$nquestions=$row['nquestions'];
$nanswers=$row['nanswers'];
$currentclass=$row['current'];
}
?>
<html>
<head>
     <script type="text/javascript" src="jquery.min.js"></script>
    <script type="text/javascript">
        
        function checkPass()
{
    var pass1 = document.getElementById('password');
    var pass2 = document.getElementById('confirm_password');
    var message = document.getElementById('confirmMessage');
    var goodColor = "#66cc66";
    var badColor = "#ff6666";
    if(pass1.value == pass2.value){
        pass2.style.backgroundColor = goodColor;
        message.style.color = goodColor;
        message.innerHTML = "Passwords Match!"
        document.getElementById('submit').style.display="block";
    }else{
        pass2.style.backgroundColor = badColor;
        message.style.color = badColor;
        message.innerHTML = "Passwords Do Not Match!"
        document.getElementById('submit').style.display="none";
    }
}  
        function checkFeild()
        {
            var current = $('#groups').find(":selected").val();
            if(current == 'primary')
            {
                $('#prim').show();
                $('#second').hide();                
                $('#pu').hide();
                $('#degree').hide();
                $('#job').hide();
                
            }
            if(current == 'secondary')
            {
                $('#second').show();
                $('#prim').hide();               
                $('#pu').hide();
                $('#degree').hide();
                $('#job').hide();
            }
            if(current == 'pu')
            {
                $('#pu').show();
                $('#second').hide();  
                $('#degree').hide();
                $('#job').hide();                
                $('#prim').hide();  
            }
            if(current == 'degree')
            {
                $('#pu').show();
                $('#degree').show();                
                $('#second').hide();
                $('#job').hide();                
                $('#prim').hide();
            }
            if(current == 'job')
            {
                $('#pu').show();
                $('#degree').show();
                $('#job').show();              
                $('#prim').hide();
                $('#second').hide();  
            }
        }
    </script>
    <style>
        
        input {
   
   margin-top: 10px!important;

}
        
        .dispNone{
            display: none;
        }
    </style>
<link rel="stylesheet" href="style.css" type="text/css">
    </head>    
<body>
   
    
<div align="center" style="background-color: #222222;    height: 26%;    border-bottom: 12px solid #171717;
    border-top: 12px solid #171717;">
   
   
    
<div style="color: white;
    font-size: 6em;    font-weight: 600;
    text-decoration: underline;" >FLOWLEDGE</div>     <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:10px"><a href="logout.php" >SignOut</a></div>
       
      <div id="content2" style="color:red;"><?php echo $uname."'s " ?>Dashboard</div>
    </div>
<div id="container" style="font-size:45px;" align="center">
<table id="table1">
<br>
        <tr>
            <td>Your User-Id:</td>
        <td><?php echo $uid?></td>
        </tr>
        <tr>
        <td>Your Email:</td>
        <td><?php echo $email ?></td>
        </tr>
        <tr>
        <td>No. of questions asked:</td>
            <td>
            <?php 
    if($nquestions>0)
{
echo <<<_END
    
    $nquestions
    
_END;
}
else{
echo <<<_END
    
    $nquestions
    
_END;
}
    
    ?>
            
            
            </td>
        </tr>
        <tr>
        <td>No. of question you answered:</td>
            <td>
                <?php 
    if($nanswers>0)
{
echo <<<_END
    
    $nanswers
    
_END;
}
else{
echo <<<_END
    
    $nanswers
    
_END;
}
    
    ?>
                
               </td>
        </tr>
        <?php
if($job!="0")
{
    echo "
     <tr>
        <td>Job Description:</td>
        <td>$job</td>
        </tr>
        
         <tr>
        <td>Branch in College:</td>
        <td>$degree</td>
        </tr>
        
        <tr>
        <td>Stream in PU:</td>
        <td>$pu</td>
        </tr>
    ";
}

else if($degree!="0")
{
    echo "
         <tr>
        <td>Branch in College:</td>
        <td>$degree</td>
        </tr>
        
        <tr>
        <td>Stream in PU:</td>
        <td>$pu</td>
        </tr>
    ";
}
else if($pu!="0")
{
    echo "
        
        <tr>
        <td>Stream in PU:</td>
        <td>$pu</td>
        </tr>
    ";
}

else if($secondary!="0")
{
    echo "
        
        <tr>
        <td>Current class:</td>
        <td>$secondary</td>
        </tr>
    ";
}
else if($primary!="0")
{
    echo "
        
        <tr>
        <td>Current class:</td>
        <td>$primary</td>
        </tr>
    ";
}


    
    ?>
   
    </table>   
<br>
        
<form method="post" action="fetchQuestions.php">
    <input name="currentclass" value="<?php echo $currentclass ?>" style="display:none">
<textarea rows="10" cols="80" name="question" placeholder="Eg. What is Chlorophyl? " oninput="askQ()">
</textarea>
<script>
function askQ(){
document.getElementById("askQuestion").style.display="inline-block";
    
}    
</script>    
    
    <br>
    <input type="submit" value="ASK A QUESTION" id="askQuestion" style="display:none;">
<br>    
 <input type="button" value="Questions I asked" onclick="window.location.href='userQuestion.php'">
    
    <input type="button" value="Answer A Question" onclick="window.location.href='questions.php?user=<?php echo $uid ?>'">
    
</form>    
  
    
</div>
</body>

</html>