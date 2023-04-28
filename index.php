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
			<nav>
				<center>
					<ul> 
						<li><a href="index.php"><b>HOME</b></a></li>
					<!--	<li><a href="AvailproVISIT.php">AVAILABLE PRODUCTS</a></li>
						<li><a href="AboutUS.php">ABOUT US</a></li> -->
						<li><a href="Signin_Signup.php">LOGIN HERE</a></li>
					</ul>
				</center>
			</nav>
		</div>
	</div>
</div>

		
	</div>
	<div class="row">
	<h1>  </h1>
				<p>___ </p>
		</div>


<div>
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
  font-size: 120x;
  padding: 0px 0px 120px 50px;
  position: absolute;
  bottom: 20px;
  width: 100%;
  text-align: center;
}

/* Number text (1/3 etc) */
.numbertext {
  color: #f2f2f2;
  font-size: 35x;
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
@media only screen and (max-width: 500px) {
  .prev, .next,.text {font-size: 11px}
}
</style>


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="inspseries.jpg" style="width:100%">
  <div class="text">
				<h1>Your Best Bookshop <br> In Town</h1>
				<a href="Signin_Signup.php" class="btn"><b>ORDER NOW</b></a> 
  </div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="inspseries.jpg" style="width:100%">
  <div class="text">
  
  <h2>Already Have an Account?<br> </h2>
  <a href="Signin_Signup.php" class="btn"><b>LOGIN HERE</b> </a></div>
 
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="inspseries.jpg" style="width:100%">
  
  <div class="text"> 
  <h1>Don't Have An Account?</h1>
  <a href="Signin_Signup.php" class="btn"><b>REGISTER NOW </b></a></div>
  </div>
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

<script>
let slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) { slideIndex = 1 }
    if (n < 1) { slideIndex = slides.length }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}

// set a timer to advance the slideshow every 5 seconds
setInterval(function() {
    plusSlides(1);
}, 5000);

</script>
<div class="small-container">
  <div class="title">
    <b><h2>All Available Products </h2></b>
  </div>
  <div id="message"></div>
  <div class="search-container">
    <form method="GET" action="" class="search-form" style="text-align: right;">
      <input type="text" placeholder="Search products..." name="search">
      <button type="submit" name="submit-search">Search</button>
    </form>
  </div>
  <div class="row mt-2 pb-3">
    <?php
      include 'config.php';
      if(isset($_GET['submit-search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $stmt = $conn->prepare("SELECT * FROM product WHERE product_name LIKE '%$search%' OR product_desc LIKE '%$search%'");
      } else {
        $stmt = $conn->prepare('SELECT * FROM product');
      }
      $stmt->execute();
      $result = $stmt->get_result();
      while ($row = $result->fetch_assoc()):
    ?>
    <div class="card" style="width: 18rem;">
      <img src="images/<?= $row['product_image']?>"class="card-img-top" height="300" width="300">
      <div class="card-body">
        <h2 class="card-title"><?= $row['product_name']?></h2>
        <p class="card-title">₱&nbsp;&nbsp;<?= number_format($row['product_price'],2) ?></p>
        <h5><b>Product Details:</b></h5>
        <h5 class="card-text" style="font-weight:normal; font-style:italic;"><?= $row['product_desc'] ?></h5>
        <h5><b>STOCK: &nbsp; <?= $row['product_qty'] ?></b></h5>
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
            <a href="<?php if(isset($_SESSION['user_id'])) echo '#'; else echo 'Signin_Signup.php'; ?>" style="font-size:16px; font-weight: bold; padding: 10px 60px 10px 60px; border-radius: 30px;" class="btn btn-info btn-block addItemBtn <?php if(!isset($_SESSION['user_id'])) echo 'login-btn' ?>">
              <?php if(isset($_SESSION['user_id'])) echo 'ADD TO CART'; else echo 'LOGIN TO ADD TO CART'; ?>
            </a>
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

<script>
  // add event listener to login buttons
  (function() {
    const loginBtns = document.querySelectorAll('.login-btn');
    loginBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        window.location.href = 'Signin_Signup.php';
      });
    });
  })();
</script>

<div class="footer">
	<div class="container">
		<div class="row">
			<div class="footer-col-1">
			<h3> <b>Watty Bookstore</b></h3>
			</div>
			
</div>
</div>
</div>

</body>
</html>
		