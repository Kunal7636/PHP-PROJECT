<?php session_start(); ?>
<?php 
	require 'connection.php';
 //echo $_SESSION['item_id'];

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
     if(isset($_POST['revi']) && isset($_POST['rev']) && isset($_POST['item']))
     {
	
		    $first_name;
          $last_name;

         $item=$_POST['item'];
         $rev=$_POST['rev'];
      
         $email =$_SESSION['email_api'];
         $sql="select first_name,last_name from customers where email='$email'";
        $result=mysqli_query($conn,$sql);
      
        while($row=$result->fetch_assoc())
        {
         $first_name=$row['first_name'];
         $last_name=$row['last_name'];
        }
         
         $sql="insert into reviews (first_name, last_name, email, item_id,review) values ('$first_name', '$last_name', '$email', '$item', '$rev')";
         $result2=$conn->query($sql);
         if($result2){
            header( "refresh:0; url=welcome-userapi.php");
         } 
         }
      }
	        
?>