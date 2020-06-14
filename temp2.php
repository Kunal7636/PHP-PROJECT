<?php session_start(); ?>
<?php
    require 'connection.php';
    $email=$_SESSION['global_user_email'];
    $sql = "SELECT validation from customers where email='".$email."'";
     //$sql = "SELECT res_validation from restaurant where res_email='$email'";
//echo $sql;
//echo $email;
    $result = mysqli_query($conn, $sql);
//echo  mysqli_error($conn);
//print_r($result);
   while($row = mysqli_fetch_array($result))
     {
        $final=($row['validation']);
     } 
//echo $final;
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['verify']) && isset($_POST['verificationcode'])){
        $code = $_POST['verificationcode'];
         //echo $code;
       if($final==$code)
        {
          echo "YOU ARE VERIFIED";
          header( "refresh:2; url=../user-login.php");
        }
        else
        {
          echo "You entered Wrong OTP\n";
          echo "<br>";
           $sql2 = "delete from customers where email='".$email."'";          
           $result2= mysqli_query($conn,$sql2);
           //print_r($result2);

           if(! $result2)
           {
            //die();
           }
           else
           {
            header( "refresh:2; url=../user-signup.php");
             echo "Please login again";
             
           }
           //header( "refersh:2;url=../restaurant-signup.php" );
        }
    }
  }

?>