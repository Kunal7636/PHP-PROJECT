<?php session_start(); ?>
<?php
if(isset($_POST['res_logout']))
{
	session_destroy();
	header("Location:../index.php");
}
if(isset($_POST['cust_logout']))
{
	session_destroy();
	header("Location:../index.php");
}
?>