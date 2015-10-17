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
    text-decoration: underline;" >FLOWLEDGE</div>     <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:10px"><a href="logout.php" >SignOut</a></div>         <div style="color: white;     font-size: 2em;    font-weight: 600;     text-decoration: underline;position:absolute;right:10px;top:50px"><a href="profile.php" >See Profile</a></div>
      <div id="content2" style="color:red;"> Enter Your Personal Details</div>
    </div>
<div id="container" align="center">
<form id="form" action="fetchHtml.php" method="post">
      
            
<label for="fname">Name</label><br>
<input type="text" name="fname" id="name" placeholder="Name" required/><br/><br>
            
<label for="usn">User Name</label>
            <?php
if(isset($_GET['err']))
{
echo <<<_END
<span>Username already exists</span>
_END;
}
            ?>
            <br>
<input type="text" name="usn" id="usn" placeholder="User Name" required/><br/><br>
            
<label for="email">Enter Your Email</label><br>
<input type="email" name="email" id="email" placeholder="abc@xyz.com" required/> <br>
<br>           
<label for='groups' >Choose your Group</label><br>
<select id="groups" name="group" onchange="checkFeild()" required>
<option value="">SELECT</option>
<option value="primary">Class 5 - 8</option>
<option value="secondary">Class 9-10</option>
<option value="pu">class 11-12</option>
<option value="degree">Degree</option>
<option value="job">Job</option>
</select>
<br/><br/>
<div id="prim" class="dispNone">    
<label for="primary">Enter Your Class</label>
<input type="number" name="primary" min="5" max="8">
</div>
<div id="second" class="dispNone">    
<label for="secondary">Enter Your Class</label>
<input type="number" name="secondary" min="9" max="10">
</div>
<div id="pu" class="dispNone">    
<label for="streams">Select Your Stream For PU(11th-12th)</label>
<select id="streams" name="stream">
<option value="">SELECT</option>
<option value="science">SCIENCE</option>
<option value="commerce">COMMERCE</option>
<option value="humanities">HUMANITIES</option>
</select>
</div>
<div id="degree" class="dispNone">    
<label for="degrees">Enter Your Degree</label>
<select id="degrees" name="degree" >
<option value="">SELECT</option>
<option value="be">B.E</option>
<option value="btech">B.TECH</option>
<option value="bsc">B.Sc</option>
<option value="bca">B.C.A</option>
<option value="me">M.E</option>
<option value="mtech">M.TECH</option>
<option value="msc">M.Sc</option>
<option value="mca">M.C.A</option>
<option value="phd">Ph.D</option>
<option value="mbbs">M.B.B.S</option>
<option value="bcom">B.Com</option>
<option value="mcom">M.Com</option>
<option value="bba">B.B.A</option>
<option value="llb">LL.B</option>
<option value="ba">B.A</option>
<option value="ma">M.A</option>
<option value="mphil">M.Phil</option>
</select>
</div>
<div id="job" class="dispNone">    
<label for="jobs">Job Description</label>
<input type="text" name="job">
</div>
<legend>Password</legend>
<label for="text">New Password</label>
<label for="text" style="padding-left:70px">Confirm New Password</label><br>
                
<input type="password" id="password" name="password" required>
<input type="password" id="confirm_password" onkeyup="checkPass();"><span id="confirmMessage" class="confirmMessage"></span>
   
            <br><br>
 <center>    <input id="submit" type="submit" value="Submit and LogOut" target="_blank"/> 
       </center>
   </form>     
    
  
    
</div>
</body>

</html>