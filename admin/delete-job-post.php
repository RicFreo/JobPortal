<?php
 session_start();
 require_once("../db.php");
 
 if(isset($_GET))
 {
	$sql = "DELETE FROM tbljob_post WHERE id_jobpost='$_GET[id]'";
	if($conn->query($sql))
	{
		header("Location: job-post.php");
		exit();
	}
	else
	{
		echo "Error";
	}
 }