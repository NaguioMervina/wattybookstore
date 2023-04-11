<?php 

$con=new mysqli('localhost','root','','motomaticdb');

if(!$con){
	die(mysqli_error($con));
}

?>