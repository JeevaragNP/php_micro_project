<?php 
	include "dbconnec.php";
	$var=$_GET["cid"];
	$res=mysqli_query($con,"DELETE FROM `signup` WHERE `id`='$var'");
	unlink("uploads/".$row["pic"]);
	header("location:usertable.php");
?>