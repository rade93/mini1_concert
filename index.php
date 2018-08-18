<?php include('server.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Register Student</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/moj.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript" src="bootstrap.js"></script>
	
</head>
<body>
	<div class="intro">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
		  Are you Admin
		</button>
		<a href="visitor.php"><button type="button" class="btn btn-primary">
		  Are you Visitor
		</button></a>
	</div>
	<div>

	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	        <div class="loginbox">
				<img src="concert.jpg" class="avatar">
				<h1>LOGIN HERE</h1>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<?php include('errors.php'); ?>
				<form method="post" action="index.php">
					
					<div class="form-group">
						<label>Username</label>
						<input class="form-control" type="text" name="adminname" id="username" placeholder="Enter Username">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input class="form-control" type="password" name="adminpassword" placeholder="Enter Password">
					</div>
					<input class="button btn btn-primary" type="submit" name="login" value="Login"><br>
					<a href="#">Lost your password?</a><br>
				</form>
			</div>
	  </div>
	</div>
	</div>
	<script src="js/jquery.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>