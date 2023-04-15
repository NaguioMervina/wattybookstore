
<?php
	session_start();

	if(isset($_SESSION['user_id'])) {
		// Allow access to user area
	} else {
		// Redirect to login page
		header('Location: Signin_Signup.php');
		exit();
	}
	require 'config.php';

	// Add products into the cart table
	if (isset($_POST['pid'])) {
	  $pid = $_POST['pid'];
	  $pname = $_POST['pname'];
	  $pprice = $_POST['pprice'];
	  $pimage = $_POST['pimage'];
	  $pcode = $_POST['pcode'];
	  $pqty = $_POST['pqty'];
	  	
		 $porqty = $_POST['porqty'];
		 $purchqty = $_POST['pqty'];
	  $total_price = $pprice * $pqty;

	  $stmt = $conn->prepare('SELECT product_code FROM cart WHERE product_code=?');
	  $stmt->bind_param('s',$pcode);
	  $stmt->execute();
	  $res = $stmt->get_result();
	  $r = $res->fetch_assoc();
	  $code = $r['product_code'] ?? '';

	  if (!$code) {
		  	$user_id = $_SESSION['user_id'];
	    $query = $conn->prepare('INSERT INTO cart (user_id,product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?,?)');
	    $query->bind_param('sssssss',$user_id,$pname,$pprice,$pimage,$pqty,$total_price,$pcode);
	    $query->execute();
		
		 $pcode = $_POST['pcode'];
		 $porqty = $_POST['porqty'];
		 $purchqty = $_POST['pqty'];

	  $tqty = $porqty - $purchqty;
		
		$stmt = $conn->prepare('UPDATE product SET product_qty=? WHERE product_code=?');
	  $stmt->bind_param('ss',$tqty,$pcode);
	  $stmt->execute();		
			echo '<script>alert("Item added to your cart!");window.location.reload();</script>';
	  } else {
	    echo '<script>alert("Item added to your cart!");window.location.reload();</script>';
	  }
	}

	// Get no.of items available in the cart table
	if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item') {
	  $stmt = $conn->prepare('SELECT * FROM cart');
	  $stmt->execute();
	  $stmt->store_result();
	  $rows = $stmt->num_rows;

	  echo $rows;
	}

	// Remove single items from cart
	if (isset($_GET['remove'])) {
	  $id = $_GET['remove'];

	 
	    require 'config.php';
		
                $stmt = $conn->prepare('SELECT * FROM cart where id="'.$id.'"');
                $stmt->execute();
                $result = $stmt->get_result();
   
                while ($row = $result->fetch_assoc()):
				$product_code1 = $row['product_code'];
				$qty1 = $row['qty'];
				
				
				
				
endwhile; 
 require 'config.php';
		
                $stmt = $conn->prepare('SELECT* FROM product WHERE product_code="'.$product_code1.'"');
                $stmt->execute();
                $result = $stmt->get_result();
   
                while ($row = $result->fetch_assoc()):
		
				$qty2 = $row['product_qty'];
				$pr2 = $row['product_code'];
				
				
				
endwhile; 
$tqt3=$qty2 + $qty1;
	    
		$stmt = $conn->prepare('UPDATE product SET product_qty=? WHERE product_code=?');
	  $stmt->bind_param('ss',$tqt3,$pr2);
	  $stmt->execute();	
 $stmt = $conn->prepare('DELETE FROM cart WHERE id=?');
	  $stmt->bind_param('i',$id);
	  $stmt->execute();	  
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'Item removed from the cart!';
	  header('location:cart.php');
	}

	// Remove all items at once from cart
	if (isset($_GET['clear'])) {
	  $stmt = $conn->prepare('DELETE FROM cart');
	  $stmt->execute();
	  
	  
	  
	  $_SESSION['showAlert'] = 'block';
	  $_SESSION['message'] = 'All Item removed from the cart!';
	  header('location:cart.php');
	}

	// Set total price of the product in the cart table
	if (isset($_POST['qty'])) {
	  $qty = $_POST['qty'];
	  $pid = $_POST['pid'];
	  $pprice = $_POST['pprice'];

	  $tprice = $qty * $pprice;

	  $stmt = $conn->prepare('UPDATE cart SET qty=?, total_price=? WHERE id=?');
	  $stmt->bind_param('isi',$qty,$tprice,$pid);
	  $stmt->execute();
	}

    // Checkout and save customer info in the orders table
	if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
		$name = $_POST['name'];
	  $email = $_POST['email'];
	  $phone = $_POST['phone'];
	  $products = $_POST['products'];
	  $grand_total = $_POST['grand_total'];
	  $address = $_POST['address'];
	  $pmode = $_POST['pmode'];

	  $data = '';

	
$user_id = $_SESSION['user_id'];
$status="Pending"; 
	  $stmt = $conn->prepare('INSERT INTO orders (user_id,name,email,phone,address,pmode,products,amount_paid,status)VALUES(?,?,?,?,?,?,?,?,?)');
	  $stmt->bind_param('sssssssss',$user_id,$name,$email,$phone,$address,$pmode,$products,$grand_total,$status);
	  $stmt->execute();
	  $stmt2 = $conn->prepare('DELETE FROM cart');
	  $stmt2->execute();
	  $data .= '<div class="text-center">
	  <h2 class="title"><b>SUCCESSFULLY PLACED YOUR ORDER!</b></h2>
	  <h1 class="display-4 mt-2 text-danger"><b>YOUR ORDER DETAILS:</b></h1>
	  <h2 class="bg-danger text-light rounded p-2">' . $products . '</h2>
	  <h2> ' . $name . '</h2>
	  <h4>' . $email . '</h4>
	  <h4>' . $phone . '</h4>
	  <h4><b>Order Total:</b></h4>
	  <h4>Please pay ₱' . number_format($grand_total, 2) . ' upon delivery.</h4>
	  <h2><b>Payment Method:</b> ' . $pmode . '</h2>
  </div>
  ';
	  echo $data;
	}
?>