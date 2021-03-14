<?php
	include_once("../admin/core/config.php");
	$fname=$_POST['fname'];
	$email_id=$_POST['email_id'];
	$phone_number=$_POST['phone_number'];
	$message=$_POST['message'];
	$sql="INSERT INTO `reviews` (`name`, `phone_number`, `email`, `message`) VALUES ('$fname','$phone_number', '$email_id', '$message')";
	if ($link->query($sql) === TRUE) {
    	echo "1";
	}
?>