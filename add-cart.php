<?php session_start();
require 'connection.php'; ?>
<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['add_item']) && isset($_POST['item_id']) && isset($_POST['item_quantity']) && isset($_POST['item_name']) && isset($_POST['item_price'])){

		        $item_id = $_POST['item_id'];
		        $sql1="select res_id from menu_items where item_id='$item_id'";
		        $result2=mysqli_query($conn,$sql1);
		        $res_id ;
		        while($row1=$result2->fetch_assoc())
        			{
         					$res_id=$row1['res_id'];
         
        				}
		        $cust_id = $_SESSION['customer_id'];
		        $item_quantity = $_POST['item_quantity'];
		        $_SESSION['itemm_quantity']=$item_quantity;
		        $item_name = $_POST['item_name'];//changed for data
		        $_SESSION['itemm_name']=$item_name;//name of item changed using
		        $item_price = $_POST['item_price'];
		        $_SESSION['itemm_price']=$item_price;//editted
		        $total_price = $item_price*$item_quantity;
		        $flag=0;
		        if($result2){
		        $sql="insert into user_cart (id, user_id, res_id, item_name, item_quantity, item_price, total_price) values ('$item_id', '$cust_id', '$res_id', '$item_name', '$item_quantity', '$item_price', '$total_price')";
				$result=mysqli_query($conn,$sql);
				if($result)
				{
					echo "item added successfully.<br>";
					//echo $_SESSION['itemm_name'];
					//header("refresh:2;Location:../welcome-user.php");
					header( "refresh:2; url=welcome-userapi.php");
				}
				else{
				echo "Error occured.Please try again later.<br>";
				//echo mysqli_error($conn);
				header( "refresh:2; url=welcome-userapi.php");
			 }
			}
	    	}
		}
	
?>
