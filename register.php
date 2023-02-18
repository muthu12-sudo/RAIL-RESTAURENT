<?php
include_once("db_connect.php");

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
	if($username=="")
	{
		$username_error="Please Provide Username";
	}
	elseif($cpassword==""){
		$cpassword_error="Please Provide Password";
	}
	elseif(strlen($password)<6)
	{
		$password_error="Please Provide 6 digit Password";
	}
    elseif ($password != $cpassword) {
        $password_error = "Password and Confirm Password does not match";
	}
	else{ 
	$ruser = "SELECT username FROM users where username='$username'";
	$result1=mysqli_query($conn,$ruser);
	if(mysqli_num_rows($result1)>0){
		$username_error="username already exists";
	}
	else {
        $password = md5($password);
        $query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        $result = mysqli_query($conn,$query); 
        
        if ($result) {
            $success_message = "Sign up successful! Please log in.";
        } else {
            $error_message = "Sign up failed, please try again.";
        }
    }
}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Rail Restaurant | Sign up </title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
</head>

<body>
    <!--Title-->
    <div class="title" style="border:#FFFFFF">
        <img src="images/icon.png" width="70px" height="70px" align="center" alt="logo" />
        <b>RAIL RESTAURANT</b>
    </div>

    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-4 offset-md-4 well border-1 p-4 mb-3">
                    <h2>Sign Up</h2>
                    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username" placeholder="Enter Username" class="form-control" />
                            <span class="text-danger"><?php if (isset($username_error)) echo $username_error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" name="password" placeholder="Your Password" class="form-control" />
                            <span class="text-danger"><?php if (isset($password_error)) echo $password_error; ?></span>
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" name="cpassword" placeholder="Your Password" class="form-control" />
                            <span
                                class="text-danger"><?php if (isset($cpassword_error)) echo $cpassword_error; ?></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" value="Sign Up" class="btn btn-primary" />
                        </div>

                    </form>
                    <span class="text-success"><?php if (isset($success_message)) { echo $success_message; } ?></span>
                    <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 offset-md-4 text-center">
                    Already Registered? <a href="index.php">Login Here</a>
                </div>
            </div>
        </div>
    </div>
</body>

</html>