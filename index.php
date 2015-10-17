<html>
<head>
<script type="text/javascript">
function dispLogin(){
    
     document.getElementById("buttons").style.display="none";

    document.getElementById("login").style.display="inline";
    
}
    
    
    </script>    
    
<link rel="stylesheet" href="style.css" type="text/css">
    </head>    
<body>
   
    
<div id="wrap1" align="center">
   
   
    
    <div id="abc"><div id="content" >FLOWLEDGE</div>     
      <div id="content2" >LET THE KNOWLEDGE FLOW</div></div>

<form id="login" class="tbox" action="login.php" method="post">
     <br>      
    <input type="text" name="id" placeholder="USERID">
     
    <input type="password" name="pass" placeholder="PASSWORD">
    <br>    <br>
    <input type="submit" class="myButton" value="Login" >
    
    </form>  
    
 <?php
if(isset($_GET['err']))
{
echo <<<_END
<p style="color:red; font-size:3em; margin-top: auto;">INVALID USER</p><br>
<a href="index.php" style="color:white; font-size:2em;">Try Loging in Again</a>
   
_END;
}

?>    
    
    
    <div align="center" id="buttons" style="padding-top: 2em;">
    <input type="button" class="myButton" value="Login" onclick="dispLogin()" ">
     <input type="button" class="myButton" value="Signup" onclick="window.location.href='signup.php'">
    
    </div>
    
    </div>  
    
 <?php
if(isset($_GET['err']))
{
echo <<<_END

   <script type="text/javascript">
   document.getElementById("buttons").style.display="none";
   </script>
_END;
}

?>    
    
  
   
    
    
    </body>

</html>