<?php session_start(); ?>
<?php
	require 'connection.php';?>
	
<!DOCTYPE html> <html><head>
	<title>SpiceShuttle</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<style type="text/css">
		div.col-sm-4{
			margin-bottom: 20px; 
		}
		div.card-body p{
			font-size: 13px;
			margin-top: -10px;
		}
		div.res-info{
			margin-bottom: 8px;
		}
		#item_quantity{
			width: 30px;
			float: right;
		}
		.cart-form span{
			margin: 2px 3px; 
		}
	</style></head><body>

<div class="jumbotron">
	<nav class="navbar navbar-inverse navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	      <a class="navbar-brand" href="welcome-user.php"><button class="btn btn-danger navbar-btn">SpiceShuttle</button> </a>

		  <a class="navbar-brand"><?php
		  $cust_iid;

		  $cust_id=$_SESSION['email_api'];

		  $sql="select first_name,last_name from customers where email='$cust_id'";
		  $result=mysqli_query($conn,$sql);
		  while($row=$result->fetch_assoc())
		  {
			echo "Welcome ".ucwords($row['first_name']) ." ". ucwords($row['last_name'])."<br>";
		  }
		  $sql2="select id from customers where email='$cust_id'";
		  $result2=mysqli_query($conn,$sql2);
		  while($row3=$result2->fetch_assoc())
		  {
			
			$cust_iid=$row3['id'];
		  }

		  $_SESSION['customer_id'] = $cust_iid;
		 ?> 
		  </a>
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
	    		    <a href="welcome-userapi.php" class="active">Dashboard</a>
	          	</li>
		        <li>
		            <a href="user-cart.php" >Cart Items</a>
		        </li>
		        <li>
		            <a href="myorders.php">Placed Orders</a>
		        </li>
	        </ul></div>
	    	
	    <?php 
	    	require 'files/connection.php';
	    	$sql = "select menu_items.*, restaurants.res_name from menu_items, restaurants where menu_items.res_id=restaurants.id";
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);
	    ?>

	    <div class="content"><br>
			<?php 
				if($count>0){
	    		while($row = $result->fetch_assoc()){ ?>
	    			<div>
					<br>
            		    <div class="card" style="width:24rem; background-color: white">
						  <!-- printing the photo--><img class="card-img-top" src="images/<?php echo $row['item_imagepath']; ?>" alt="Card image" style="width:100%; height: 160px;">
						 
						    <div class="card-body">
						        <h4 class="card-title"><?php echo ucwords($row['item_name']); ?></h4>
						        <p class="card-text pull-right"><?php echo ucfirst($row['item_type']); ?></p>
						        <p class="card-text"><?php echo ucfirst($row['item_desc']); ?></p>
						        <div class="card-text res-info">Restaurant Name - <?php echo ucwords($row['res_name']) ?></div>
						        
						        <div>
						        	
						        <form  action="cust_review.php" method="post">
						        	<input type="text" name="rev" id="rev">
						        	<input type="hidden"  name ="item" id="item" value="<?php echo $row['item_id']; ?>">
						        	
						        	<input type="submit" name="revi" class="btn btn-success" value="Add review">
						        </form>
						    </div>
						    
						    <?php 
						    $items=$row['item_id'];
						     $sql = "select first_name,last_name,review from reviews where item_id='".$items."'";
								$result2 = mysqli_query($conn,$sql);
								$count2 = mysqli_num_rows($result);

								if($count2>0){
	    								while($row2 = $result2->fetch_assoc()){
                                         echo "<br>";
                                           echo '<div>';
						        		  echo '<p style:"color=blue">'.ucwords($row2['first_name'])." ".ucwords($row2['last_name']).'</p>';
						        		  echo '<p>'.ucfirst($row2['review']).'</p>';
						        		  echo '</div>';
						        	}
						        }?>
						    
						        
						        <form class="cart-form" action="add-cart.php" method="post">
						        	<input type="hidden" name="item_id" value="<?php echo $row['item_id']; ?>">
						        	<input type="hidden" name="res_id" value="<?php echo $row['res_id']; ?>">
						        	<input type="hidden" name="item_name" value="<?php echo $row['item_name']; ?>">
						        	<input type="hidden" name="item_price" value="<?php echo $row['item_price']; ?>">
						        	<input type="text"  id= "item_quantity" name="item_quantity" maxlength="1" value="1" required />
						        	<span class="pull-right"> x </span>
						        	<button name="add_item"  class="btn btn-sm btn-info pull-right">Add</button>
						        </form>	


								
						        <div class="card-text" style="margin-top: 10px;"><?php echo 'Cost = '.$row['item_price']; ?>
						        	
						        </div>

						    </div>
						</div>
        			</div>

	    	<?php } ?>
			<?php } ?>
		</div>			    
	</div>

</body></html>
