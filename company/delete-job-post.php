<?php
session_start();
require_once("../db.php");

//if user clicked register button
if(isset($_POST))
{
	$sql = "DELETE FROM tbljob_post WHERE id_jobpost='$_GET[id]' AND id_company= '$_SESSION[id_user]'";
		
		if($conn -> query ($sql)===TRUE)
		{
			$_SESSION['jobPostDeleteSuccess'] = true;
			header("Location: dashboard.php");
			exit();
		}
		else
		{
			echo "Error!" . $sql . "<br>" . $conn->error;
		}
	$conn -> close();	
}
	else
{
	header("Location: dashboard.php");
	exit();
}