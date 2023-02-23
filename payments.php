<?php
include('db_connect.php');
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}
$order_no = $_SESSION['orderno'];
// select data from the orders table
$query = "SELECT * FROM orders WHERE order_no='$order_no' AND username='$username'";
$result = mysqli_query($conn, $query);

// loop through the results and store values into variables
while ($row = mysqli_fetch_assoc($result)) {
    $total_quantity = $row['total_quantity'];
    $total_price = $row['total_price'];
    // do something with the variables here
}
if (isset($_POST['submit'])) {
$error=false;
$fullname=$_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expmonth = $_POST['expmonth'];
$cvv = $_POST['cvv'];

if(!filter_var($email,FILTER_VALIDATE_EMAIL)) {
  $error = true;
  $email_error = "Please Enter Valid Email ID";
}
elseif(strlen($cardnumber)<16) {
  $error = true;
  $card_error = "Please Enter Valid Card Number";
}
if(!$error){
  $otp = mt_rand(100000,999999); 
  $_SESSION['otp'] = $otp;
  $query="INSERT INTO payment(otp,username,fullname, email, address,city,state,zip,total_price,cardname,cardnumber,expmonth,cvv,total_quantity,order_no) 
  VALUES('" . $otp . "','" . $username . "','" . $fullname . "', '" . $email . "', '" . $address . "', '" . $city . "', '" . $state . "', '" . $zip . "', '" . $total_price . "', '" . $cardname . "','" . $cardnumber . "', '" . $expmonth . "', '" . $cvv . "', '" . $total_quantity . "', '" . $order_no . "')";
  $result = mysqli_query($conn,$query);
   if ($result) {
    header("Location:confirm.php");
}
}
}
?>

<!DOCTYPE html>
<html lang="en">

</html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment | Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/payments.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <div class="col-50">
                            <h3>Billing Address</h3>
                            <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                            <input type="text" id="fname" name="fullname" placeholder="<?php echo $username; ?>">
                            <label for="email"><i class="fa fa-envelope"></i> Email</label>
                            <span class="text-danger"><?php if (isset($email_error)) echo $email_error; ?></span><br>
                            <input type="text" id="email" name="email" placeholder="abc@example.com">
                            <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                            <input type="text" id="adr" name="address" placeholder="15 North Street">
                            <label for="city"><i class="fa fa-institution"></i> City</label>
                            <input type="text" id="city" name="city" placeholder="Chennai">

                            <div class="row">
                                <div class="col-50">
                                    <label for="state">State</label>
                                    <input type="text" id="state" name="state" placeholder="Tamilnadu">
                                </div>
                                <div class="col-50">
                                    <label for="zip">Zip</label>
                                    <input type="number" id="zip" name="zip" placeholder="600001">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="total_price">Total ₹</label>
                                    <input type="text" name="total_price" value="<?php echo '₹'.$total_price; ?>"
                                        readonly>
                                </div>
                            </div>
                        </div>

                        <div class="col-50">
                            <h3>Payment</h3>
                            <label for="fname">Accepted Cards</label>
                            <div class="icon-container">
                                <i class="fa fa-cc-visa" style="color:navy;"></i>
                                <i class="fa fa-cc-amex" style="color:blue;"></i>
                                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                <i class="fa fa-cc-discover" style="color:orange;"></i>
                            </div>
                            <label for="cname">Name on Card</label>
                            <input type="text" id="cname" name="cardname" placeholder="<?php echo $username; ?>">
                            <label for="ccnum">Credit card number</label>
                            <input type="number" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444"
                                maxlength="16"
                                oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            <span class="text-danger"><?php if (isset($card_error)) echo $card_error; ?></span><br>
                            <label for="expmonth">Exp Month</label>
                            <select type="month" id="expmonth" name="expmonth" placeholder="September">
                                <option selected value=''>--Select Month--</option>
                                <option value='1'>Janaury</option>
                                <option value='2'>February</option>
                                <option value='3'>March</option>
                                <option value='4'>April</option>
                                <option value='5'>May</option>
                                <option value='6'>June</option>
                                <option value='7'>July</option>
                                <option value='8'>August</option>
                                <option value='9'>September</option>
                                <option value='10'>October</option>
                                <option value='11'>November</option>
                                <option value='12'>December</option>
                            </select>
                            <div class="row">
                                <div class="col-50">
                                    <label for="expyear">Exp Year</label>
                                    <input type="number" id="expyear" name="expyear" placeholder="2018"
                                        placeholder="YYYY" min="1999" max="2050">
                                </div>
                                <div class="col-50">
                                    <label for="cvv">CVV</label>
                                    <input type="number" id="cvv" name="cvv"
                                        oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                        placeholder="352" maxlength="3">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="total_quantity">Total Quantity</label>
                                    <input type="text" name="total_quantity" value="<?php echo $total_quantity; ?>"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>
                        <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
                    </label>
                    <input type="submit" name="submit" value="Continue to checkout" class="btn">
                </form>
            </div>
        </div>
</body>

</html>