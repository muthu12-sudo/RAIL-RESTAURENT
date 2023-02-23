<?php
//db connection
include_once("db_connect.php");
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}

$sql = "SELECT COUNT(*) AS order_no FROM orders WHERE username = '$username'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$num_orders = $row['order_no'];
// increment the order number if the user has one or more orders, otherwise set it to 1
if ($num_orders >= 0) {
  $order_no = $num_orders + 1;
} else {
  $order_no = 1;
}
//total quantity total price store on db
if (isset($_POST['total_quantity'], $_POST['total_price'])) {
    $total_price = $_POST["total_price"];
    $total_quantity = $_POST["total_quantity"];
    $query = "INSERT INTO orders (order_no,username, total_quantity, total_price) VALUES ('$order_no','$username', '$total_quantity','$total_price')";
    $result = mysqli_query($conn,$query);
    if ($result) {
        header("Location:order.php");
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kids | Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/foods.css" />
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
        <a href="home.php">
                <li>Home</li>
            </a>
            <a href="order.php">
                <li>Orders</li>
            </a>
            <a href="index.php">
                <li>Logout</li>
            </a>
        </ul>
    </nav>
    <form role="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div id="fixed">
            <div id="order-num-display">Order No: <?php echo $order_no;?></div>
            <div id="total-quantity-display">Total quantity: 0</div>
            <input type="hidden" name="total_quantity" id="total-quantity" value="0">
            <div id="total-price-display">Total price: ₹0.00</div>
            <input type="hidden" name="total_price" id="total-price" value="0">
            <button type="submit" id="order-now" disabled>Order Now</button>
            <button id="clear-all" type="reset" style="margin-bottom:10px;">Clear Selection</button>
        </div>
    </form>
    </div>
    <br>
    <!--ROW 1-->
    <div id="products-container">
        <div class="product">
            <h2>GRIPE WATER</h2>
            <img src="images/gripe.jpg" alt="Gripe Water">
            <p>₹80<br>For 1 bottle</p>
            <div class="quantity">
                <button id="minus-1">-</button>&nbsp;
                <span id="quantity-1">0</span>&nbsp;
                <button id="plus-1" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>NESTLE CERELAC</h2>
            <img src="images/cerelac.jpg" alt="Cerelac">
            <p>₹280<br>For 300g pack</p>
            <div class="quantity">
                <button id="minus-2">-</button>&nbsp;
                <span id="quantity-2">0</span>&nbsp;
                <button id="plus-2" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>DIAPERS</h2>
            <img src="images/diaper.jpg" alt="Diapers">
            <p>₹399<br>For 1 Pack</p>
            <div class="quantity">
                <button id="minus-3">-</button>&nbsp;
                <span id="quantity-3">0</span>&nbsp;
                <button id="plus-3" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>MILK FOR BABIES</h2>
            <img src="images/bottle.jpg" alt="Feeding Bottle">
            <p>₹120<br>For 250ml Milk + Feeding Bottle</p>
            <div class="quantity">
                <button id="minus-4">-</button>&nbsp;
                <span id="quantity-4">0</span>&nbsp;
                <button id="plus-4" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
    </div>
    <script src="script/kids.js">
    </script>
</body>

</html>