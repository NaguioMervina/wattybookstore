<?php 
include('includes/header.php'); 
include('includes/navbar.php'); 
include('connect1.php');
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
</style>	 
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                  

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                     <!-- Nav Item - Alerts -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i style="color:black;" class="fas fa-bell fa-fw"></i>
                              
															<!-- Counter - Notification -->
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
                              
																
                            <!-- Dropdown - Notification -->
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
                        </li>
                       

                        
                    </ul>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
									<!-- ADD NEW USER MODAL-->
                                    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Product </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="insertcode1.php" method="post" enctype="multipart/form-data">

                <div class="modal-body">
                    <div class="form-group">
                        <label> Product Image </label>
                        <input type="file" name="product_image">
                    </div>

                    <div class="form-group">
                        <label> Product Name </label>
                        <input type="text" name="product_name" class="form-control" placeholder="Enter Product Name">
                    </div>

                    <div class="form-group">
                        <label> Price </label>
                        <input type="text" name="product_price" class="form-control" placeholder="Enter Price">
                    </div>

                    <div class="form-group">
                        <label> Quantity </label>
                        <input type="text" name="product_qty" class="form-control" placeholder="Enter Quantity">
                    </div>

                    <div class="form-group">
    <label>Product Code</label>
    <input type="text" name="product_code" id="product_code" class="form-control" placeholder="Enter Product Code" readonly>
    <button type="button" onclick="generateCode()" class="btn btn-primary">Generate Code</button>
</div>


                    <div class="form-group">
                        <label> Product Description </label>
                        <input type="text" name="product_desc" class="form-control" placeholder="Enter Description">
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
                </div>

            </form>
        </div>
    </div>
</div>





    <!-- EDIT POP UP FORM (Bootstrap MODAL) -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Edit Product Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="updatecode1.php" method="post" enctype="multipart/form-data">
    <div class="modal-body">
        <input type="hidden" name="update_id" id="update_id">
        <div class="form-group">
            <label>Product Name</label>
            <input type="text" name="product_name" id="product_name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Product Price</label>
            <input type="text" name="product_price" id="product_price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Quantity</label>
            <input type="text" name="product_qty" id="product_qty" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Current Product Image</label>
            <img src="<?php echo $old_image; ?>" width="100" height="100">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remove_image" id="remove_image">
                <label class="form-check-label" for="remove_image">
                    Remove image
                </label>
            </div>
        </div>
        <div class="form-group">
            <label>New Product Image</label>
            <input type="file" name="product_image" id="product_image" class="form-control">
        </div>
        <div class="form-group">
            <label>Product Description</label>
            <textarea name="product_desc" id="product_desc" class="form-control" required></textarea>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="updatedata" class="btn btn-primary">Update Data</button>
    </div>
</form>


            </div>
        </div>
    </div>

 
	
                    

                    <!-- Content Row -->
                    <div class="row">

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

                <form action="deletecode1.php" method="POST">

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


         
			
                  <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Available Products</h1>
                        
                    </div>
                <div class="container ">
								<button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#studentaddmodal">
                        Add Product
                    </button>
                    <!--
										 $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'cart_system');-->
								
                <div class="card-body">
    <?php
        $connection = mysqli_connect("localhost","root","");
        $db = mysqli_select_db($connection, 'bookstore');

        $query = "SELECT * FROM product";
        $query_run = mysqli_query($connection, $query);
    ?>
    <table id="datatableid" class="table ">
        <thead>
            <tr>
                <th scope="col">Product Image</th>
                <th scope="col"> ID</th>
                <th scope="col">Product Name</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Product Code</th>
                <th scope="col">Product Description</th>
                <th scope="col"> EDIT </th>
                <th scope="col"> DELETE </th>
            </tr>
        </thead>
        <tbody>
            <?php
            if(mysqli_num_rows($query_run) > 0){
                while($row = mysqli_fetch_assoc($query_run)){
                    ?>
                    <tr>
                        <td>
                            <img src="../images/<?php echo $row['product_image']; ?>" height="60px" width="70px" alt="image"> 
                        </td>
                        <td> <?php echo $row['id']; ?> </td>
                        <td> <?php echo $row['product_name']; ?> </td>
                        <td> <?php echo $row['product_price']; ?> </td>
                        <td> <?php echo $row['product_qty']; ?> </td>
                        <td> <?php echo $row['product_code']; ?> </td>
                        <td> <?php echo $row['product_desc']; ?> </td>
                        <td>
                            <button type="button" class="btn btn-success editbtn"> <i class= "fa fa-edit"></i> </button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-danger deletebtn"> <i class= "fa fa-trash"></i></button>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="9">No Record Found</td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
</div>


            </div>
					
           
				<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script> 
      
      
                    <!-- Content Row -->
                    
                    <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
                    <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
										
                   
                </div>
                <!-- /.container-fluid -->
                <script>
   function generateCode() {
    var chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    var code = "";
    for (var i = 0; i < 8; i++) {
        code += chars.charAt(Math.floor(Math.random() * chars.length));
    }
    document.getElementById("product_code").value = code;
}

</script>
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
      //  $(document).ready(function () {

        //    $('#datatableid').DataTable({
           //     "pagingType": "full_numbers",
           //     "lengthMenu": [
              //      [10, 25, 50, -1],
           //         [10, 25, 50, "All"]
            //    ],
              //  responsive: true,
            //    language: {
               //     search: "_INPUT_",
                //    searchPlaceholder: "Search Your Data",
             //   }
//});

       // });
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

                $('#delete_id').val(data[1]);

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

                $('#update_id').val(data[1]);
                $('#product_name').val(data[2]);
                $('#product_price').val(data[3]);
                $('#product_qty').val(data[4]);

								$('#product_desc').val(data[5]);
            });
        });
    </script>



                    <!-- Content Row -->

                   
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

          
		

    <?php 
		include('includes/scripts.php');
		include('includes/footer.php');
		
		?>                             
    </body>
</html>

 

    
 