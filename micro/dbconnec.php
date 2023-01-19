<?php 
$con = mysqli_connect("localhost","root","","micro");
if($con)
	echo "Connected";
else
	echo "not connected";
?>