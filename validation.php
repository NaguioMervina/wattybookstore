<?php
session_start();
$con = mysqli_connect('localhost', 'root', '');
mysqli_select_db($con, 'bookstore');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$name' AND password = '$pass'";
    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        if ($row["usertype"] == "user") {
            $_SESSION['user_id'] = $row["user_id"];
            header('Location: AvailPro.php');
            exit;
        } elseif ($row["usertype"] == "admin") {
            $_SESSION['is_admin'] = true;
            header('Location: admin/OVERVIEW.php');
            exit;
        }
    } else {
        echo '<script>alert("Incorrect username or password"); window.location = "Signin_Signup.php";</script>';
        exit;
    }
}
?>
