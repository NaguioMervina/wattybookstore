<?php
	$conn = new mysqli("localhost","root","","bookstore");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>
