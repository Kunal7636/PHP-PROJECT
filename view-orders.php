<?php session_start(); ?>
<?php 
	require 'connection.php';
	
	
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

	    <?php 
	    	require 'connection.php';
	    	$email=$_SESSION['email_api'];
	    	$restid;
			$sql2="select id from restaurants where res_email='$email'";
		  	$result2=mysqli_query($conn,$sql2);
		  	while($row3=$result2->fetch_assoc())
		  	{
			
				$restid=$row3['id'];
			  }

		  //	$_SESSION['res_id'] = $cust_iid;



	    	//$restid = $_SESSION['rest_id'];
	    	$sql = "select * from orders where res_id = '$restid'";
	    	$result = mysqli_query($conn,$sql);
	    ?>

	    <div class="content"><br>
			<?php 
				if(mysqli_num_rows($result)>0){
	        	while ($row = $result->fetch_assoc()) { ?>
	        		<div class="card">
						    <div class="card-body">
						    	<div class="card-text" style="margin-top: 10px;">Address of customer - <?php echo ucwords($row['address']); ?></div>
						    	<div class="card-text">Status of delivery - <?php echo $row['status']; ?></div>
						        <div class="card-text">Contact number - <?php echo $row['mobile']; ?></div>
						        <div class="card-text">Order Placed On- <?php echo $row['date']; ?></div>
								<div class="card-text">Payment Type - <?php echo $row['payment_type']; ?></div>
						    </div>
						</div><hr>
	        <?php } ?>
			<?php }
			else
			{
				echo "No pending orders are there.<br>";
				echo "Thank you for serving our customers<br>";
			}
			?>
	    </div>
	</div>

</body></html>
<?php  ?>