



<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	
	<meta name="Keywords" CONTENT="">

	<link  rel="stylesheet" href="style1.css"> 
	

	<meta name="viewport"
		content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
btn{
	display:inline-block;
    background-color:#481368;
	color:#fff;
	padding:8px 30px;
	margin: 20px 10px;
	border-radius:30px;	
	 border-color:black;
	transition:all ease 0.3s;
}

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

<script src="https://www.paypalobjects.com/api/checkout.js"></script>
</head> 
<body>
	<div class="header" >	
		
	<div class="container">
	<div class="navbar">
		
		<nav><center>
						<ul id="MenuItems"><b>	               
						 <li><a href="AvailPro.php">ALL PRODUCTS</a></li>
						 <li><a href="order.php">ORDER </a></li>
						 <li><a href="cart.php">CART 
			
			
		
							 </ul>

			
				</nav>	 
				
				
				
		
	   <a href="logout.php"> LOG OUT
	   </a>

				
			
	</div>
		
	</div>
	</div>	
	
	

	 <div id="body">
                        <h3>Payment</h3>
                        <div class="hero-unit-table">
                        <span id="paypal-button"></span>
                        <?php
						  session_start();
						  $conn = mysqli_connect("localhost", "root", "", "motomaticdb");
	
	if(!$conn){
		die("Error: Failed to connect to database!");
	}
	   $user_id1 = $_SESSION['user_id1'];
                        $total = 0;
                                    
                               
                                $result = mysqli_query($conn, "SELECT sum(amount_paid) FROM orders  ") or die(mysqli_error());
                                while ($rows = mysqli_fetch_array($result)) {
                        $total = $rows['sum(amount_paid)'];
                           echo 'your total amount is ','',$total;
								}
                                        ?>
					
						 <form action="https://www.sandbox.paypal.com/cgi-bin/webscr"  method="post">
                            <input type="hidden" name="cmd" value="_xclick" />
                            <input type="text" name="business" value="moozikaymelos@gmail.com" />
                            <input type="hidden" name="item_name" value="Instruments" />
								
                               <?php
                                    $cart_table = mysqli_query($conn, "select  * from orders") or die(mysqli_error());
                                    $cart_count = mysqli_num_rows($cart_table);
                                    while ($cart_row = mysqli_fetch_array($cart_table)) {
                                        $order_id = $cart_row['id'];
                                      
                                        $product_query = mysqli_query($conn, "select * from orders ") or die(mysqli_error());
                                        $product_row = mysqli_fetch_array($product_query);
                                        ?>
                            
                           <input type="number" name="item_number" value="<?php       $order_id = $cart_row['id']; echo $order_id ?>" />

                           <?php } ?>
                           
                            <?php
                            if ($cart_count != 0) {
                                $result = mysqli_query($conn, "SELECT sum(amount_paid) FROM orders ") or die(mysqli_error());
                                while ($rows = mysqli_fetch_array($result)) {
                                    ?>
                                    <input type="text" name="amount" value="<?php echo $rows['sum(amount_paid)']; ?>" />
                                <?php }
                            } ?>

 <input type="hidden" name="no_shipping" value="<?php echo 2; ?>" />
                            <input type="hidden" name="no_note" value="2" />
                            <input type="hidden" name="currency_code" value="PHP" />
                            <input type="hidden" name="lc" value="GB" />
                            
                            <input type="image" src="paypal_button.png" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!" style="margin-left: 280px;" class="img-rounded" />
                            <img alt="fdff" border="0" src="paypal_button.png" width="1" height="1" />
                            Payment confirmed 
                            <input type="hidden" name="return" value="https://tameraplazainn.x10.mx/savingreservation.php?confirmation<?php echo $confirmation; ?>" />
                            Payment cancelled 
                            <input type="hidden" name="cancel_return" value="http://tameraplazainn.x10.mx/cancel.php" />
                            <input type="hidden" name="rm" value="2" />
                            <input type="hidden" name="notify_url" value="http://tameraplazainn.x10.mx/ipn.php" />
                            <input type="hidden" name="custom" value="any other custom field you want to pass" />
							
					
					
                        </form> 
						
					
                           
                    </div>
                    </div>
      
<script>
paypal.Button.render({
    env: 'sandbox', // change for production if app is live,
 
        //app's client id's
    client: {
        sandbox:    'AajzLvIrFvyOWy4AZ7jlItP5Sesk7kOod3QMBr9l9qq57Hf2IZmhJPmPrQWko1Sj0aNcmm4Hdi0Wbx8A',
        //production: 'AaBHKJFEej4V6yaArjzSx9cuf-UYesQYKqynQVCdBlKuZKawDDzFyuQdidPOBSGEhWaNQnnvfzuFB9SM'
    },
 
    commit: true, // Show a 'Pay Now' button
 
    style: {
        color: 'gold',
        size: 'small'
    },
 
    payment: function(data, actions) {
        return actions.payment.create({
            payment: {
                transactions: [
                    {
                        //total purchase
                        amount: { 
                            total: '<?php echo $total; ?>', 
                            currency: 'USD' 
                        }
                    }
                ]
            }
        });
    },
 
    onAuthorize: function(data, actions) {
        return actions.payment.execute().then(function(payment) {
            console.log(payment)
            location.replace('paid.php?id=<?php echo $_GET['id'] ?>')           
        });
    },
 
}, '#paypal-button');
</script>
                    </div>
                </div>
            </div>
	
	
		





























			
<div class="footer">
		<h3><b> Motomatic.Co @ 2022</b></h3>	
</div>			



</body>
</html>
		


















			
<div class="footer">
		<h3><b> Motomatic.Co @ 2022</b></h3>	
</div>			



</body>
</html>
		