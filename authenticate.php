<?php session_start(); ?>
<?php
	require 'connection.php';
	error_reporting(E_ALL);
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['user_signin']) && isset($_POST['email']) && isset($_POST['password'])){

	        $email = $_POST['email'];
	        $password = $_POST['password'];
	        $hashpassword = md5($password);
	        $_SESSION['email_api']=$email;
             
	        $sql="select * from customers where email='$email' and password='$hashpassword'";
	        $result=$conn->query($sql);
	        $row = $result->fetch_assoc();
	        $count = mysqli_num_rows($result);
	        if($count == 1) {
				$id = $row['id'];
	        	$_SESSION['custid'] = $id;
		        echo "You successfully logged in!! You are being redirected..";
		        
		        header( "refresh:2; url=../welcome-userapi.php" );
			}
			else {
				$error = "Your Login Name or Password is invalid.Please log-in again";
				echo $error;
				header( "refresh:2; url=../user-login.php" );
		    }
    	}
	}
?>