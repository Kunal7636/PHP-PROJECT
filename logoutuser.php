<?php

//logout.php

include('config2.php');

//Reset OAuth access token
$google_client->revokeToken();

//Destroy entire session data.
session_destroy();

//redirect page to index.php
//header('url:../button.php');
header( "refresh:0; url=http://localhost/SpiceShuttle/button2.php" );

?>
