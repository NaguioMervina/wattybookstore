


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
  <title>Watty Bookstore</title>
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
</style>
</head> 
<body>
	<div class="header" >	
		
	<div class="container">
	<div class="navbar">
		
		<nav><center>
						 <ul id="MenuItems"><b>	               
						 <li><a href="AvailPro.php">HOME</a></li>
						 <li><a href="order.php">ORDER STATUS </a></li>
						 <li><a href="cart.php">CART 
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
	   <a href="logout.php"> LOG OUT
	   </a>	
	</div>
	</div>
	</div>	
	<div>
	<p>_</p>
	</div>
	

	<div class="row">
	<h2 style="color: #FFBF00">
	<?php
session_start();

if(isset($_SESSION['user_id'])) {
    // Check if another user is logged in the same browser
    if(isset($_SESSION['browser']) && $_SESSION['browser'] !== $_SERVER['HTTP_USER_AGENT']) {
        // Unset all session variables and redirect to login page
        $_SESSION = array();
        session_destroy();
        header('Location: Signin_Signup.php');
        exit();
    } else {
        // Update browser info in session
        $_SESSION['browser'] = $_SERVER['HTTP_USER_AGENT'];
        // Proceed with user info retrieval
        $user_id = $_SESSION['user_id'];
        include 'config.php';
        $stmt = $conn->prepare('SELECT * FROM usertable where user_id="'.$user_id.'" ');
        $stmt->execute();
        $result = $stmt->get_result();
        if ($row = $result->fetch_assoc()):
            $fname= $row['fname'];
            $lname= $row['lname'];
            echo 'Welcome',', ',$fname,' ',$lname, ' ! ';
        endif;
    }
} else {
    // Redirect to login page
    header('Location: Signin_Signup.php');
    exit();
}

?>


	</h2>
			
	</div>
	<div>
	<p>-</p>
	</div>
	
		<style>
* {box-sizing: border-box}
body {font-family: Verdana, sans-serif; margin:0}
.mySlides {display: none}
img {vertical-align: middle;

}

/* Slideshow container */
.slideshow-container {
  max-width: 1000px;
  position: relative;
  margin: auto;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 50%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
  user-select: none;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}

/* On hover, add a black background color with a little bit see-through */
.prev:hover, .next:hover {
  background-color: rgba(0,0,0,0.8);
}

/* Caption text */
.text {
  color: #f2f2f2;
  font-size: 15px;
  padding: 8px 12px;
  position: absolute;
  bottom: 8px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 12px;
  padding: 8px 12px;
  position: absolute;
  top: 0;
}

/* The dots/bullets/indicators */
.dot {
  cursor: pointer;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.6s ease;
}

.active, .dot:hover {
  background-color: #717171;
}

/* Fading animation */
.fade {
  animation-name: fade;
  animation-duration: 1.5s;
}


@keyframes fade {
  from {opacity: .4} 
  to {opacity: 1}
}

/* On smaller screens, decrease text size */
@media only screen and (max-width: 300px) {
  .prev, .next,.text {font-size: 11px}
}
</style>

<!--carousel slideshow-->
<div class="slideshow-container">
<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="inspseries.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="anghuling1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="dnsr1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<a class="prev" onclick="plusSlides(-1)">❮</a>
<a class="next" onclick="plusSlides(1)">❯</a>

</div>
<br>

<div style="text-align:center">
  <span class="dot" onclick="currentSlide(1)"></span> 
  <span class="dot" onclick="currentSlide(2)"></span> 
  <span class="dot" onclick="currentSlide(3)"></span> 
</div>
<!--carousel-->
<script src="js/carousel.js"></script>
<style>
	.row {
  display: flex;
  flex-wrap: wrap;
  justify-content: center; /* optional: align items horizontally */
}

.card {
  flex: 1 1 18rem; /* adjust the third value as needed */
  margin: 1rem; /* optional: add some margin between items */
}

</style>
	<div class="small-container" >	
			<div class="title">
			<b>	<h2>All Available Products </h2></b>
			</div>
   <div id="message"></div>	
     <div class="row mt-2 pb-3">
   <?php
  			include 'config.php';
  			$stmt = $conn->prepare('SELECT * FROM product');
  			$stmt->execute();
  			$result = $stmt->get_result();
  			while ($row = $result->fetch_assoc()):
   ?>
   <div class="card" style="width: 18rem;">
  <img src="images/<?= $row['product_image']?>"class="card-img-top" height="300" width="300">
  <div class="card-body">
    <h2 class="card-title"><?= $row['product_name']?></h2>
	<p class="card-title">₱&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></p>
	<H5> <B>Product Details:</B></H5> 
    <h5 class="card-text" style="font-weight:normal; font-style:italic;"><?= $row['product_desc'] ?></h5>
	<H5> <B> STOCK: &nbsp; <?= $row['product_qty'] ?></B></H5>
  </div>
  <div class="card-body text-center">
    <form action="" class="form-submit">
      <div class="row-flex">
        <?php
          $qty = $row['product_qty'];
          if($qty == '0'){
            echo '<p style="font-size:14px; font-weight: bold; padding: 10px 20px 10px 20px; border-radius: 30px;">- OUT OF STOCK -</p>';
          }else{
        ?> 
        <input type="number" min="0" max="<?php echo $qty; ?>" class="form-control pqty" placeholder="---Enter Quantity--" style="font-size:14px; font-weight: bold; padding: 10px 20px 10px 20px; border-radius: 30px;" value="1">												
        <input type="hidden" class="pid" value="<?php echo $row['id'];?>">
        <input type="hidden" class="pname" value="<?php echo $row['product_name'];?>">
        <input type="hidden" class="porqty" value="<?php echo $row['product_qty'];?>">
        <input type="hidden" class="pprice" value="<?php echo $row['product_price'];?>">
        <input type="hidden" class="pimage" value="<?php echo $row['product_image'];?>">
        <input type="hidden" class="pcode" value="<?php echo $row['product_code'];?>">
        <input type="hidden" class="pdesc" value="<?php echo $row['product_desc'];?>">
        <button style="font-size:16px; font-weight: bold; padding: 10px 60px 10px 60px; border-radius: 30px;" class="btn btn-info btn-block addItemBtn">
          ADD TO CART
        </button>
        <?php 
          }
        ?>
      </div>
    </form>
  </div>
</div>
	   <?php endwhile; ?>
</div>
</div>
	
	
 
  <!-- Displaying Products End -->
	
	<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/js/bootstrap.min.js'></script>
  <script src="js/availpro.js"></script>

			
<div class="footer">
		<h3><b> Watty Bookstore </b></h3>	
</div>			
<script src="js/menuitems.js"></script>
</body>
</html>
		