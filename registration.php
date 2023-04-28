<?php
session_start(); 

// Connect to the database
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'bookstore');

// Get the user data from the form
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$username = $_POST['username'];
$email = $_POST['email'];
$pass = $_POST['password'];

// Check if the username already exists
$s = "SELECT * FROM users WHERE username = ?";
$stmt = mysqli_prepare($con, $s);
mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$num = mysqli_num_rows($result);

if($num == 1){ 
    // Username already taken, show an error message
    $message = " Username Already Taken "; 
    echo "<script type='text/javascript'>alert('$message');window.location='register.php'</script>";
}else{ 
    // Generate a random user ID
    $randomer= mt_rand(); 
    
    // Insert the user data into the database
    $reg = "INSERT INTO users (user_id, fname, lname, username, email, password, usertype) VALUES (?, ?, ?, ?, ?, ?, 'user')";
    $stmt = mysqli_prepare($con, $reg);
    mysqli_stmt_bind_param($stmt, "isssss", $randomer, $fname, $lname, $username, $email, $pass);
    mysqli_stmt_execute($stmt);
    
    // Show a success message and redirect to the login page
    $message2 = " Registration Successful "; 
    echo "<script type='text/javascript'>alert('$message2');window.location='Signin_Signup.php'</script>";
} 
?>
