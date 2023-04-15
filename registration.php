<?php
session_start();
$con = mysqli_connect('localhost','root','');

mysqli_select_db($con,'bookstore');

$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$pass = $_POST['password'];

$s = "SELECT * FROM usertable WHERE username = ? ";
$stmt = mysqli_prepare($con, $s);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$num = mysqli_num_rows($result);

if($num == 1){
    $message = " Username Already Taken ";
    echo "<script type='text/javascript'>alert('$message');window.location='register.php'</script>";
}else{
    $randomer= mt_rand();
    $reg = "INSERT INTO usertable (id, fname, lname, username, email, phone, address, password, usertype) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'user')";
    $stmt = mysqli_prepare($con, $reg);
    mysqli_stmt_bind_param($stmt, "isssssss", $randomer, $fname, $lname, $username, $email, $phone, $address, $pass);
    mysqli_stmt_execute($stmt);
    $message2 = " Registration Successful ";
    echo "<script type='text/javascript'>alert('$message2');window.location='Signin_Signup.php'</script>";
}
?>
