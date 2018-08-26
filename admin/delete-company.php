<?php
 session_start();
 require_once("../db.php");
 
 if(isset($_GET))
 {
	$sql = "DELETE FROM tblcompany WHERE id_company='$_GET[id]'";
	if($conn->query($sql))
	{
		header("Location: company.php");
		exit();
	}
	else
	{
		echo "Error";
	}
 }