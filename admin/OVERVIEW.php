<?php 
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connect.php');
?>


<style>
    .bg-success {
		background-color: rgb(255, 191, 0)!important;
}
.btn-primary {
    color: #fff;
    background-color: rgb(75 12 84) !important;
    border-color: rgb(75 12 84) !important;
}

.statistic-block {
    padding: 20px;
    background: #2d3035;
    color: #8a8d93;
}
.block {
    padding: 20px;
    background: #2d3035;
    color: #8a8d93;
    margin-bottom: 30px;
}
*, ::after, ::before {
    box-sizing: border-box;
}
.align-items-end {
    -ms-flex-align: end!important;
    align-items: flex-end!important;
}
.justify-content-between {
    -ms-flex-pack: justify!important;
    justify-content: space-between!important;
}
.d-flex {
    display: -ms-flexbox!important;
    display: flex!important;
}
*, ::after, ::before {
    box-sizing: border-box;
}
user agent stylesheet
div {
    display: block;
}
.statistic-block {
    padding: 20px;
    background: #2d3035;
    color: #8a8d93;
}
.block {
    padding: 20px;
    background: #2d3035;
    color: #8a8d93;
    margin-bottom: 30px;
}
topbar.navbar-light .navbar-nav .nav-item .nav-link {
    color: violet;
}

.navbar-light .navbar-nav .nav-link {
color: black !important;}

.title5{color: White !important;
     padding: 25px 20px 20px 20px; border-radius: 90px;
    background-color: rgb(255, 191, 0)!important;
    border-color:#481368;
	font-size:25px;
	}


</style>						

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
               
                    <ul class="navbar-nav ml-auto">
										
										<!-- Nav Item - Alerts -->
                      <!-- Nav Item - Alerts 
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i style="color:black;" class="fas fa-bell fa-fw"></i>
                              
															 Counter - Notification
																	<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM orders where id = id";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo '<span style="color:red;border-radius:5px;width:12px;">'.$rowCount['orderCount'].'</span></a>';
																	}else{
																			echo '<span style="color:red;border-radius:5px;width:12px;">0</span></a>';
																	}
																	
																?>
                              
																
                             Dropdown - Notification 
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Customer Order Notification
                                </h6>
																
																  <?php
																		 $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'bookstore');
																		$query = "SELECT * FROM orders ";
																		$query_run = mysqli_query($connection, $query);
																		
																		 
														{
																foreach($query_run as $row)
																{
												?>
																	 <a class="dropdown-item d-flex align-items-center" href="index.php">
                                  <div>
                                     <div class="small text-gray-500">New Order</div>
                                     <span class="font-weight-bold"><?php echo $row['name']; ?> - <?php echo $row['pmode']; ?> - ₱<?php echo number_format($row['amount_paid'],2); ?></span>
                                 </div>
                                </a>
                             <?php           
																	} 
															}
													?>
																
																
                            </div> 
                        </li> -->
										
                        <div class="topbar-divider d-none d-sm-block"></div>

                        
                    </ul>
                </nav>
				
				
				
  <div > <h2 class="title5"><center><b>Dashboard</center></b></h2>      
                    </div>	<br>			
  <div class="container-fluid">

    <div class="row">
	
	<style>
	.statistic-block {
    padding: 20px;
    background: white;
    color: black;
	border-style: solid;
  border-color: rgb(75 12 84);
  border-radius: 20px;
}
	
	</style>
	
	
     <div class="col-md-3 col-sm-6">
		<div class="statistic-block block" ><h2><center><b>
			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM orders where id = id and status='Pending'";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";	
																	}
																	
																?></h2></b></center><br>
                              
	
		<b><center>ALL PENDING ORDERS</center></b>
		</div>
	 </div>
	 
	  <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>
	
			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM users where id = id and usertype='user'";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";
																	}
																	
																?></h2></b></center><br>
																
																
                              
		<b><center>TOTAL USERS</center></b>
		</div>
	 </div>
	 
	 
	 
	 
	 
	 	 	  <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>
	
			<?php 
																	include "config.php";
																	
																
																	$result = mysqli_query($conn, 'Select SUM(amount_paid) as value_sum from orders where status="Delivered" ');
																	$row = mysqli_fetch_assoc($result);
																	if($row['value_sum']>0){
																			echo $row['value_sum'];
																	}else{
																			echo "0";
																	}
																	
																?>
			</h2></b></center><br>													
			<b><center>REVENUE AMOUNT</center></b>														
		</div>
	 </div>
	 
	 
	 	  <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>

			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM product where id = id";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";
																	}
																	
																?>
																
		</h2></b></center><br>													
			<b><center>ALL PRODUCTS</center></b>															
		</div>
	 </div>
	 
	 


	 
	  <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>
	
			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM orders where id = id and status='Preparing'";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";
																	}
																	
																?>
																
																
																
		</h2></b></center><br>													
			<b><center>TOTAL Preparing Orders  LISTS</center></b>															
		</div>
	 </div>
	
	 
	 
	 
	   <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>

			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM orders where id = id and status='Out for Delivery'";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";
																	}
																	
																?>
																																
																
		</h2></b></center><br>													
			<b><center>TOTAL Out for delivery LISTS</center></b>				
		</div>
	 </div>
	 
	   <div class="col-md-3 col-sm-6">
		<div class="statistic-block block"><h2><center><b>

			<?php 
																	include "config.php";
																	
																	$sqlCount = "select count(id) as orderCount FROM orders where id = id and status='Delivered'";
																	$resultCount = mysqli_query($conn, $sqlCount);
																	$rowCount = mysqli_fetch_assoc($resultCount);
																	if($rowCount['orderCount']>0){
																			echo $rowCount['orderCount'];
																	}else{
																			echo "0";
																	}
																	
																?>
																
		</h2></b></center><br>													
			<b><center>TOTAL Delivered <br> LISTS</center></b>															
		</div>
	 </div>
	 


	 
    </div>

   </div>

































































  
                <!-- /.container-fluid -->
								  <script>
        $(document).ready(function () {

            $('.viewbtn').on('click', function () {
                $('#viewmodal').modal('show');
                $.ajax({ //create an ajax request to display.php
                    type: "GET",
                    url: "display.php",
                    dataType: "html", //expect html to be returned                
                    success: function (response) {
                        $("#responsecontainer").html(response);
                        //alert(response);
                    }
                });
            });

        });
    </script>


    <script>
        $(document).ready(function () {

            $('#datatableid').DataTable({
                "pagingType": "full_numbers",
                "lengthMenu": [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                responsive: true,
                language: {
                    search: "_INPUT_",
                    searchPlaceholder: "Search Your Data",
                }
            });

        });
    </script>

    <script>
        $(document).ready(function () {

            $('.deletebtn').on('click', function () {

                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[0]);

            });
        });
    </script>

    <script>
        $(document).ready(function () {

            $('.editbtn').on('click', function () {

                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[0]);
								$('#fname').val(data[1]);
                $('#lname').val(data[2]);
                $('#email').val(data[3]);
                $('#password').val(data[4]);
								$('#usertype').val(data[5]);
            });
        });
    </script>

            </div>
            <!-- End of Main Content -->

          
		

    <?php 
		include('includes/scripts.php');
		include('includes/footer.php');
		
		?>

 

    
 