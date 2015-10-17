<?php 
session_start();
include('main.php');
$uid=$_SESSION['varname']; 
$ans=$_POST['answer'];
$quesid=$_POST['quesid'];
$date=date("j F o");
$sqlq = "SELECT * FROM questions WHERE ID='$quesid'";
$retvalq = mysqli_query( $con,$sqlq);
while($row = mysqli_fetch_array($retvalq, MYSQL_ASSOC))
{
    $usid=$row['postedby'];
}
$sql ="INSERT INTO `answer` (`qid`, `uid`, `reply`,`date`) VALUES ('$quesid', '$usid', '$ans','$date')";
$rsl=mysqli_query($con,$sql);
mysqli_query($con,"UPDATE user SET nanswers = nanswers + 1 WHERE username='$uid' ");
mysqli_query($con,"UPDATE questions SET replies = replies + 1 WHERE ID='$quesid' ");
if($rsl)
{
 header("Location:quest.php?id=$quesid");   
}
?>