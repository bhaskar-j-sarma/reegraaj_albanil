<?php
	include_once("../admin/core/config.php");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$sql="INSERT INTO `reviews` (`name`, `phone_number`, `email`) VALUES ('$name','$phone', '$email')";
	if ($link->query($sql) === TRUE) {
    	echo "1";
	}
?>