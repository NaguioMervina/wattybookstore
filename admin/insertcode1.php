<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'bookstore');

if(isset($_POST['insertdata']))
{
  // Get the image file details
    $product_image_name = $_FILES['product_image']['name'];
    $product_image_temp = $_FILES['product_image']['tmp_name'];
    $product_image_size = $_FILES['product_image']['size'];
    $product_image_type = $_FILES['product_image']['type'];
    
    // Check if file is an image
    if($product_image_type != 'image/jpeg' && $product_image_type != 'image/png' && $product_image_type != 'image/gif') {
        echo '<script> alert("Only JPEG, PNG, and GIF images are allowed."); </script>';
    } else {
        // Generate a unique filename to avoid overwriting existing files
        $new_filename = uniqid('', true) . '.' . pathinfo($product_image_name, PATHINFO_EXTENSION);
        $upload_path = '../images/' . $new_filename;
        
        // Move the uploaded file to the specified location
        if(move_uploaded_file($product_image_temp, $upload_path)) {
            // Insert data into database
            $product_name = $_POST['product_name'];
            $product_price = $_POST['product_price'];
            $product_qty = $_POST['product_qty'];
            $product_code = $_POST['product_code'];
            $product_desc = $_POST['product_desc'];
            
            $query = "INSERT INTO product (`product_image`,`product_name`,`product_price`,`product_qty`,`product_code`,`product_desc`) 
                VALUES ('$new_filename','$product_name','$product_price','$product_qty','$product_code','$product_desc')";
            $query_run = mysqli_query($connection, $query);

            if($query_run) {
                $message = " Data Saved ";
                echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/proAD.php'</script>";
            } else {
                $message = " Data Not Saved ";
                echo "<script type='text/javascript'>alert('$message');window.location='http://localhost/wattybookstore/admin/proAD.php'</script>";
            }
        } else {
            echo '<script> alert("Error uploading file. Please try again."); </script>';
        }
    }
}
?>
