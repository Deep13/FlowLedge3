<?php
$con= mysql_connect('localhost','root','');
mysql_select_db("flowledge",$con);
if(!$con)
{
die("Connection not established:" . mysql_connect_error());
}
?>


