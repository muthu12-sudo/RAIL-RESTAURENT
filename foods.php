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
    <title>Foods | Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
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
            <a href="menu.html">
                <li>Menu Card</li>
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
            <button id="clear-all" type="reset" style="margin-bottom:10px;">Clear All</button>
        </div>
    </form>
    </div>
    <br>
    <!--FOODS ROW 1-->
    <div id="products-container">
        <div class="product">
            <h2>IDLY</h2>
            <img src="images/idly.jpg" alt="Idly">
            <p>₹30<br>4 Idly Per Set</p>
            <div class="quantity">
                <button id="minus-1">-</button>&nbsp;
                <span id="quantity-1">0</span>&nbsp;
                <button id="plus-1" style="border-radius: 0 10px 10px 0;">+</button>
            </div>

        </div>
        <div class="product">
            <h2>DOSA</h2>
            <img src="images/dosa.jpg" alt="Dosa">
            <p>₹40<br>2 Dosa Per Set</p>
            <div class="quantity">
                <button id="minus-2">-</button>&nbsp;
                <span id="quantity-2">0</span>&nbsp;
                <button id="plus-2" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>ROTI</h2>
            <img src="images/roti.jpg" alt="Roti">
            <p>₹30<br>2 Roti Per Set</p>
            <div class="quantity">
                <button id="minus-3">-</button>&nbsp;
                <span id="quantity-3">0</span>&nbsp;
                <button id="plus-3" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>PONGAL</h2>
            <img src="images/pongal.jpg" alt="Pongal">
            <p>₹50<br>300 grm</p>
            <div class="quantity">
                <button id="minus-4">-</button>&nbsp;
                <span id="quantity-4">0</span>&nbsp;
                <button id="plus-4" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <!--FOODS ROW 2-->
        <div class="product">
            <h2>VADA</h2>
            <img src="images/vada.jpg" alt="Vada">
            <p>₹10<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-5">-</button>&nbsp;
                <span id="quantity-5">0</span>&nbsp;
                <button id="plus-5" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>TEA</h2>
            <img src="images/tea.jpg" alt="Tea">
            <p>₹10<br>Per 1 Cup</p>
            <div class="quantity">
                <button id="minus-6">-</button>&nbsp;
                <span id="quantity-6">0</span>&nbsp;
                <button id="plus-6" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>COFFEE</h2>
            <img src="images/coffee.jpg" alt="Coffee">
            <p>₹15<br>Per 1 Cup</p>
            <div class="quantity">
                <button id="minus-7">-</button>&nbsp;
                <span id="quantity-7">0</span>&nbsp;
                <button id="plus-7" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>MILK</h2>
            <img src="images/milk.jpg" alt="Milk">
            <p>₹10<br>100 ml</p>
            <div class="quantity">
                <button id="minus-8">-</button>&nbsp;
                <span id="quantity-8">0</span>&nbsp;
                <button id="plus-8" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <!--FOODS ROW 3-->
        <div class="product">
            <h2>POORI</h2>
            <img src="images/poori.jpg" alt="Poori">
            <p>₹25<br>2 per set</p>
            <div class="quantity">
                <button id="minus-9">-</button>&nbsp;
                <span id="quantity-9">0</span>&nbsp;
                <button id="plus-9" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>BAJJI</h2>
            <img src="images/bajji.jpg" alt="Bajji">
            <p>₹10<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-10">-</button>&nbsp;
                <span id="quantity-10">0</span>&nbsp;
                <button id="plus-10" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>SAMOSA</h2>
            <img src="images/samosa.jpg" alt="Samosa">
            <p>₹10<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-11">-</button>&nbsp;
                <span id="quantity-11">0</span>&nbsp;
                <button id="plus-11" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>EGG PUFFS</h2>
            <img src="images/eggpuffs.jpg" alt="Egg Puffs">
            <p>₹20<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-12">-</button>&nbsp;
                <span id="quantity-12">0</span>&nbsp;
                <button id="plus-12" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <!--FOODS ROW 4-->
        <div class="product">
            <h2>CHICKEN PUFFS</h2>
            <img src="images/cpuffs.jpg" alt="Chicken Puffs">
            <p>₹30<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-13">-</button>&nbsp;
                <span id="quantity-13">0</span>&nbsp;
                <button id="plus-13" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>BISCUITS</h2>
            <img src="images/biscuits.jpg" alt="Biscuits">
            <p>₹10 - ₹100<br>as Per the Brand</p>
            <div class="quantity">
                <button id="minus-14">-</button>&nbsp;
                <span id="quantity-14">0</span>&nbsp;
                <button id="plus-14" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>PLAIN BRIYANI</h2>
            <img src="images/briyani.jpg" alt="Briyani">
            <p>₹70<br>750 grm</p>
            <div class="quantity">
                <button id="minus-15">-</button>&nbsp;
                <span id="quantity-15">0</span>&nbsp;
                <button id="plus-15" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>EGG BRIYANI</h2>
            <img src="images/eggbriyani.jpg" alt="Egg Briyani">
            <p>₹80<br>1 Egg + 750 grm</p>
            <div class="quantity">
                <button id="minus-16">-</button>&nbsp;
                <span id="quantity-16">0</span>&nbsp;
                <button id="plus-16" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <!--FOODS ROW 5-->
        <div class="product">
            <h2>CHICKEN BRIYANI</h2>
            <img src="images/cbriyani.jpg" alt="Chicken Briyani">
            <p>₹120<br>250 grm Chicken + 750 grm</p>
            <div class="quantity">
                <button id="minus-17">-</button>&nbsp;
                <span id="quantity-17">0</span>&nbsp;
                <button id="plus-17" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>FISH BRIYANI</h2>
            <img src="images/fishbiriyani.jpg" alt="Fish Briyani">
            <p>₹150<br>100 grm Fish Meat + 750 grm</p>
            <div class="quantity">
                <button id="minus-18">-</button>&nbsp;
                <span id="quantity-18">0</span>&nbsp;
                <button id="plus-18" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>FISH CURRY</h2>
            <img src="images/fish.jpg" alt="Fish Biriyani">
            <p>₹100<br>500 ml (Curry Only)</p>
            <div class="quantity">
                <button id="minus-19">-</button>&nbsp;
                <span id="quantity-19">0</span>&nbsp;
                <button id="plus-19" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>PAROTA</h2>
            <img src="images/parota.jpg" alt="Parota">
            <p>₹10<br>Per 1 Piece</p>
            <div class="quantity">
                <button id="minus-20">-</button>&nbsp;
                <span id="quantity-20">0</span>&nbsp;
                <button id="plus-20" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <!--FOODS ROW 6-->
        <div class="product">
            <h2>FULL MEALS</h2>
            <img src="images/fullmeals.webp" alt="Full Meals">
            <p>₹100<br>Per 1 set</p>
            <div class="quantity">
                <button id="minus-21">-</button>&nbsp;
                <span id="quantity-21">0</span>&nbsp;
                <button id="plus-21" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>HALF MEALS</h2>
            <img src="images/halfmeals.jpg" alt="Half Meals">
            <p>₹60<br>1/2 Set</p>
            <div class="quantity">
                <button id="minus-22">-</button>&nbsp;
                <span id="quantity-22">0</span>&nbsp;
                <button id="plus-22" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>CURD RICE</h2>
            <img src="images/curd.jpg" alt="Curd Rice">
            <p>₹30<br>500 grm</p>
            <div class="quantity">
                <button id="minus-23">-</button>&nbsp;
                <span id="quantity-23">0</span>&nbsp;
                <button id="plus-23" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
        <div class="product">
            <h2>LEMON RICE</h2>
            <img src="images/lemon.jpg" alt="Lemon Rice">
            <p>₹30<br>500 grm</p>
            <div class="quantity">
                <button id="minus-24">-</button>&nbsp;
                <span id="quantity-24">0</span>&nbsp;
                <button id="plus-24" style="border-radius: 0 10px 10px 0;">+</button>
            </div>
        </div>
    </div>
    <script src="script/products.js">
    </script>
</body>

</html>