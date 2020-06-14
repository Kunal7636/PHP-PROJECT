<?php 
	require 'connection.php';
	session_start();
	
		
		if ($_SERVER["REQUEST_METHOD"] == "POST"){
			if(isset($_POST['orderBtn']) && isset($_POST['payment_type']) &&isset($_POST['total_price']) && isset($_POST['address']) && isset($_POST['mobile_number']) && isset($_POST['res_id'])){
		        $user_id = $_SESSION['customer_id'];
		        $payment_type = $_POST['payment_type'];
		        $address = $_POST['address'];
		        $mobile_number = $_POST['mobile_number'];
		        $date = date('Y/m/d H:i:s');
		        $total_price = $_POST['total_price'];
		        $res_id = $_POST['res_id'];
		        $order_code;
		       // $count=1;
//ADD THIS CODE AS IT IS 
		                    $item_name=$_SESSION['itemm_name'];
		                    //echo $item_name;
			        		$item_quantity=$_SESSION['itemm_quantity'];
			        		$item_price=$_SESSION['itemm_price'];
		       // while($count!=0)
		        //{	
		        	$order_code = rand (100000, 100000000);
		       		// $sql1="select * from orders where user_code='$order_code'";
			  		//$result1=$conn->query($sql1);
			  		//$count = mysqli_num_rows($result1);
			  	//}
		        
		        $sql="insert into orders (user_id, res_id, payment_type, address, mobile, date, total,order_code) values ('$user_id', '$res_id', '$payment_type', '$address', '$mobile_number', '$date', '$total_price','$order_code')";
		        $result=$conn->query($sql);
		        if($result){
		        	   $iid;
		        		 $sql1 = "select id from orders where order_code ='".$order_code."'";
		        		 $result2 = mysqli_query($conn,$sql1);
		        		 while($row2 = $result2->fetch_assoc()){
		        		 		$iid=$row2['id'];
		        		 }
			        		$receiver_email =$_SESSION['email_api'];
			        		
						$subject = "Thanks For Choosing SpiceShuttle";
						$body = "You order id is : $iid\n Item Name   Quantity  Price\n $item_name              $item_quantity           $item_price\n Total price : $total_price \n Food will be dilived at : $address ";

						$headers = "From: SpiceShuttle@gmail.com";
					if (mail($receiver_email, $subject, $body, $headers)) {
							echo "Bill has been sent to your email successfully";
							//echo "$item_name";
							header('location:welcome-userapi.php');
							}                            
						else {
								echo "Sorry error occured.Bill was not sent to your email ";

							}
		       // header('location:welcome-userapi.php');
		    }//TILL HERE
	    	}
		}
	
?>
