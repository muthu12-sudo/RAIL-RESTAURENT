<?php
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
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
            <li><a href="foods.php">Foods</a></li>
            <li><a href="menu.php">Menu Card</a></li>
            <li><a href="pillow.php">Pillow & Blankets</a></li>
            <li><a href="kids.php">Kids</a></li>
            <li><a href="medicine.php">Medicine</a></li>
            <li><a href="contact.php">Emergency Help</a></li>
            <li><a href="index.php">Logout</a></li>
        </ul>
    </nav>
    <h1 class="head"><b><?php echo 'Welcome, '. $username. ' 💖'; ?><b></h1>

    <div class="product">
        <div class="container" id="contain">
            <center>
                <img src="images/image1.jpg" /><br>
            </center>
            Rail Restaurant is a Service Which Provides the Essential Foods and Supplies to the Travelers Who Seeks for
            it 💞
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image2.jpg" /><br>
            </center>
            You Don't Have To Wait Anymore for Arrival of Seller to Buy Foods or Snacks 😕. You Can Simply Place Your
            Order While Traveling With Your Mobile or Laptop 🤗
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image3.jpg" /><br>
            </center>
            Fastest Delivery to your Trainstep as much as Possible 😇. We Promise You to Never Miss your Train 😜
        </div>
    </div>
    <div class="product">
        <div class="container" id="contain">
            <center>
                <img src="images/image1.jpg" /><br>
            </center>
            Rail Restaurant is a Service Which Provides the Essential Foods and Supplies to the Travelers Who Seeks for
            it 💞
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image3.jpg" /><br>
            </center>
            Fastest Delivery to your Trainstep as much as Possible 😇. We Promise You to Never Miss your Train 😜
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image4.jpg" /><br>
            </center>
            No More AMBI Moments Like Shout Out the "TTR..." for any Inconvenience of Foods 🤣. We are Here to Give You
            High Quality and Healthy Foods 😋
        </div>
    </div>
    <div class="order">
        <a href="order.php">Place Your Order</a>
    </div>
    <br>
</body>

</html>