<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
</head>

<body>
    <div class="container">
        <div class="wrapper">
            <div class="title"><span>Registration Form</span></div>
            <form action="registration.php" method="post">
                <div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="First Name" name="fname" id="" required>
                </div>
				<div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Last Name" name="lname" id="" required>
                </div>
				<div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="" required>
                </div>
				<div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Email Address" name="email" id="" required>
                </div>
				<div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Phone Number" name="phone" id="" required>
                </div>
				<div class="row">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Address" name="address" id="" required>
                </div>
                <div class="row">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="" required>
                </div>
                <!-- <div class="pass"><a href="#">Forgot Password?</a></div> -->
                <div class="row button">
                    <input type="submit" value="Register">
                </div>
               <!-- <div class="signup-link">Not a member? <a href="register.php">Signup now </a></div> -->
            </form>
        </div>
    </div>
</body>
</html>