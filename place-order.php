<?php 
	require 'files/connection.php';
	session_start();
		
?>
<!DOCTYPE html> 
<html>
<head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		
	</style>
</head>
<body>
<div class="jumbotron">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="welcome-user.php"><button class="btn btn-danger navbar-btn">SpiceShuttle</button> </a>
	    </div>
	    <div class="nav navbar-nav navbar-right">
		<form method="post" action="files/logout.php"> 
		<input name="cust_logout" type="submit" class="btn btn-danger" value="Logout">
		</form>
		</div></div>
		</nav></div>
	
	<div class="container wrapper">
	    <div class="sidebar">
	        <ul class="list-unstyled components">
	 	        <li>
	    		    <a href="welcome-userapi.php">Dashborad</a>
	          	</li>
		        <li>
		            <a href="user-cart.php" class="active">Cart Items</a>
		        </li>
	        </ul>         
	    </div>

	   	<div class="content col-md-8 col-md-offset-2"><br>
	   		<p class="caption">Please Provide with the required delivery and payment options.</p>
	        <form action="order-save.php" method="post" enctype="multipart/form-data">
	        	<input type="hidden" name="total_price" value="<?php echo $_POST['cart_price']; ?>">
	        	<input type="hidden" name="res_id" value="<?php echo $_POST['res_id']; ?>">
	        	<div class="form-group">
					<label for="sel1">Preffered Payment Type<b>*</b></label>
					<select class="form-control" name="payment_type" id="sel1">
					    <option>Cash on Delivery</option>
					</select>
				</div>
				<div class="form-group">
				    <label for="item_desc">Address Of The Delivery<b>*</b></label>
				    <input type="text" class="form-control" id="address" name="address" required/>
				</div>
				<div class="form-group">
				    <label for="item_price">Contact Number<b>*</b></label>
				    <input type="text" class="form-control" id="mobile_number" name="mobile_number" required/>
				</div>
				<div class="form-group">
				    <button name="orderBtn" class="btn btn-success pull-right">SUBMIT <i class="fas fa-arrow-right"></i></button>
				</div>
			</form>
	    </div>
	    		    
	</div>


</body>
</html>
<?php  ?>