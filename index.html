<?php
include_once("db_connect.php");

if(isset($_SESSION['username'])!="") {
	header("Location: index.php");
}
  if (isset($_POST['submit'])) {
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	
	// check if the username and password match the records in the database
	$query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
	$result = mysqli_query($conn, $query); 
	
	if (mysqli_num_rows($result) > 0) {
	  // start a session and set a session variable to indicate the user is logged in
	  session_start();
      $_SESSION['username'] = $username;
	  $_SESSION['logged_in'] = true;
	  // redirect to the protected page
	  header('Location: home.php');
	  exit;
	} else {
	  // show an error message
	  $error_message="Invalid username or password";
	}
  }
  ?>
	<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="css/bootstrap.css" crossorigin="anonymous">
        <style type="text/css">
            body {
                font: 14px sans-serif;
            }
            
            .wrapper {
                padding: 60px;
                margin: 0 auto;
            }
            
            .wrapper h2 {
                margin-top: 0px;
                text-align: center;
            }
            
            .wrapper p {
                text-align: center;
            }
            
            .border-1 {
                border: 1px solid #ddd;
				
            }
        </style>
		 <title>Rail Restaurant | Log in </title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    </head>
    <body>
	<!--Title-->
    <div class="title" style="border:#FFFFFF">
        <img src="images/icon.png" width="70px" height="70px" align="center" alt="logo" />
        <b>RAIL RESTAURANT</b>
    </div>
        <div class="wrapper">
            <div class="container" >
                <div class="row" >
                    <div class="col-md-4 offset-md-4 well border-1 p-4 mb-3">
                        <h2>Login</h2>
                        <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                            <div class="form-group">
                                <label for="phone">username</label>
                                <input type="text" name="username" placeholder="Enter Username" class="form-control" />
                            </div>
                            <div class="form-group">
                                <label for="name">Password</label>
                                <input type="password" name="password" placeholder="Enter Password" class="form-control" />
                            </div>
                            <div class="form-group">
								<input type="submit" name="submit" value="Login" class="btn btn-primary" />
                            </div>
                        </form>
                        <span class="text-danger"><?php if (isset($error_message)) { echo $error_message; } ?></span>
                    </div>
                </div>
            </div>
            <div class="row">
				<div class="col-md-4 offset-md-4 text-center">	
				New User? <a href="register.php">Sign Up Here</a>
				</div>
			</div>
		</div>
        </div>
    </body>

    </html>
