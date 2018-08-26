<?php
 session_start();
 require_once("../db.php");
 
 if(isset($_GET))
 {
	$sql = "DELETE FROM tbusers WHERE id_user='$_GET[id]'";
	if($conn->query($sql))
	{
		header("Location: user.php");
		exit();
	}
	else
	{
		echo "Error";
	}
 }