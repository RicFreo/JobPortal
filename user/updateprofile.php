<?php
session_start();
require_once("../db.php");

//if user clicked register button
if(isset($_POST))
{
	// Special Characters not allowed
	$firstname = mysqli_real_escape_string($conn, $_POST ['firstname']);
	$lastname = mysqli_real_escape_string($conn, $_POST ['lastname']);
	$address = mysqli_real_escape_string($conn, $_POST ['address']);
	$city = mysqli_real_escape_string($conn, $_POST ['city']);
	$state = mysqli_real_escape_string($conn, $_POST ['state']);
	$contactno = mysqli_real_escape_string($conn, $_POST ['contactno']);
	$qualification = mysqli_real_escape_string($conn, $_POST ['qualification']);
	$stream = mysqli_real_escape_string($conn, $_POST ['stream']);
	$passingyear = mysqli_real_escape_string($conn, $_POST ['passingyear']);
	$dob = mysqli_real_escape_string($conn, $_POST ['dob']);
	$age = mysqli_real_escape_string($conn, $_POST ['age']);
	$designation = mysqli_real_escape_string($conn, $_POST ['designation']);
	
	$sql = "UPDATE tbusers SET firstname='$firstname',lastname='$lastname',contactno='$contactno'
			,address='$address',city='$city', state='$state', qualification='$qualification', stream='$stream', passingyear='$passingyear', dob='$dob', age='$age', designation='$designation' WHERE id_user='$_SESSION[id_user]'";
		
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