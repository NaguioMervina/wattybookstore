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
		
<div class="section">
    <div class="title"> <h2><b>  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; MY ORDERS </h2></b>  </div>
    <div class="card">
                    <div class="d-lg-flex align-items-center justify-content-between mb-4">
                          
                    </div>
                <div class="container ">             
                      
                <div class="card-body">
            <?php
			$connection = mysqli_connect("localhost","root","");
			$db = mysqli_select_db($connection, 'bookstore');

	$user_id = $_SESSION['user_id'];
    $query = "SELECT * FROM orders WHERE user_id='".$user_id."' ORDER BY status DESC";


                $query_run = mysqli_query($connection, $query);
                
            ?>
            
                    <table id="datatableid" class="table table bordered" style="width:100%">
                        <thead>
                            <tr>
                        
                                <th scope="col" style="text-align:center"><b>NAME</th>
                                <th scope="col" style="text-align:center"><b>PHONE NUMBER</th>
                                <th scope="col" style="text-align:center"><b>ADDRESS</th>
                                <th scope="col" style="text-align:center"><b>PAYMENT METHOD</th>
								<th scope="col" style="text-align:center"><b>PRODUCTS(qty)</th>
                                <th scope="col" style="text-align:center"><b>AMOUNT </th>
                                <th scope="col" style="text-align:center"><b>STATUS</th>
                            </tr>
                        </thead>
                        <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
                        ?>
                        <tbody>
                            <tr>
							    <td style="text-align:center"> <?php echo $row['name']; ?> </td>                            
                                <td style="text-align:center"> <?php echo $row['phone']; ?> </td>    
                                <td style="text-align:center"> <?php echo $row['address']; ?> </td>  
                                <td style="text-align:center"><?php echo $row['pmode']; ?> </td>  
                                <td style="text-align:center"> <?php echo $row['products']; ?> </td>  
                                <td style="text-align:center">₱&nbsp;<?php echo number_format($row['amount_paid'],2); ?> </td>  
                                <td style="text-align:center"> <?php echo $row['status']; ?> </td>              
                             </tr>
                           </tbody>   
<?php           
                    } 
                }
                else 
                {
                    echo "No Record Found";
                }
            ?>													 
                    </table>
                </div>
            </div>


        </div>
    </div>  
     
            
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
    </br>
                                </br>          
                                </br>
                                </br>

								
								
<div class="footer">
<h3><b> Watty Bookstore</h3>
</div>
			

    </body>
</html>