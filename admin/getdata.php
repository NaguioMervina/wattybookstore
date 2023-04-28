<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'bookstore');

if(isset($_POST['id'])) {   
  $id = $_POST['id'];

  $query = "SELECT * FROM users WHERE id='$id'";
  $query_run = mysqli_query($connection, $query);

  if(mysqli_num_rows($query_run) > 0) {
    $row = mysqli_fetch_assoc($query_run);
    echo json_encode($row);
  } else {
    echo "User not found";
  }
}
?>
