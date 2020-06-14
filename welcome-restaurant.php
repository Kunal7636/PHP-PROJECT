<?php session_start(); ?>
<?php 
	require 'files/connection.php';
	//error_reporting(E_ALL);
	//if(strlen($_SESSION['restt_id'])==0)
	//{
	//	echo "error occured<br>";
	//	header('refresh:2;url:restaurant-login.php');
	//}
	//else {
?>
<!DOCTYPE html><html><head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
</head><body>

<div class="jumbotron">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="welcome-restaurant.php"><button class="btn btn-danger navbar-btn">SpiceShuttle -for associates</button> </a>
	    </div>
	    <div class="nav navbar-nav navbar-right">
		<form method="post" action="files/logout.php"> 
		<input name="res_logout" type="submit" class="btn btn-danger" value="Logout">
		</form>
		</div></div>
		</nav></div>

	<div class="container wrapper">
	    <div class="sidebar">
	        <ul class="list-unstyled components">
	 	        <li>
	    		    <a href="welcome-restaurant.php" class="active">Add Menu items</a>
	          	</li>
		        <li>
		            <a href="view-orders.php">View Placed Orders</a>
		        </li>
	        </ul>         
	    </div>

	    <div class="content col-md-8 col-md-offset-2"><br>
	        <form action="files/add-item.php" method="post" enctype="multipart/form-data">
	        	<div class="form-group">
				    <label>Menu Item Name<b>*</b></label>
				    <input type="text" class="form-control" id="item_name" name="item_name" required/>
				</div>
				<div class="form-group">
					<label>Menu Item Image<b>*</b></label>
					<input type="file" name="image" required />
					<span class="text-muted" style="font-size: 14px;">JPG, GIF or PNG.</span>
					<span class="text-muted" style="font-size: 14px;"> Max size of 800K</span>
				</div>
				<div class="form-group">
				    <label>Item Description<b>*</b></label>
				    <input type="text" class="form-control" id="item_desc" name="item_desc" required/>
				</div>
				<div class="form-group">
				    <label>Item Type<b>*</b>&nbsp;</label>
				    <input type="radio" name="item_type" value="non-veg" required> Non-Veg &nbsp;
		  			<input type="radio" name="item_type" value="veg" required> Veg
				</div>
				<div class="form-group">
				    <label>Item Price<b>*</b></label>
				    <input type="text" class="form-control" id="item_price" name="item_price" required/>
				</div>
				<div class="form-group">
				    <input type="submit" name="add_menu_item" class="btn btn-success" value="Add Item">
				</div>
			</form>
	    </div>
	</div>

	
</body>
</html>
<?php //} ?>