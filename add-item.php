<?php session_start(); ?>
<?php 
	require 'connection.php';
	//error_reporting(E_ALL);
	//echo "i am here";
	$msg ;
	if ($_SERVER["REQUEST_METHOD"] == "POST"){
	
		//if(isset($_POST['add_menu_item']) && isset($_POST['item_name']) && isset($_POST['image'])&& isset($_POST['item_desc']) && isset($_POST['item_type'])&& isset($_POST['item_price'])){
       
            //echo $_SESSION['email_api'];
         //   echo "i am here";
			$user_email=$_SESSION['email_api'];
         //echo $user_email;
			 $sql = "SELECT id from restaurants where res_email='".$user_email."'";
	         $result=$conn->query($sql);
	         $final;
	         while($row = mysqli_fetch_array($result))
     			{
       			 $final=($row['id']);
   				  } 

   				  //echo  mysqli_error($conn);
					//print_r($result);
   				  //echo $final;
   				 // the path to store the image
   				  $target="C:/xampp/htdocs/SpiceShuttle/images/".basename($_FILES['image']['name']);
   				 // echo $target;
   				  //get all the submitted data from form
   				  $image=$_FILES['image']['name'];
   				  $name=$_POST['item_name'];
   				  $desc=$_POST['item_desc'];
   				  $type=$_POST['item_type'];
   				  $price=$_POST['item_price'];
   				  $sql="insert into menu_items (res_id, item_name, item_imagepath, item_price,item_type,item_desc) values ('$final', '$name', '$image', '$price', '$type','$desc')";

   				  $result2=$conn->query($sql);
   				 //echo mysqli_error($conn);
   				// print_r($result2);

   				if(move_uploaded_file($_FILES['image']['tmp_name'],$target))
   				  {
   				  	//$msg='Image uploaded successfully';
   				  	echo "Image uploaded successfully";
   				  	header( "refresh:2; url=../welcome-restaurantapi.php");
   				  }
   				  else
   				  {
   				  	//$msg='There was a problem uploading image';
   				  	echo "there was a problem uploading the image";
   				  	header( "refresh:2; url=welcome-restaurantapi.php");
   				  }
	       //}
	}
?>