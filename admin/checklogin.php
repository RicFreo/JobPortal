<?php
session_start();
require_once("../db.php");

//if user click login button
if(isset($_POST))
{
	// Escape special character in string
	
	$username = mysqli_real_escape_string($conn, $_POST ['username']);
	$password = mysqli_real_escape_string($conn, $_POST ['password']);
	
	// Encrypt Password
	// $password = base64_encode(strrev(md5($password)));
	
	$sql = "SELECT * FROM tbladmin WHERE username='$username' AND password='$password'";
	$result = $conn -> query($sql);
	
	if($result -> num_rows > 0 )
	{
		//ouput data
		while ($row = $result -> fetch_assoc())
		{
			$_SESSION['id_admin'] = $row['id_admin'];
			header ("Location: dashboard.php");
			exit();
		}
	}
	else
	{
		$_SESSION['loginError'] = true;
		header ("Location: index.php");
		exit();
	}
	
	$conn -> close();
	
}
else
{
	//rediret them back to login page
	header("Location: index.php");
	exit();
}