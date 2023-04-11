<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con, 'motomaticdb');

if($_SERVER["REQUEST_METHOD"]=="POST")
{
		$name = $_POST['username'];
		$pass = $_POST['password'];
		
		
		$sql = " select * from usertable where username = '".$name."' && password = '".$pass."'";
		
		$result = mysqli_query($con, $sql);

	$num = mysqli_fetch_array($result);

	if($num["usertype"]=="user")
	{
		$user_id=$num["user_id"];
		$_SESSION['user_id']=$user_id;
		header('location:AvailPro.php');
	}elseif($num["usertype"]=="admin")
	{
		$_SESSION['is_admin'] = true;
		header('location:admin/OVERVIEW.php');
	}
	
	else
	{
		header('location:incorection.php');
	}
		
}
?>
