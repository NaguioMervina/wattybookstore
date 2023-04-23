<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bookstore');

if(isset($_POST['updatedata']))
{   
    $id = $_POST['update_id'];
    $product_name = trim($_POST['product_name']);
$product_price = trim($_POST['product_price']);
$product_qty = trim($_POST['product_qty']);
$product_desc = trim($_POST['product_desc']);

    // Check if a new image was uploaded
    if (!empty($_FILES['product_image']['name'])) {
        // Remove the old image file
        $query_select = "SELECT product_image FROM product WHERE id='$id'";
        $query_select_run = mysqli_query($connection, $query_select);
        $old_image = mysqli_fetch_assoc($query_select_run)['product_image'];
        if ($old_image && file_exists($old_image)) {
            unlink($old_image);
        }
        // Upload the new image file
        $target_dir = "../images/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        if (!in_array($imageFileType, $allowed_types)) {
            echo '<script> alert("Invalid image type. Only JPG, JPEG, PNG, and GIF files are allowed."); </script>';
            exit();
        }
        $new_image = $target_dir . $id . "." . $imageFileType;
        move_uploaded_file($_FILES["product_image"]["tmp_name"], $new_image);
        $query = "UPDATE product SET product_name='$product_name', product_price='$product_price', product_qty='$product_qty',  product_desc='$product_desc', product_image='$new_image' WHERE id='$id'";
    } else {
        $query = "UPDATE product SET product_name='$product_name', product_price='$product_price', product_qty='$product_qty',  product_desc='$product_desc' WHERE id='$id'";
    }

    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        $message = " Data Updated! ";
        echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/proAD.php'</script>";
    }
    else
    {
        $message = " Data Not Updated! ";
        echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/proAD.php'</script>";
    }
}
?>
