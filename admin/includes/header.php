<?php
session_start();

if(isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true) {
	// Allow access to admin area
} else {
	// Redirect to login page
	header('Location:../Signin_Signup.php');
	exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Watty Bookstore</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

<style>
.topbar .dropdown-list .dropdown-header {
    background-color: black !important;
    border: 1px solid black !important;
    padding-top: .75rem;
    padding-bottom: .75rem;
    color: #fff;
}


</style>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
</body>
</html>