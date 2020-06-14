<?php

//index.php

//Include Configuration File
include('config2.php');

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

 $login_button = '<a href="'.$google_client->createAuthUrl().'"style="text-decoration: none;"><p style="color: #000000;">Signup With Google</p></a>';
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
 <body style="background-image: url(signin2.jpg);background-size: cover;">
 <nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index.php"><button class="btn btn-danger navbar-btn">SpiceShuttle</button> </a>
      </div>
      <div class="nav navbar-nav navbar-right">
          
     
    </div></div>
    </nav>
    <div>
  <center><h1><p style="color:#FFFFFF; margin-top: 100px">CHOOSE AN OPTION TO SIGN UP</p><h1></br><center>
   <?php
   require 'connection.php';
  //echo "<h1>CHOOSE AN OPTION TO SIGN UP<h1></br>";
   if($login_button == '')
   {
    /*echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
    echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
    echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
    echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';*/
     $_SESSION['email_api']=$_SESSION['user_email_address'];
     $user_email=$_SESSION['user_email_address'];
     $user_first=$_SESSION['user_first_name'];
     $user_last=$_SESSION['user_last_name'];
      $sql="select * from customers where email='$user_email' ";
			  $result=$conn->query($sql);
			  $count = mysqli_num_rows($result);
	//$sql="insert into restaurants (res_email) values ('$res_email')";
     //$result=$conn->query($sql);
     if($count==0)
     {
     	$sql="insert into customers (first_name,last_name,email) values ('$user_first','$user_last','$user_email')";
        $result=$conn->query($sql);
        if($result)
        header( "refresh:0; url=userfurther-signup.php");
        else
        {
        	echo "There is internet distruption  TRY AGAIN!";
            header( "refresh:2; url=logoutuser.php");
        }
     }
     else
     {
         echo '<script>alert("Email already exists")</script>';
         header( "refresh:0; url=logoutuser.php");
     }


    //echo '<h3><a href="logout.php">Logout</h3></div>';
     echo '<div align="center">'.$login_button . '</div>';

   }
   else
   {
    //echo '<div align="center">'.$login_button . '</div>';
    
   }
  // echo '<div align="center"><button type="button">'.$login_button . '</button></div>';echo "<br>";
   //echo  '<h3><a href="user-signup.php"><button type="button">Signup Form</button></h3></div>'

    echo '<div align="center"><button type="button" "height:50px width:50px style="background-color: #f5f2d0;margin-top:110px">'.$login_button . '</button></div>';
   echo  '&nbsp <h3><a href="user-signup.php"><button type="button" "height:50px width:50px style="background-color: #f5f2d0;"><p style="color: #000000;">Signup      Form</p></button></h3></div>';
   // green color 00FF00
   ?>
  </div>
  
 </body>
</html>