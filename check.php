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
		if(isset($_POST['resfurther_submit']) && isset($_POST['res_name'])  && isset($_POST['res_number']) && isset($_POST['res_city']) ){

	        $res_name = $_POST['res_name'];
	        $res_email = $_SESSION['email_api'];
	        $res_number = $_POST['res_number'];
	        $res_city = $_POST['res_city'];
	        
			$flag=0;
			if (!preg_match("/^[a-zA-Z ]*$/",$res_city)) {
				$flag=1;
				echo "error occured:Please enter valid restaurant city<br>";
				header( "refresh:1; url=../restaurantfurther-signup.php" );
			  }

			  if (!preg_match("/^[0-9]+$/",$res_number)) {
				  $flag=1;
				echo "error occured:Please enter valid restaurant number<br>";
				header( "refresh:2; url=../restaurantfurther-signup.php" );
			  } 
			  
			  $flag1=0;
			  $sql="select * from restaurants where res_name='$res_name' or res_number='$res_number'";
			  $result=$conn->query($sql);
			  $count = mysqli_num_rows($result);
			  //echo  mysqli_error($conn);
				//echo "<br>";
				//print_r($result);
                //echo "<br>";

                //echo $count;
			  if($count==0) {
				
				$sql="Update restaurants set res_name='".$res_name."'"."where res_email='".$res_email."'";
					$result=$conn->query($sql);
				  ///  echo  mysqli_error($conn);
              		//print_r($result);
              		$sql="Update restaurants set res_number='".$res_number."'"."where res_email='".$res_email."'";
					$result=$conn->query($sql);

					$sql="Update restaurants set res_city='".$res_city."'"."where res_email='".$res_email."'";
					$result=$conn->query($sql);

					if($result){
		    	     	         //echo "Sign-up Complete redirected to Signin page ";
		    	     	        // echo '<h3><a href="logoutSiginin.php">Sign-in</h3></div>';
		    	     	         header( "refresh:0; url=welcome-restaurantapi.php" );
								}                            
						else {
								echo "Sorry your name or number already exists";
								header( "refresh:2; url=restaurantfurther-signup.php" );
							}
						}
					}
				
				if($count==1){
					echo "error occured: Restaurant with the entered credentials already exists.Please enter unique credentials";
					echo "<br>";
					//echo "Please click the button to enter again";
					echo "<br>";
					header( "refresh:3; url=restaurantfurther-signup.php");
				}
			}
		
?>
</body>
</html>