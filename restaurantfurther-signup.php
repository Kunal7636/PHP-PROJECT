<!DOCTYPE html><html><head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		b{
			color: red;
		}
	</style>
</head><body>

<div class="jumbotron">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="index.php"><button class="btn btn-danger navbar-btn">SpiceShuttle -For Associates</button> </a>
	    </div>
	    <div class="nav navbar-nav navbar-right">
	      	<a href="button.php"><button class="btn btn-danger navbar-btn"> Ally With Us</button></a>&nbsp
	        <a href="restaurant-login.php"><button class="btn btn-danger navbar-btn">Sign In &nbsp<span class="glyphicon glyphicon-log-in"></span> </button></a>
		</div></div>
		</nav>
		</div>

	<div class="container col-md-6 col-md-offset-3">
		<form action="check.php" method="post">
		  <div class="form-group">
		    <label>Restaurant Name<b>*</b></label>
		    <input type="text" class="form-control" id="res_name" name="res_name" required />
		  </div>	
		  
		  <div class="form-group">
		    <label>Restaurant Number<b>*</b></label>
		    <input type="text" class="form-control" id="res_number" name="res_number" required />
		  </div>
		  <div class="form-group">
		    <label>Restaurant City<b>*</b></label>
		    <input type="text" class="form-control" id="res_city" name="res_city" required />
		  </div>
	
		  <input type="submit" name="resfurther_submit" class="btn btn-success" value="Sign Up">
		
		</form>
	</div>	
	
</body></html>
 