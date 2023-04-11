<!DOCTYPE html>

<html>
<head>
	<meta charset="UTF-8">
	<meta name="Keywords" CONTENT="">
	<title>Motomatic. co</title>
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

	<div class="header" >	
		
		<div class="container">
			<div class="navbar">
				

				<nav> 
					 <ul id="MenuItems">					
	
						 <li><b><a href="AvailPro.php">ALL PRODUCTS</a></li>
						 <li><a href="order.php">ORDER </a></li>
						 <li><a href="cart.php">MY CART
			
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
					 <img src="images/menu.png" class="menu-icon"
		onclick="menutoggle()">
					
				</nav>
			  	<div>
	   <a href="logout.php"> LOG OUT
	   </a>
		</div>
				
			
			</div>
		
		</div>
		
	
	</div>

	<div class="row">
	<h1>  </h1>
				<p>___ </p>
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


<div class="slideshow-container">

<div class="mySlides fade">
  <div class="numbertext">1 / 3</div>
  <img src="bck1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">2 / 3</div>
  <img src="bck1.jpg" style="width:100%">
  <div class="text"></div>
</div>

<div class="mySlides fade">
  <div class="numbertext">3 / 3</div>
  <img src="bck1.jpg" style="width:100%">
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

<script src="js/carousel.js"></script>
<div class="row">
		<h1>  </h1>
				<p>Welcome to our shop, get the chance to purchase good quality products </p>
				
				<a href="AvailPro.php" class="btn">Shop Now </a>
	</div>
		





	<div class="small-container">
		<h2 class="title">Available Products </h2>
			<div class="row">
				<div class="col-4">
					<a href="AvailPro.php"><img class="pdc" src="images/Product1.jpg">
					<h4>RIMSET FOR YAMAHA SNIPER 150/155</H4></a>
					<p>Price: Php. 3,500.00</p>
				</div>
				<div class="col-4">
					<a href="AvailPro.php"><img class="pdc" src="images/Product2.jpg">
					<h4>FRONT & REAR HUB SET - OKM RACING</h4></a>
					<p>Price: Php. 2,500.00</p>
				</div>
				<div class="col-4">
					<a href="AvailPro.php"><img class="pdc" src="images/Product3.jpg">
					<h4>RCB FULL SHIFTER FOR SNIPER 150 S2 & S3 </h4></a>
					<p>Price: Php. 5,399.00</p>
				</div>
				<div class="col-4">
				<a href="AvailPro.php">	<img class="pdc" src="images/Product6.jpg">
					<h4>MAG WHEELS SET FOR HONDA WAVE AND XRM</h4></a>
					<p>Price: Php. 4,499.00</p>
				</div>
   </div>
</div>
<div class="footer">
			<h3> Motomatic.Co © 2022</h3>	
</div>
<script src="js/menuitems.js"></script>
</body>
</html>
		