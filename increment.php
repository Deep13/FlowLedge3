<?php
include('main.php');
$inc=$_GET['q'];
$aid= $_GET['aid'];
if($inc=='true')
{
$sql = "SELECT * FROM answer WHERE aid=$aid";
$retval = mysqli_query($con , $sql);

while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    $up=$row['upvotes'];
}
$up=$up+1;
mysqli_query($con,"UPDATE answer SET upvotes='$up' WHERE aid=$aid");
}

else if($inc=='false')
{
$sql = "SELECT * FROM answer WHERE aid=$aid";
$retval = mysqli_query( $con,$sql );
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    $down=$row['downvote'];
}
$down=$down+1;
mysqli_query($con,"UPDATE answer SET downvote='$down' WHERE aid=$aid");
}

else if($inc=='dont')
{
    $sql = "SELECT * FROM questions WHERE ID=$aid";
$retval = mysqli_query( $con,$sql);

while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
    $dont=$row['dontknow'];
}
$dont=$dont+1;
mysqli_query($con,"UPDATE questions SET dontknow='$dont' WHERE ID=$aid");
}

else if($inc=='report')
{
    $rep=$_GET['report'];
    if(isset($_GET['aid']))
        {
        $ansid=$_GET['aid'];
$sql ="INSERT INTO `report` (`report`,`ansid`) VALUES ('$rep', '$ansid')";
$rsl=mysqli_query($con,$sql);
    }
    else if(isset($_GET['qid']))
        {
        $quesid=$_GET['qid'];
$sql ="INSERT INTO `report` (`report`,`quesid`) VALUES ('$rep', '$quesid')";
$rsl=mysqli_query($con,$sql);
    }
}
?>