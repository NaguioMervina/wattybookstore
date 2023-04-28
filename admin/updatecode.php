<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'bookstore');

if(isset($_POST['updatedata'])) {   
  $id = $_POST['update_id'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $phone = $_POST['phone'];
  $address = $_POST['address'];
  $password = $_POST['password'];

  $query = "UPDATE users SET fname='$fname', lname='$lname', username='$username', email='$email', phone='$phone', address='$address', password='$password' WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if($query_run) {
    $message = "Data Updated!";
    header("Location: http://localhost/wattybookstore/admin/clists.php");
    exit();
  } else {
    echo '<script> alert("Data Not Updated"); </script>';
  }
}
?>
