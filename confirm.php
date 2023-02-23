<?php
include('db_connect.php');
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
$order = $_SESSION['orderno'];
$otp = $_SESSION['otp'];
if (isset($_POST['otp'])) {
    $cotp=$_POST['otp'];
    
    if($otp==$cotp){
        header("Location:thanks.html");
    }
    else{
        $error="Otp Doesn't Match, Please Enter the Correct Otp";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OTP Confirmation | Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/payments.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    #otp{
        text-align:center;
        
    }
</style>
</head>

<body class="rail">
    <!--Title-->
    <div class="title">
        <img src="images/icon.png" width="70px" height="70px" align="center.jpg" alt="logo" />
        <b>RAIL RESTAURANT</b>
    </div>

    <!--navbar-->
    <nav class="nav">
        <ul>
            <a href="home.php">
                <li>Home</li>
            </a>
            <a href="javascript:history.back()">
                <li>Previous Page</li>
            </a>
            <a href="index.php">
                <li>Logout</li>
            </a>
        </ul>
    </nav>
    <div class="row">
        <div class="col-75">
            <div class="container">
                <form name="otp" method="post">
                    <h3 align="center">Payment Confirmation</h3><br><br>
                    <div class="row">
                        <div class="col-50">
                            <center><label for="username" style="font-size:20px">Please Enter the One Time Password</label></center>
                            <input type="text" id="otp" name="otp" maxlength="6" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"><br>
                        </div>
                    </div>
                    <input id="target" type="submit" value="Submit">
                    <span style="color: red;"><?php if(isset($error)){ echo $error; } ?></span>
                </div>
        </div>
    </div>
</body>
</html>