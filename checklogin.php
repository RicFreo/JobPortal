<?php
session_start();
require_once("db.php");

//if user click login button
if(isset($_POST))
{
	// Escape special character in string
	
	$EMail = mysqli_real_escape_string($conn, $_POST ['EMail']);
	$Password = mysqli_real_escape_string($conn, $_POST ['Password']);
	
	// Encrypt Password
	//$password = base64_encode(strrev(md5($password)));
	
	$sql = "SELECT ID, User_ID, Role_ID, EMail FROM user_list WHERE EMail='$EMail' AND Password='$Password'";
	$result = $conn -> query($sql);
	
	if($result -> num_rows > 0 )
	{
		//ouput data
		while ($row = $result -> fetch_assoc())
		{
			//$_SESSION['name'] = $row['firstname'] . "" . $row['lastname'];
 			$_SESSION['EMail'] = $row['EMail'];
			$_SESSION['id_user'] = $row['User_ID'];
			
			if(isset($_SESSION['callFrom']))
			{
				$location = $_SESSION['callFrom'];
				unset($_SESSION['callFrom']);
				header ("Location: " . $location);
				exit();
			}
			else
			{
				if ($row['Role_ID'] == 1)
				{
				header ("Location: admin/dashboard.php");
				exit();
				}
				else if ($row['Role_ID'] == 2)
				{
				header ("Location: user/dashboard.php");
				exit();
				}
				else if ($row['Role_ID'] == 3)
				{
				header ("Location: company/dashboard.php");
				exit();
				}
			}
		}
	}
	else
	{
		$_SESSION['loginError'] = true;
		header ("Location: login.php");
		exit();
	}
	
	$conn -> close();
	
}
else
{
	//rediret them back to login page
	header("Location: login.php");
	exit();
}