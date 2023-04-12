<!-- Sidebar -->
<ul class="navbar-nav bg-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" >
        <div class="sidebar-brand-icon rotate-n-15">
            <img src="logo.png" alt="Logo">
        </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Overview -->
    <li class="nav-item">
        <a class="nav-link" href="OVERVIEW.php">
            <span>Overview</span>
        </a>
    </li>

    <!-- Nav Item - Pending Orders -->
    <li class="nav-item">
        <a class="nav-link" href="index.php">
            <span>Pending Orders</span>
        </a>
    </li>

    <!-- Nav Item - Preparing Lists -->
    <li class="nav-item">
        <a class="nav-link" href="PREP.php">
            <span>Preparing Lists</span>
        </a>
    </li>

    <!-- Nav Item - Out for Delivery Lists -->
    <li class="nav-item">
        <a class="nav-link" href="OUT.php">
            <span>Out for Delivery Lists</span>
        </a>
    </li>

    <!-- Nav Item - Delivered Lists -->
    <li class="nav-item">
        <a class="nav-link" href="DELI.php">
            <span>Delivered Lists</span>
        </a>
    </li>

    <!-- Nav Item - Products -->
    <li class="nav-item">
        <a class="nav-link" href="proAD.php">
            <span>Products</span>
        </a>
    </li>

    <!-- Nav Item - User Lists -->
    <li class="nav-item">
        <a class="nav-link" href="clists.php">
            <span>User Lists</span>
        </a>
    </li>

    <!-- Nav Item - Logout -->
    <li class="nav-item">
        <a class="nav-link" href="index.php" data-toggle="modal" data-target="#logoutModal">
            <span>Logout</span>
        </a>
    </li>

</ul>
<!-- End of Sidebar -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Are you sure you want to log out?</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">No</button>
                <a class="btn btn-primary" href="../Signin_Signup.php">Yes</a>
            </div>
        </div>
    </div>
</div>

<style>
    .navbar-nav li {
        margin: 10px 0;
    }

    .nav-link {
        font-size: 16px;
        color: #fff;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #fff;
        background-color: #3f9c35;
    }

    .nav-item.active .nav-link {
        color: #fff;
        background-color: #3f9c35;
    }
</style>

<script>
    // Add active class to current page link
    var links = document.querySelectorAll('.nav-link');
    var current = location.pathname.split('/').slice(-1)[0];
    for (var i = 0; i < links.length; i++) {
        if (links[i].getAttribute('href') === current) {
            links[i].parentNode.classList.add('active');
        }
    }
</script>
