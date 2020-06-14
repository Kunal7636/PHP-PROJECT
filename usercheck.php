<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	
	<?php session_start(); ?>
<?php
	require 'connection.php';
	//echo "connection made";
	
	if ($_SERVER["REQUEST_METHOD"] == "POST"){

		if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['userfurther_submit']) && isset($_POST['preference'])  && isset($_POST['contact_number']) && isset($_POST['address']) )
			

	        $preference = $_POST['preference'];
	        $contact_number = $_POST['contact_number'];
	         $address = $_POST['address'];
	         $user_email=$_SESSION['email_api'];
           // echo "hi in";
	        
			$flag=0;
			/*if (!preg_match("/^[a-zA-Z ]*$/",$res_city)) {
				$flag=1;
				echo "error occured:Please enter valid  city<br>";
				header( "refresh:1; url=../restaurantfurther-signup.php" );
			  }

			  if (!preg_match("/^[0-9]+$/",$res_number)) {
				  $flag=1;
				echo "error occured:Please enter valid restaurant number<br>";
				header( "refresh:2; url=../restaurantfurther-signup.php" );
			  } 
			*/  
			  $flag1=0;
			  $sql="select * from customers where contact_number='$contact_number'";
			  $result=$conn->query($sql);
			  $count = mysqli_num_rows($result);
			  echo  mysqli_error($conn);
				//echo "<br>";
				//print_r($result);
                //echo "<br>";

               // echo $count;
            
        
			  if($count==0) {
				
				$sql="Update customers set preference='".$preference."'"."where email='".$user_email."'";
					$result=$conn->query($sql);
				  ///  echo  mysqli_error($conn);
              		//print_r($result);
              		$sql="Update customers set contact_number='".$contact_number."'"."where email='".$user_email."'";
					$result=$conn->query($sql);

					$sql="Update customers set address='".$address."'"."where email='".$user_email."'";
					$result=$conn->query($sql);

					if($result){
		    	     	         //echo "Please press the button and sign-in ";
		    	     	        // echo '<h3><a href="logoutuserSiginin.php">Sign-in</h3></div>';
						         header( "refresh:0; url=logoutuserSiginin.php" ); 
								}                            
						else {
								echo "Sorry your name or number already exists";
								header( "refresh:2; url=userfurther-signup.php" );
							}
						}
					}
				
				if($count==1){
					echo "error occured: Restaurant with the entered credentials already exists.Please enter unique credentials";
					echo "<br>";
					//echo "Please click the button to enter again";
					echo "<br>";
					header( "refresh:3; url=userfurther-signup.php");
				}
			}
		?>
</body>
</html>