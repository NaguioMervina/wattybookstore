<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bookstore');

if(isset($_POST['deletedata']))
{
    $id = $_POST['delete_id'];

    $query = "DELETE FROM orders WHERE id='$id'";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
         $message = " Data Deleted ";
		echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/index.php'</script>";
    }
    else
    {
        echo '<script> alert("Data Not Deleted"); </script>';
    }
}

?>