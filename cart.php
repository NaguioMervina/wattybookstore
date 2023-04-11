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

<style>
.btn {
  border: none;
  color: white;
  padding: 14px 28px;
  font-size: 16px;
  cursor: pointer;
}
.danger {background-color: #f44336;} /* Red */ 
.danger:hover {background: #da190b;}
a{
	text-decoration:none;
	color:#e8ebef;
}


</style>

<!DOCTYPE html>
<html>
<head>
	
	<meta charset="UTF-8">
	
	<meta name="Keywords" CONTENT="">
	<title>Watty Bookstore</title>
	<link  rel="stylesheet" href="css/style1.css"> 
	
	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css' />
	 
<style>

</style></head> 
<body>
	<div class="header" >	
		
	<div class="container">
	<div class="navbar">
		            <nav> <center>
					 <ul ><b>
					
						 <li><a href="AvailPro.php"><b>HOME</b></a></li>
						 <li><a href="order.php"><b>ORDER </a></li>
						 <li><a href="cart.php"><b>MY CART
			
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
					 </ul>
					</nav>
		<div>
	   <a href="logout.php"> <b>LOG OUT
	   </a>
		</div>
	</div>	
	</div>
	</div>
	
<div class="title">
                  <h2 ><b>MY PURCHASES</h2>
                
	
</div>	
	
	  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-10">
        <div style="display:<?php if (isset($_SESSION['showAlert'])) {
  echo $_SESSION['showAlert'];
} else {
  echo 'none';
} unset($_SESSION['showAlert']); ?>" class="alert alert-success alert-dismissible mt-3">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong><?php if (isset($_SESSION['message'])) {
  echo $_SESSION['message'];
} unset($_SESSION['showAlert']); ?></strong>
        </div>
        <div class="table-responsive mt-2">
          <table class="table table-bordered table-striped text-center">
            <thead>
              
              <tr>
                <th><b>ID NUMBER</th>
                <th><b>PHOTO</th>
                <th><b><CENTER>TYPE OF PRODUCT</CENTER></th>
                <th><b>PRODUCT PRICE</th>
                <th><b>ORDER TOTAL ITEM</th>
                <th><b>TOTAL AMOUNT</th>
                <th>
                  <a href="action.php?clear=all" class="badge-danger badge p-1" onclick="return confirm('DELETE ALL ITEMS IN CART?');"><B><CENTER> REMOVE ALL </CENTER></B></a>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php
                require 'config.php';
					$user_id = $_SESSION['user_id'];
                $stmt = $conn->prepare('SELECT * FROM cart where user_id="'.$user_id.'"');
                $stmt->execute();
                $result = $stmt->get_result();
                $grand_total = 0;
                while ($row = $result->fetch_assoc()):
              ?>
              <tr>
                <td><?= $row['id'] ?></td>
                <input type="hidden" class="pid" value="<?= $row['id'] ?>">
                <td><img src="images/<?= $row['product_image'] ?>" width="50"></td>
                <td><?= $row['product_name'] ?></td>
                <td>
                  <i class="fas"></i>₱&nbsp;&nbsp;<?= number_format($row['product_price'],2); ?>
                </td>
                <input type="hidden" class="pprice" value="<?= $row['product_price'] ?>">
                <td>
                  <input type="number" class="form-control itemQty" value="<?= $row['qty'] ?>" style="width:75px;">
                </td>
                <td><i class="fas"></i>₱&nbsp;&nbsp;<?= number_format($row['total_price'],2); ?></td>
                <td>
                  <a href="action.php?remove=<?= $row['id'] ?>" class="text-danger lead" onclick="return confirm('Are you sure want to remove this item?');" style= "color:black ; font-size:16px;"><center><b>REMOVE</b></center></a>
                </td>
              </tr>
              <?php $grand_total += $row['total_price']; ?>
              <?php endwhile; ?>
              <tr>
                <td colspan="3">
                  
                </td>
                <td colspan="2"><b>TOTAL PAYMENT</b></td>
                <td><b>₱&nbsp;&nbsp;<?= number_format($grand_total,2); ?></b></td>
                <td>
                <a href="checkout.php" class="btn btn-danger"><b>&nbsp;&nbsp;PLACE ORDER</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
   <script src="js/cart.js"></script>
   <script src="js/menuitems.js"></script>
	
<div class="footer">
<h3> <B>Watty Bookstore</B></h3>
</div>
</body>
</html>
		