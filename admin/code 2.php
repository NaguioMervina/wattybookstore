<?php
 $connection = mysqli_connect("localhost","root","");
 $db = mysqli_select_db($connection, 'motomaticdb');

 if(isset($_POST['update_status']))
{
    $status = $_POST['status'];
   
       $id1 = $_POST['ids'];
    
    $query = "UPDATE orders SET status='$status' where id='$id1' ";
    $query_run = mysqli_query($connection, $query);
    if($query_run)
    {
        echo "<script type='text/javascript'>alert('Status Updated');window.location='http://localhost/wattybookstore/admin/DELI.php'</script>";
    }
    else
    {
        echo '<script> alert("Data Not Updated"); </script>';
    
    }
}
?>

