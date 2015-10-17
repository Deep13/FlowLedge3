<?php 
session_start();
include('main.php');
$uid=$_SESSION['varname']; 
$question=$_POST['question'];
$now = new DateTime();
$date = $now->format('Y-m-d H:i:s');
$cclass = $_POST['currentclass'];

mysqli_query($con,"INSERT INTO questions(question,downvotes,replies,dontknow,postedby,posteddate,active,currentclass) VALUES('$question','0','0','0','$uid','$date','1','$cclass')");

mysqli_query($con,"UPDATE user SET nquestions = nquestions + 1 WHERE username='$uid' ");

?>

<script>
alert("Question Posted on Flowledge! Congrats");

    window.location.href="userQuestion.php";
</script>