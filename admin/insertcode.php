<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bookstore');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
    $email = $_POST['email'];
		$phone = $_POST['phone'];
		$address = $_POST['address'];
    $password = $_POST['password'];
		$usertype = $_POST['usertype'];
    

    $query = "INSERT INTO users (`fname`,`lname`,`username`,`email`,`phone`,`address`,`password`,`usertype`) 
										VALUES ('$fname','$lname','$username','$email','$phone','$address','$password','$usertype')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
       $message = " Data Saved ";
		echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/clists.php'</script>";
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>