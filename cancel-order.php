<?php
require "connection.php";
    $id=$_GET['id'];
	header('location:myorders.php');
	$status = "cancelled by user";
	$sql1 = "update orders SET status = '$status' WHERE id = '$id'";
	$result1 = $conn->query($sql1);
?>