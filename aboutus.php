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
				  <a class="navbar-brand" href="index.php">HireME</a>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav navbar-right">
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
					<h1>About US!</h1>
					<p>Jocson College Inc.</p>
					<!--<p><a class="btn btn-primary btn-lg" href="register.php" role="button">Register</a></p> */ -->					
					</div>
				</div>
			</div>
		</div>
		
	</section>
	
	<section>
		<div class = "container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2">
					<div class="panel panel-default">
						<div class="list-group-item active">Academic Partners</div>
						<div class="panel-body">
											<?php
							$sql = "SELECT * FROM tblcompany";
							$result = $conn -> query($sql);				
								if($result -> num_rows > 0 )
								{
								//ouput data
								while ($row = $result -> fetch_assoc())
								{
						?>
							<div class="col-md-6 fixHeight">
							<h3><?php echo $row['companyname']; ?></h3>
							<p><?php echo $row['hoc']; ?></p>
							<button class="btn btn-default">View</button></button>
						</div>
						<?php	
								}
								}
						?>	
						</div>
						<div class="list-group-item active">Mission</div>
						<form class="form-horizontal">
							<h3>Mission</h3>   
							<div class="form-group">
							</div>    
						</div>
						<div class="list-group-item active">Vission</div>
						<form class="form-horizontal">
							<h3>Vission</h3>   
							<div class="form-group">
							</div>    
						</div>
					</div>
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







