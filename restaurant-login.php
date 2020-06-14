<!DOCTYPE html>
<html>
<head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
<div class="jumbotron">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php"><button class="btn btn-danger navbar-btn">SpiceShuttle</button> </a>
	    </div>
	    <div class="nav navbar-nav navbar-right">
	      	<a href="ally.php"><button class="btn btn-danger navbar-btn"> Ally With Us</button></a>&nbsp
	        
		</div></div>
		</nav>
		</div>

	<div class="container col-md-6 col-md-offset-3">
		<form action="files/res-authenticaterestaurant.php" method="post">	
		  <div class="form-group">
		    <label>Email<b>*</b></label>
		    <input type="email" class="form-control" id="restt_email" name="restt_email" required/>
		  </div>
		  <div class="form-group">
		    <label>Password<b>*</b></label>
		    <input type="password" class="form-control" id="restt_password" name="restt_password" required/>
		  </div>
		  <input type="submit" name="res_signin" class="btn btn-success" value="Sign In">
		   <span>Don't have account? <a class="text-danger" href="button.php">Sign up</a></span>
		</form>
	</div>	
</body></html>