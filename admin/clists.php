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



</style>						

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
              
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
										
                        <div class="topbar-divider d-none d-sm-block"></div> 
                    </ul>
                </nav>
               
                <div class="container-fluid">
                   		<!-- ADD NEW USER MODAL-->
                    <div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"    aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">ADD USER </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <form action="insertcode.php" method="POST">

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label> First Name </label>
                                        <input type="text" name="fname" class="form-control" placeholder="Enter First Name">
                                    </div>
																		
																		<div class="form-group">
                                        <label> Last Name </label>
                                        <input type="text" name="lname" class="form-control" placeholder="Enter Last Name">
                                    </div>
																		
																		<div class="form-group">
                                        <label> Username </label>
                                        <input type="text" name="username" class="form-control" placeholder="Enter Username">
                                    </div>

                                    <div class="form-group">
                                        <label> Email </label>
                                        <input type="text" name="email" class="form-control" placeholder="Enter Email">
                                    </div>
																		
																		<div class="form-group">
                                        <label> Phone Number </label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number">
                                    </div>
																		
																		<div class="form-group">
                                        <label> Address </label>
                                        <input type="text" name="address" class="form-control" placeholder="Enter Address">
                                    </div>
																		
                                    <div class="form-group">
                                        <label> Password </label>
                                        <input type="text" name="password" class="form-control" placeholder="Enter Password">
                                    </div>
																		
																		 <div class="form-group">
                                        <label> Usertype </label>
                                        <input type="text" name="usertype" class="form-control" placeholder="Enter type of User (admin or user only)">
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
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit User Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="update.php" method="POST">
        <div class="modal-body">
          <input type="hidden" name="update_id" id="update_id">
          <div class="form-group">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter First Name" required>
          </div>
          <div class="form-group">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Enter Last Name" required>
          </div>
          <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label for="phone">Phone Number</label>
            <input type="tel" name="phone" id="phone" class="form-control" placeholder="Enter Phone Number" required>
          </div>
          <div class="form-group">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control" placeholder="Enter Address" required>
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" required>
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


<script>
$(document).ready(function(){
  $('.editbtn').on('click', function(){
    var id = $(this).data('id');
    $.ajax({
      url: 'getdata.php',
      type: 'POST',
      data: {id: id},
      success: function(response){
        var data = JSON.parse(response);
        $('#update_id').val(data.id);
        $('#fname').val(data.fname);
        $('#lname').val(data.lname);
        $('#username').val(data.username);
        $('#email').val(data.email);
        $('#phone').val(data.phone);
        $('#address').val(data.address);
        $('#password').val(data.password);
      }
    });
  });
});
</script>


    <!-- DELETE POP UP FORM (Bootstrap MODAL) 
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Delete User Data </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form action="deletecode.php" method="POST">

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
    </div> -->


         
			
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">List of Users</h1>      
                    </div>
                <div class="container ">
				<!--<button type="button" class="btn btn-primary  " data-toggle="modal" data-target="#studentaddmodal">
                        Add User
                    </button> -->
                    
                <div class="card-body">

                    <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'bookstore');

                $query = "SELECT * FROM users";
                $query_run = mysqli_query($connection, $query);
            ?>
                    <table id="datatableid" class="table ">
                        <thead>
                            <tr>
                                <th scope="col"> ID</th>
								<th scope="col"> FIRST NAME</th>
								<th scope="col"> LAST NAME</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">USERNAME</th>
                                <th scope="col"> PASSWORD</th>
								<th scope="col">USERTYPE</th>
                              <!--  <th scope="col"> EDIT </th> -->
                               <!-- <th scope="col"> DELETE </th> -->
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
                                <td> <?php echo $row['fname']; ?> </td>
								<td> <?php echo $row['lname']; ?> </td>
                                <td> <?php echo $row['email']; ?> </td>
                                <td> <?php echo $row['username']; ?> </td>
                                <td> <?php echo $row['password']; ?> </td>
								<td> <?php echo $row['usertype']; ?> </td>
                               
                               
                             <!--   <td>
                                    <button type="button" class="btn btn-success editbtn"> <i class= "fa fa-edit"> </i> </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-danger deletebtn"> <i class= "fa fa-trash"> </i> </button>
                                </td> -->
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

    <script>
       // Define a global variable to hold the user ID of the record being edited
var userId;

// Function to show the edit modal and populate the form fields with data
function showEditModal(id, fname, lname, email, phone, address, username, password, usertype) {
  // Set the user ID of the record being edited
  userId = id;
  
  // Set the values of the form fields
  $('#fname').val(fname);
  $('#lname').val(lname);
  $('#email').val(email);
  $('#phone').val(phone);
  $('#address').val(address);
  $('#username').val(username);
  $('#password').val(password);
  $('#usertype').val(usertype);

  // Show the edit modal
  $('#editmodal').modal('show');
}

// Event listener for the edit button
$('.editbtn').on('click', function() {
  // Get the data from the table row
  var $tr = $(this).closest('tr');
  var id = $tr.find('.id').text();
  var fname = $tr.find('.fname').text();
  var lname = $tr.find('.lname').text();
  var email = $tr.find('.email').text();
  var phone = $tr.find('.phone').text();
  var address = $tr.find('.address').text();
  var username = $tr.find('.username').text();
  var password = $tr.find('.password').text();
  var usertype = $tr.find('.usertype').text();

  // Call the showEditModal function with the data from the table row
  showEditModal(id, fname, lname, email, phone, address, username, password, usertype);
});

// Event listener for the form submission
$('#edit-form').on('submit', function(e) {
  e.preventDefault();
  
  // Get the form data
  var formData = {
    'id': userId,
    'fname': $('#fname').val(),
    'lname': $('#lname').val(),
    'email': $('#email').val(),
    'phone': $('#phone').val(),
    'address': $('#address').val(),
    'username': $('#username').val(),
    'password': $('#password').val(),
    'usertype': $('#usertype').val()
  };
  
  // Send the form data to the server using AJAX
  $.ajax({
    type: 'POST',
    url: 'updatecode.php',
    data: formData,
    success: function(response) {
      // Hide the edit modal and update the table row with the new data
      $('#editmodal').modal('hide');
      $tr.find('.fname').text(formData.fname);
      $tr.find('.lname').text(formData.lname);
      $tr.find('.email').text(formData.email);
      $tr.find('.phone').text(formData.phone);
      $tr.find('.address').text(formData.address);
      $tr.find('.username').text(formData.username);
      $tr.find('.password').text(formData.password);
      $tr.find('.usertype').text(formData.usertype);
    },
    error: function(xhr, status, error) {
      // Display an error message if there was an error
      console.log(xhr.responseText);
      alert('There was an error updating the record.');
    }
  });
});

    </script>

            </div>
            <!-- End of Main Content -->

          
		

    <?php 
		include('includes/scripts.php');
		include('includes/footer.php');
		
		?>

 

    
 