<?php
session_start();
require_once("db.php");

//if user clicked register button
if(isset($_POST))
{
	// Special Characters not allowed
	$lastname = mysqli_real_escape_string($conn, $_POST ['lname']);
	$firstname = mysqli_real_escape_string($conn, $_POST ['fname']);
	$email = mysqli_real_escape_string($conn, $_POST ['email']);
	$password = mysqli_real_escape_string($conn, $_POST ['password']);
	$program = mysqli_real_escape_string($conn, $_POST ['program']);
	
	// Encrypt Password
	$password = base64_encode(strrev(md5($password)));
	
	$sql = "SELECT email FROM tbusers WHERE email='$email'";
	$result = $conn -> query($sql);
	
	if($result -> num_rows == 0 )
	{
	
		$sql = "INSERT into tbusers(program,lastname,firstname,email,password) VALUES ('$program','$lastname','$firstname','$email','$password')";
	
		if($conn -> query ($sql)===TRUE)
		{
			$_SESSION['registerCompleted'] = true;
			header("Location: login.php");
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
		header("Location: register.php");
		exit();
	}
		
	$conn -> close();
	
}	
	else
{
	header("Location: register.php");
	exit();
}