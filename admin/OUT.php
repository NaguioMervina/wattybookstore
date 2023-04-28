<?php 
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connect1.php');
?>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
   		
								
								
                   <style>
                       .bg-success {
    background-color: rgb(255, 191, 0)!important;
}
.btn-primary {
    color: #fff;
    background-color: #1cc88a;
    border-color: #1cc88a;
}
</style>						
													
										
                    <ul class="navbar-nav ml-auto">
										
										
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
                </nav>
               
                <div class="container-fluid">
              
    <!-- DELETE POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="delete1.php" method="POST">

                    <div class="modal-body">

                        <input type="hidden" name="delete_id" id="delete_id">

                        <h4> Do you want to Delete this Data ??</h4>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal"> NO </button>
                        <button type="submit" name="deletedata" class="btn btn-primary"> Yes  </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


         
			
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Out for Delivery Lists</h1>      
                    </div>
                <div class="container ">
                    
                <div class="card-body">

                    <?php
                 $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'bookstore');

                 $query = "SELECT * FROM orders WHERE status= 'Out for Delivery'";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table ">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
                                <th scope="col">Customer's &nbsp; Name</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Address</th>
                                <th scope="col">Mode of Payment</th>
                                <th scope="col">Products </th>
                                <th scope="col">Total Amount </th>
                                <th scope="col">Status </th>
                                <th scope="col">  </th>
                                <th scope="col">  </th>
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
                                <td> <?php echo $row['id']; ?> </td>
                                <td> <?php echo $row['name']; ?> </td>
                                <td> <?php echo $row['phone']; ?> </td>
                                <td> <?php echo $row['address']; ?> </td>
                                <td> <?php echo $row['pmode']; ?> </td>
                                <td> <?php echo $row['products']; ?> </td>
                                <td> <?php echo $row['amount_paid']; ?> </td>
                               
                                
                                <td>
                                <form action="code.php" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="ids" id="ids" value="<?php echo $row['id']; ?>" class="form-control" > 
                                    <select name="status" class="form-control" onchange="enableButton(this)">
                                        <option value="Out for Delivery" <?php if($row['status'] == 'Out for Delivery') echo 'selected'; ?>>Out for Delivery</option>                       
                                        <option value="Delivered">Delivered</option>
                                    </select>
                                    <td>
                                        <button type="submit" name="update_status" class="btn btn-primary" disabled><i class= "fa fa-edit"></i></button>
                                    </td>
                                </div>
                    <script>
                        function enableButton(select) {
                            // Get the update_status button
                            var button = select.form.elements.update_status;
                            // Remove the disabled attribute
                            button.removeAttribute('disabled');
                        }
                    </script>
                                <td>
                                    <button type="button"  class="btn btn-danger deletebtn"> <i class= "fa fa-trash"> </i></button>
                                </td>
                                </form>

                                </td>
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
					
                                        
    </body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> 
        <script>
            // Awesome JS Code Goes here
            $(document).ready( function () {
                $('#myTable').DataTable({responsive: true});
            } );
        </script>
                    <!-- Content Row -->
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
                    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

                    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
										
                   
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



            </div>
            <!-- End of Main Content -->

          
		

    <?php 
		include('includes/scripts.php');
		include('includes/footer.php');
		
		?>

 

