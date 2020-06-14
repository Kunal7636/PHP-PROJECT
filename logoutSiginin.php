<?php

//logout.php

include('config.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();
echo "you are going to login page";
//redirect page to index.php
header( "refresh:2; url=restaurant-login.php");
?>