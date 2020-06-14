
<?php session_start(); ?>

<?php 
	require 'connection.php';
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['user_submit']) && isset($_POST['first_name']) && isset($_POST['last_name']) && isset($_POST['email']) && isset($_POST['preference']) && isset($_POST['contact_number']) && isset($_POST['password'])){

	        $first_name = $_POST['first_name'];
	        $last_name = $_POST['last_name'];
	        $email = $_POST['email'];
	        $preference = $_POST['preference'];
	        $contact_number = $_POST['contact_number'];
	        $password = $_POST['password'];
	        $address =$_POST['address'];
	        $hashpassword = md5($password);
	        $validation_code = rand (1000, 100000);
			$_SESSION['global_user_email']=$email;
			$_SESSION['global_user_validation_code']=$validation_code;

			$flag=0;
			if (!preg_match("/^[0-9]+$/",$contact_number)) {
				$flag=1;
			  echo "error occured:Please enter valid contact number<br>";
			  header( "refresh:2; url=../user-signup.php" );
			} 
			if (!preg_match("/^[a-zA-Z ]*$/",$first_name)) {
				$flag=1;
				echo "error occured:Please enter valid name<br>";
				header( "refresh:2; url=../user-signup.php" );
			  }

			  if (!preg_match("/^[a-zA-Z ]*$/",$last_name)) {
				$flag=1;
				echo "error occured:Please enter valid name<br>";
				header( "refresh:2; url=../user-signup.php" );
			  }

			  $sql="select * from customers where first_name='$first_name' or last_name='$last_name'  or email='$email' or contact_number='$contact_number'";
			  $result=$conn->query($sql);
			  $count = mysqli_num_rows($result);
			  if($count==0) {
			  if($flag!=1){	
	        $sql="insert into customers (first_name, last_name, email, preference, contact_number, password,validation,address) values ('$first_name', '$last_name', '$email', '$preference', '$contact_number', '$hashpassword','$validation_code','$address')";
	        $result=$conn->query($sql);

	        if($result){
	        	//echo "data inserted successfully";
	        			$receiver_email =$email;
						$subject = "Email for your Account Verification";
						$body = "Hi,Please Enter the validation code $validation_code to begin";
						$headers = "From: SpiceShuttle@gmail.com";
					if (mail($receiver_email, $subject, $body, $headers)) {
							echo "Verification code has been sent to your email successfully";
							echo "Please enter your OTP in the check box given below";
								$flag1=1;
							}                            
						else {
								echo "Sorry error occured.Account verification not successful";
								$sql = "delete from restaurants where email='$email'";
								$result=mysqli_query($conn,$sql);
								if($result)
								header( "refresh:2; url=../user-signup.php" );
							}

	        	//header( "refresh:2; url=../user-login.php" );
	        }
	        else
				echo "error occured.";
				}
				}
				else{
					echo "error occured:Customer with the entered credentials already exists.Please enter unique credentials";
				header( "refresh:2; url=../user-signup.php" );
				}
    	}
	}
?>
<?php
if($flag1==1)
{?>
<html><head>
<title>SpiceShuttle</title>
</head>
<body>
   <form action="temp2.php" method="post">    
	<label>PLEASE ENTER VALIDATION CODE: <label>
	<input type="number" name="verificationcode">
    <input type="submit" name='verify' value="CHECK">
</form>
</body></html>
<?php }?>