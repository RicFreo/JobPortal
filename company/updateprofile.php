<?php
session_start();
require_once("../db.php");

//if user clicked register button
if(isset($_POST))
{
	// Special Characters not allowed
	$companyname = mysqli_real_escape_string($conn, $_POST ['companyname']);
	$hoc = mysqli_real_escape_string($conn, $_POST ['hoc']);
	$contactno = mysqli_real_escape_string($conn, $_POST ['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST ['website']);
	$companytype = mysqli_real_escape_string($conn, $_POST ['companytype']);
	
	$sql = "UPDATE tblcompany SET companyname='$companyname',hoc='$hoc',contactno='$contactno'
			,website='$website',companytype='$companytype' WHERE id_company='$_SESSION[id_user]'";
		
		if($conn -> query ($sql)===TRUE)
		{
			$_SESSION['profileUpdateSuccess'] = true;
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