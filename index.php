<!DOCTYPE html>
<html>
<head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<style type="text/css">
		div.col-sm-3{
			margin-bottom: 20px; 
		}
		div.card-body p{
			font-size: 13px;
			margin-top: -10px;
		}
		div.res-info{
			margin-bottom: 8px;
		}
	</style>
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
			<a href="button2.php"><button class="btn btn-danger navbar-btn"> Sign Up &nbsp<span class="glyphicon glyphicon-user"></span> </button></a>&nbsp
	        <a href="signinbuttonuser.php"><button class="btn btn-danger navbar-btn">Sign In &nbsp<span class="glyphicon glyphicon-log-in"></span> </button></a>
		</div>
		</div>
		</nav>
		</div>

	<div class="container">

	   <?php 
	    	require 'files/connection.php';
			$sql = "select menu_items.*,restaurants.res_name from menu_items, restaurants where menu_items.res_id=restaurants.id";
			//select menu items of the restaurants and display on the front page
			$result = $conn->query($sql);
	    ?>

	    <div class="content"><br>
	    	<?php 
	    		
	    		while($row = $result->fetch_assoc()){ ?>
	    			<div class="col-sm-3">
            		    <div class="card" style="width:24rem;">
				<img class="card-img-top" src="images/<?php echo $row['item_imagepath']; ?>" alt="Card image" style="width:100%; height: 160px;">

							<div class="card-body">
						        <h4 class="card-title"><?php echo ucwords($row['item_name']); ?></h4>
						        <p class="card-text pull-right"><?php echo ucfirst($row['item_type']); ?></p>
						        <p class="card-text"><?php echo ucfirst($row['item_desc']); ?></p>
						        <div class="card-text res-info">Restaurant Name - <?php echo ucwords($row['res_name']) ?></div>
						        <a class="btn btn-sm btn-info pull-right orderBtn">Order</a>
						        <div class="card-text" style="margin-top: 8px;"><?php echo '₹'.$row['item_price']; ?></div>
						    </div>
						</div>
        			</div>
	    	<?php } ?>
		</div>		
	    		    
	</div>

	<script type="text/javascript">
		$('.orderBtn').on('click', function(){
			alert('To order something, first sign in');
		});			//jquerry used on class orderBtn

	</script> 
</body></html>