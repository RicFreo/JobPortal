<?php
session_start();
require_once("db.php");
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
				  <a class="navbar-brand" href="#">HireME</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav navbar-right">
				  
					<?php
						
						if(isset($_SESSION['id_user']) && empty($_SESSION['companyLogged']))
						{
					?>
							<li><a href="user/dashboard.php">Dashboard</a></li>
							<li><a href="logout.php">Logout</a></li>
					<?php
						} else if(isset($_SESSION['id_user']) && isset($_SESSION['companyLogged']))
						{
					?>
						<li><a href="company/dashboard.php">Dashboard</a></li>
						<li><a href="logout.php">Logout</a></li>
					<?php
						}
						else
						{
					?>
					<li><a href="admin/dashboard.php">Admin</a></li>
					<li><a href="company.php">Company</a></li>
					<li><a href="register.php">Register</a></li>
					<li><a href="login.php">Login</a></li>
					<li><a href="aboutus.php">About US</a></li>
					<?php } ?>
					
				  </ul>
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
	</header>
	
	<section>
		
		<div class= "container-fluid">
			<div class ="row">
				<div class= "col-md-12">
					<div class="jumbotron text-center">
					<h1>HireME</h1>
					<p>Find your dream job here!</p>
					<!--<p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p> */ -->
					<p><a class="btn btn-primary btn-lg" href="search.php" role="button">Search Job</a></p>
					
					</div>
				</div>
			</div>
		</div>
		
	</section>
	
	
	<!-- LATEST JOB POST -->
	<section>
		<div class = "container">
			<div class = "row">
				<h2 class="text-center"> Latest Jobs Post</h2>
						<?php
							$sql = "SELECT * FROM job_posts Order by Rand() Limit 4";
							$result = $conn -> query($sql);				
								if($result -> num_rows > 0 )
								{
								//ouput data
								while ($row = $result -> fetch_assoc())
								{
						?>
							<div class="col-md-6 fixHeight">
							<h3><?php echo $row['Title']; ?></h3>
							<p><?php echo $row['Description']; ?></p>
							<button><a href="view-job.php?id=<?php echo $row['id_jobpost']; ?>">View</a></button>
						</div>
						<?php	
								}
								}
						?>	
			</div>
		</div>
	</section>
	
	<!-- COMPANY's LIST -->
	<section>
		<div class= "container">
			<div class= "row">
				<h2 class="text-center">List of Company</h2>
					<?php
							$sql = "SELECT * FROM company_profile Order by Rand() Limit 4";
							$result = $conn -> query($sql);				
								if($result -> num_rows > 0 )
								{
								//ouput data
								while ($row = $result -> fetch_assoc())
								{
						?>
							<div class="col-md-6 fixHeight">
							<h3><?php echo $row['Name']; ?></h3>
							<p><?php echo $row['Field']; ?></p>
							<p><?php echo $row['Website']; ?></p>
							<button><a href="view-company.php?id=<?php echo $row['id_company']; ?>">View</a></button>
						</div>
						<?php	
								}
								}
						?>	
					<!-- <div class="col-xs-6 col-md-3">
					<a href="#" class="thumbnail">
					<img src="..." alt="...">
					</a>
					</div>
					
					<div class="col-xs-6 col-md-3">
					<a href="#" class="thumbnail">
					<img src="..." alt="...">
					</a>
					</div>
					
					<div class="col-xs-6 col-md-3">
					<a href="#" class="thumbnail">
					<img src="..." alt="...">
					</a>
					</div>
					
					<div class="col-xs-6 col-md-3">
					<a href="#" class="thumbnail">
					<img src="..." alt="...">
					</a>
					</div> -->

			</div>
		</div>
	</section>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	<script type ="text/javascript">
	$(function()
	{
	var maxHeight = 0;
	
	$(".fixHeight").each(function(){
		maxHeight = ($(this).height() > maxHeight ? $(this).height() : maxHeight);
	});
		$(".fixHeight").height(maxHeight);
	
	});
  
  </body>
</html>







