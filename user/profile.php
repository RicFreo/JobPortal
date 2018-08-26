<?php
session_start();
	if(empty($_SESSION['id_user']))
{
	header("Location: user/dashboard.php");
	exit();
}
require_once("../db.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>HireME</title>

    <!-- Bootstrap -->
   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
  
  
	<!--NAVIGATION BAR-->
   	<header>
					<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <li><a class="navbar-brand" href="../index.php">HireME</a></li>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<ul class="nav navbar-nav navbar-right">
					<li><a href= "profile.php" >Profile</a></li>
					<li><a href="../logout.php">Logout</a></li>
				 </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	</header>
	
	<section>
		<div class=".container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 well">
					<h2 class="text-center">Profile</h2>
					<form method="post" action= "updateprofile.php">
					<?php
					
						$sql = "SELECT * FROM tbusers WHERE id_user = '$_SESSION[id_user]'";
						$result = $conn -> query($sql);
						
						if($result->num_rows > 0)
						{
							while ($row = $result->fetch_assoc()){
					?>
					<div class="form-group">
						<div class="form-group">
						<label for="program">Program</label>
						<input type="text" class="form-control" id="program" name= "program" placeholder="Program" value="<?php echo $row['program']?>" readonly>
					  </div>
						<div class="form-group">
						<label for="firstname">First name</label>
						<input type="text" class="form-control" id="firstname" name= "firstname" placeholder="First name" value="<?php echo $row['firstname']?>" required="">
					  </div>
						<div class="form-group">
						<label for="lastname">Last name</label>
						<input type="text" class="form-control" id="lastname" name= "lastname" placeholder="Last name" value="<?php echo $row['lastname']?>" required="">
					  </div>
					  <div class="form-group">
						<label for="email">Email address</label>
						<input type="email" class="form-control" id="email" placeholder="Email" value="<?php echo $row['email']?>" readonly>
					  </div>
					  <div class="form-group">
						<label for="address">Address</label>
						<textarea id="address" name="address" class="form-control" placeholder="Address" rows="5"> <?php echo $row['address']; ?></textarea>
					  </div>
					  <div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" name="city" placeholder="City" value="<?php echo $row['city']?>" required="">
					  </div>
					  <div class="form-group">
						<label for="state">State</label>
						<input type="text" class="form-control" id="state" name="state" placeholder="State" value="<?php echo $row['state']?>" required="" >
					  </div>
					  <div class="form-group">
						<label for="contactno">Contact No.</label>
						<input type="text" class="form-control" id="contactno" name="contactno" placeholder="Contact Number" value="<?php echo $row['contactno']?>" required="">
					  </div>
					  <div class="form-group">
						<label for="qualification">Highest Qualification</label>
						<input type="text" class="form-control" id="qualification" name="qualification" placeholder="Qualification" value="<?php echo $row['qualification']?>" required="">
					  </div>
					  <div class="form-group">
						<label for="stream">Stream</label>
						<input type="text" class="form-control" id="stream" name="stream" placeholder="Stream" value="<?php echo $row['stream']?>" required="" >
					  </div>
					  <div class="form-group">
						<label for="passingyear">Date Graduated</label>
						<input type="date" class="form-control" id="passingyear" name="passingyear" placeholder="Date Graduated" value="<?php echo $row['passingyear']?>" required="">
					  </div>
					   <div class="form-group">
						<label for="dob">Date of Birth</label>
						<input type="date" class="form-control" id="dob" name="dob" placeholder="Date of Birth" value="<?php echo $row['dob']?>" required="" >
					  </div>
					   <div class="form-group">
						<label for="age">Age</label>
						<input type="text" class="form-control" id="age" name="age" placeholder="Age" value="<?php echo $row['age']?>" required="" >
					  </div>
					  <div class="form-group">
						<label for="designation">Designation</label>
						<input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" value="<?php echo $row['designation']?>" required="">
					  </div>
						<div class="text-center">
							<button type="submit" class="btn btn-success">Update</button>
						</div>
					<?php
							}
						}
					?>
					</form>
				</div>
			</div>
		</div>

	
	</section>
	
	
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
  </body>
</html>







