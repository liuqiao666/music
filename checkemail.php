<?php
	error_reporting(0);
	mysql_query("set names 'utf8'");
	include "Connections/myconn.php";
 	mysql_select_db("music",$myconn);
 	//echo $_GET['username'];
 	$sql="update user set status = '1' where email='".$_GET['email']."'";

	$result=mysql_query($sql);
	if($result){	
	  echo "<script>alert('Congratulations!        Activation successful^-^'); location.href='login.php';</script>;";
	
	}
?>

