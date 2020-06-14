<?php
include "connection.php";
    $id=$_GET['id'];
	header('location:user-cart.php');
	$sql = "delete from user_cart where id='$id'";
	$result1  = $conn->query($sql);
?>