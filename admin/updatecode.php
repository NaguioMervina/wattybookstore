<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection,'motomaticdb');

    if(isset($_POST['updatedata']))
    {   
					$id = $_POST['update_id'];
        
					$fname = $_POST['fname'];
					$lname = $_POST['lname'];
					$username = $_POST['username'];
					$email = $_POST['email'];
					$phone = $_POST['phone'];
					$address = $_POST['address'];
					$password = $_POST['password'];
					$usertype = $_POST['usertype'];

        $query = "UPDATE usertable SET fname='$fname',lname='$lname',username='$username',
												email='$email',phone='$phone',address='$address',password='$password',usertype='$usertype' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            $message = " Data Updated! ";
						echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/clists.php'</script>";
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>