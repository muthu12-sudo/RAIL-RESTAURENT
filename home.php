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
    <link href="https://fonts.googleapis.com/css2?family=Bungee+Shade&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Stalemate&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Phudu&display=swap" rel="stylesheet">
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
            <a href="foods.php">
                <li>Foods</li>
            </a>
            <a href="order.php">
                <li>Orders</li>
            </a>
            <a href="pillow.php">
                <li>Pillow & Blankets</li>
            </a>
            <a href="kids.php">
                <li>Kids</li>
            </a>
            <a href="medicine.php">
                <li>Medicine</li>
            </a>
            <a href="party.php">
                <li>Party Decoration</li>
            </a>
            <a href="contact.php">
                <li>Emergency Help</li>
            </a>
            <a href="index.php">
                <li>Logout</li>
            </a>
        </ul>
    </nav>
    <h1 class="head"><b><?php echo 'Welcome, '. strtolower($username). ' !'; ?><b></h1>

    <div class="product">
        <div class="container" id="contain">
            <center>
                <img src="images/image1.jpg" /><br>
            </center>
            <p>Rail Restaurant is a Service Which Provides the Essential Foods and Supplies to the Travelers Who Seeks
                for
                it 💞</p>
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image2.jpg" /><br>
            </center>
            <p>You Don't Have To Wait Anymore for Arrival of Seller to Buy Foods or Snacks 😕</p>
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image4.jpg" /><br>
            </center>
            <p>No More AMBI Moments Like Shout Out the "TTR..." for any Inconvenience of Foods 🤣</p>
        </div>
    </div>
    <div class="product">
        <div class="container" id="contain">
            <center>
                <img src="images/image5.jpg" /><br>
            </center>
            <p>We are Here to Give You High Quality and Healthy Foods 😋</p>
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image6.jpg" /><br>
            </center>
            <p>We Promise You to Never Miss your Train 😜</p>
        </div>
        <div class="container" id="contain">
            <center>
                <img src="images/image3.jpg" /><br>
            </center>
            <p>Fastest Delivery to your Train step as soon as Possible 😇 </p>
        </div>

    </div>
    <br><br>
    <footer>
        <div class="footer">
            <h2 style="margin-top: 50px;">About Us</h2>
            <p>Rail Restaurant is a Private Organization which provides the service of supply and food delivery to the
                passengers of indian railway. The orders are noted through online mode and the food or supply are served
                at the required time.</p>
            <br>
            <h2>Contact Us</h2>
            <div class="num">
                <p>Manager: <span>+919876898789</span></p>
                <p>Partner: <span>+917687656789</span></p>
                <p>Content Manager: <span>+919807678909</span></p>
                <p>Railway Service Partner: <span>+918273648987</span></p>
                <p>Transport Management: <span>+917898656789</span></p>
                <p>Support: <span>+919192934865</span></p>
                <p>Help or FAQ: <span>+917290346789</span></p>
            </div>
        </div>
        <div class="footer">
            <h2 style="margin-top:50px;color:#00c9b8;font-size:42px">RAIL RESTAURANT <sup>&copy;</sup></h2>
            <p style="line-height:3px;margin:0;font-size:16px">All Rights Reserved</p>
        </div>
    </footer>
</body>

</html>