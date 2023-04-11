<?php
session_start();

if(isset($_SESSION['user_id'])) {
	// Allow access to user area
} else {
	// Redirect to login page
	header('Location: Signin_Signup.php');
	exit();
}
?>

<?php
	require 'config.php';

	$grand_total = 0;
	$allItems = '';
	$items = [];

	$sql = "SELECT CONCAT(product_name, '(',qty,')') AS ItemQty, total_price FROM cart";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$result = $stmt->get_result();
	while ($row = $result->fetch_assoc()) {
	  $grand_total += $row['total_price'];
	  $items[] = $row['ItemQty'];
	}
	$allItems = implode(', ', $items);
  
?>
<!DOCTYPE html>
<html>
<head>
<title>Watty Bookstore</title>
	<meta charset="UTF-8">
	<meta name="Keywords" CONTENT="">
			<link  rel="stylesheet" href="css/style1.css"> 

	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	
<style>
.title::after {
    content: '';
    background: rgb(252 249 249 / 0%);
    width: 80px;
    height: 5px;
    border-radius: 5px;
    position: absolute;
    bottom: 0;
    left: 50%;

    translate: translateX(-50%);
}
</style></head> 
  
<body>
	<div class="header">	
		
	<div class="container">
	<div class="navbar">

  

		<nav><center>
	<ul><b>
		                
						 <li><a href="AvailPro.php"><b>HOME</a></li>
						 <li><a href="order.php">ORDER </a></li>
						 <li><a href="cart.php">MY CART</a></li>
			
			<?php 
	   include "config.php";
	   
	   $sqlCount = "select count(id) as itemCount FROM cart where id = id";
	   $resultCount = mysqli_query($conn, $sqlCount);
	   $rowCount = mysqli_fetch_assoc($resultCount);
	   if($rowCount['itemCount']>0){
			   echo '<span style="color:red;border-radius:15px;">'.$rowCount['itemCount'].'</span></a>';
	   }else{
			   echo '<span style="color:red;border-radius:15px;">0</span></a>';
	   }
   
   ?>
	   
	
					
	
	</ul>	</center>			
				</nav>
				
				
				
		<div>
	   <a href="logout.php"> LOG OUT
	   </a>
		</div>
	</div>	
	</div>
	</div>
	
  <div class="container">
  <div class="row justify-content-center">
    <div id="order">
      <h2 class="title"><b><center>PROCESS YOUR ORDER:</center></b></h2>
      <div>
        <h2><b>Product(s):</b> <?= $allItems ?></h2>
        <h2><b>Delivery Charge:</b> 80</h2>
        <h2><b>Total Amount Payable:</b> <?= number_format($grand_total + 80) ?></h2>
      </div>
      <form action="" method="post" id="placeOrder">
        <input type="hidden" name="products" value="<?= $allItems ?>">
        <input type="hidden" name="grand_total" value="<?= $grand_total + 80 ?>">
        <div class="form-group" style="padding: 10px 5px; border-radius: 25px;">
          <input type="text" name="name" class="form-control" placeholder="Enter Full Name" required>
        </div>
        <div class="form-group" style="padding: 10px 5px; border-radius: 25px;">
          <input type="text" name="email" class="form-control" placeholder="Enter Email" required>
        </div>
        <div class="form-group" style="padding: 10px 5px; border-radius: 25px;">
          <input type="tel" name="phone" class="form-control" placeholder="Enter Phone" required>
        </div>
        <div class="form-group" style="padding: 10px 5px; border-radius: 25px;">
          <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here..."></textarea>
        </div>
        <h2><b>Select Payment Method:</b></h2>
        <div class="form-group">
          <select name="pmode" class="form-control">
            <option value="" selected disabled>------</option>
            <option value="COD" style="font-weight: bold">CASH ON DELIVERY</option>
            <option value="PAYPAL" style="font-weight: bold">PAYPAL</option>
          </select>
        </div>
        <div class="form-group">
          <input type="submit" name="submit" value="PLACE ORDER" class="btn btn-danger btn-block" style="font-weight: bold">
        </div>
      </form>
    </div>
  </div>
</div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
   <script src="js/checkout.js"></script>
   <script src="js/menuitems.js"></script>
</body>
</html>
		
		