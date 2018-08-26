<?php
session_start();
require_once("db.php");

//if user clicked register button
if(isset($_POST))
{
	// Special Characters not allowed
	$companyname = mysqli_real_escape_string($conn, $_POST ['companyname']);
	$hoc = mysqli_real_escape_string($conn, $_POST ['hoc']);
	$contactno = mysqli_real_escape_string($conn, $_POST ['contactno']);
	$website = mysqli_real_escape_string($conn, $_POST ['website']);
	$companytype = mysqli_real_escape_string($conn, $_POST ['companytype']);
	$email = mysqli_real_escape_string($conn, $_POST ['email']);
	$password = mysqli_real_escape_string($conn, $_POST ['password']);
	
	// Encrypt Password
	$password = base64_encode(strrev(md5($password)));
	
	$sql = "SELECT email FROM tblcompany WHERE email='$email'";
	$result = $conn -> query($sql);
	
	if($result -> num_rows == 0 )
	{
	
		$sql = "INSERT into tblcompany(companyname,hoc,contactno,website,companytype,email,password) VALUES
		('$companyname','$hoc','$contactno','$website','$companytype','$email','$password')";
	
		if($conn -> query ($sql)===TRUE)
		{
			$_SESSION['registerCompleted'] = true;
			header("Location: company-login.php");
			exit();
		}
		else
		{
			echo "Error!" . $sql . "<br>" . $conn->error;
		}
	}
	else
	{
		$_SESSION['registerError'] = true;
		header("Location: company-register.php");
		exit();
	}
		
	$conn -> close();
	
}	
	else
{
	header("Location: company-register.php");
	exit();
}