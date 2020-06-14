<?php session_start(); ?>
<?php 
	require 'connection.php';
	error_reporting(E_ALL);
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['restt_email']) && isset($_POST['restt_password'])){

	        $res_email = $_POST['restt_email'];
	        $res_password = $_POST['restt_password'];
	        $reshashpassword = md5($res_password);


	        $sql="select * from restaurants where res_email='$res_email' and res_password='$reshashpassword'";
	        $result=$conn->query($sql);
	        $row = $result->fetch_assoc();
	        $count = mysqli_num_rows($result);
	        if($count == 1) {
				$id = $row['id'];
	        	$_SESSION['restt_id'] = $id;
	        	$_SESSION['email_api'] = $res_email;
		        echo "You successfully logged in!! You are being redirected..";
		        header( "refresh:2; url=../welcome-restaurant.php" );
		    }else {
				$error = "Your Login Name or Password is invalid.Please log-in again";
				echo $error;
				header( "refresh:2; url=../restaurant-login.php" );

		    }
		    //echo $res_email;
    	}
	}
?>