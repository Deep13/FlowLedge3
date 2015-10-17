<?php 
session_start();
include('main.php') ;
$fname=$_POST['fname'];
$email=$_POST['email'];
$pwd=$_POST['password'];
$usn=$_POST['usn'];
$sqlq = "SELECT * FROM user WHERE username='$usn'";
$retvalq = mysqli_query($con ,$sqlq);
if(! $retvalq )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_array($retvalq, MYSQL_ASSOC))
{
    header("Location:signup.php?err=2");
}
if ($_POST['job']!="") {
  $primary="8";
$secondary="10";
$pu=$_POST['stream'];
$degree=$_POST['degree'];
$job=$_POST['job'];
    $current="job";
} 
else if ($_POST['degree']!="") {
 $primary="8";
$secondary="10";
$pu=$_POST['stream'];
$degree=$_POST['degree'];
    $job="0";
    $current="degree";
    
}
else if ($_POST['stream']!="") {
 $primary="8";
$secondary="10";
$pu=$_POST['stream'];
    $degree="0";
    $job="0";
    $current="stream";
}
else if($_POST['secondary']!="") {
    $primary="8";
$secondary=$_POST['secondary'];
    $pu="0";
    $degree="0";
    $job="0";
    $current="secondary";
}
else if ($_POST['primary']!="") {
  $primary=$_POST['primary'];
$secondary="0";
    $pu="0";
    $degree="0";
    $job="0";
    $current="primary";
}
$nq = 0;
$na = 0;
$sql ="INSERT INTO `user` (`username`, `password`, `primary`, `secondary`, `pu`, `degree`, `job`, `nquestions`, `nanswers`, `name`, `email`,`current`) VALUES ('$usn', '$pwd', '$primary', '$secondary', '$pu', '$degree', '$job', '$nq', '$na', '$fname', '$email','$current')";
$rsl=mysqli_query($con,$sql);
if($rsl)
{
    header("Location:profile.php");
    $_SESSION['varname'] = $usn;
}

?>