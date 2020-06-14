<?php

//index.php

//Include Configuration File
include('config.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google_Service_Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $Signup_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>PHP Login using Google Account</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
 
 </head>
 <body>
  <div class="container">
   <br />
   
   <br />
   <div class="panel panel-default">
   <?php
   require 'connection.php';
  echo "<h1>CHOOSE AN OPTION TO SIGN UP<h1></br>";
   if($Signup_button == '')
   {
    /*echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';*/
     $_SESSION['email_api']=$_SESSION['user_email_address'];
     $res_email=$_SESSION['user_email_address'];

      $sql="select * from restaurants where res_email='$res_email' ";
        $result=$conn->query($sql);
        $count = mysqli_num_rows($result);
  //$sql="insert into restaurants (res_email) values ('$res_email')";
     //$result=$conn->query($sql);
     if($count==0)
     {
      $sql="insert into restaurants (res_email) values ('$res_email')";
        $result=$conn->query($sql);
        if($result)
        header( "refresh:0; url=restaurantfurther-signup.php");
        else
        {
          echo "There is internet distruption  TRY AGAIN!";
            header( "refresh:2; url=button.php");
        }
     }
     else
     {
         //echo '<script>alert("Email already exists")</script>';
         //header( "refresh:0; url=logout.php");
      header( "refresh:0; url=res_error.php");
     }


    //echo '<h3><a href="logout.php">Logout</h3></div>';
    // echo '<div align="center">'.$login_button . '</div>';

   }
   //else
   //{
    //echo '<div align="center">'.$login_button . '</div>';
    
   //}
   echo '<div align="center"><button type="button">'.$Signup_button . '</button></div>';echo "<br>";
   echo  '<h3><a href="restaurant-signup.php"><button type="button">Signup Form</button></h3></div>'
   ?>
   </div>
  </div>
  
 </body>
</html>