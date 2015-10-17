<?php
include('main.php');
session_start();

  $log=$_POST['id'];
    $pwd=$_POST['pass'];

$sql = "SELECT * FROM user WHERE username='$log' AND password='$pwd'";


$retval = mysqli_query( $con,$sql);
$row= mysqli_num_rows($retval);
if($row==1)
{
    header("Location:profile.php");
    $_SESSION['varname'] = $log;
}
else
{
    header("Location:index.php?err=1");
}
?>