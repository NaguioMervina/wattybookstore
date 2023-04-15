<?php 

$con=new mysqli('localhost','root','','bookstore');

if(!$con){
	die(mysqli_error($con));
}

?>