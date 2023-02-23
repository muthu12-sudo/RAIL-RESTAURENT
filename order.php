<?php
include('db_connect.php');
session_start();
if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true && isset($_SESSION['username'])){
    $username = $_SESSION['username'];
} else {
    header('Location: index.php');
    exit;
}

//storing data to database
$username = $_SESSION['username'];
$message = ""; // Initialize the message variable

if(isset($_POST['name']) && isset($_POST['username']) && isset($_POST['from']) && isset($_POST['to']) && isset($_POST['train-number']) && isset($_POST['ticket-number']) && isset($_POST['phone-number']) && isset($_POST['compartment']) && isset($_POST['seat-number'])) {

  // Retrieve form data
  $name = $_POST['name'];
  $username = $_POST['username'];
  $from = $_POST['from'];
  $to = $_POST['to'];
  $trainNumber = $_POST['train-number'];
  $ticketNumber = $_POST['ticket-number'];
  $phoneNumber = $_POST['phone-number'];
  $compartment = $_POST['compartment'];
  $seatNumber = $_POST['seat-number'];
  $orderno = $_POST['order-no'];

  //sends to payments.php
  $_SESSION['orderno'] = $orderno;
  // Validate phone number length
   // Validate phone number length
  if(strlen($phoneNumber) != 10) {
    $phone_error = "Phone number must be 10 digits.";
  } 
    // Insert data into database
    else{
    $query = "INSERT INTO details (name, username, from_location, to_location, train_number, ticket_number, phone_number, compartment, seat_number,order_no) VALUES ('$name', '$username', '$from', '$to', '$trainNumber', '$ticketNumber', '$phoneNumber', '$compartment', '$seatNumber', '$orderno')";
    $result = mysqli_query($conn, $query);

    if($result) {
      $message = "User Details submitted successfully. Redirecting to Payment in 5 sec";
    } else {
      $message = "Error submitting order: " . mysqli_error($conn);
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order | Rail Restaurant | Pure Good Delivery | 24/7 Service | Fastest Food Delivery</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/payments.css" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="icon" href="images/icon.png" type="image/png" />
    <link href="https://fonts.googleapis.com/css2?family=Zeyada&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

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
                <form name="userdetails" method="post">
                            <h3 align="center">User Details</h3>
                            <div class="row">

                            <div class="col-50">
                            <label for="username">Username:</label>
                            <input type="text" id="username" name="username" value="<?php echo $username; ?>" readonly><br>
                            <label for="name">Name:</label>
                            <input type="text" id="name" name="name" required><br>
                            <div class="row">
                                <div class="col-50">
                                    <label for="from">From:</label>
                                    <select id="from" class="form-select" name="from" required>
                                    <option value="">--Please select--</option>
                                    <option value="Chennai">Chennai</option>
                                    <option value="Madurai">Madurai</option>
                                    <option value="Vilupuram">Vilupuram</option>
                                    <option value="Coimbatore">Coimbatore</option>
                                    <option value="Kanniyakumari">Kanniyakumari</option>
                                    <option value="Theni">Theni</option>
                                    <option value="Dindigul">Dindigul</option>
                                </select>
                                </div>
                                <div class="col-50">
                                    <label for="to">To:</label>
                                    <select class="form-select" id="to" name="to" required>
                                    <option value="">--Please select--</option>
                                    <option value="Coimbatore">Coimbatore</option>
                                    <option value="Theni">Theni</option>
                                    <option value="Madurai">Madurai</option>
                                    <option value="Vilupuram">Vilupuram</option>
                                    <option value="Dindigul">Dindigul</option>
                                    <option value="Kanniyakumari">Kanniyakumari</option>
                                    <option value="Chennai">Chennai</option>
                                </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="train-number">Train Number:</label>
                                    <input type="text" id="train-number" name="train-number" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="ticket-number">Ticket Number:</label>
                                    <input type="number" id="ticket-number" name="ticket-number" required><br>
                                </div>
                            </div>
                        </div>
                        <div class="col-50">
                            <label for="phone-number">Phone Number:</label>
                            <input type="number" id="phone-number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" name="phone-number" maxlength="10" required>
                            <div class="row">
                                <div class="col-50">
                                    <label for="compartment">Compartment:</label>
                                    <select id="compartment" name="compartment" required>
                                    <option value="">--Please select--</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                </select><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="seat-number">Seat Number:</label>
                                    <input type="number" id="seat-number" name="seat-number" required><br>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-50">
                                    <label for="order-no">Order No:</label><br>
                                    <span style='font-size:12px;'>(Please Give a Order Before Enter)</span><br>
                                    <select id="order-no" name="order-no" required>
            <option value="">--Please select--</option>
            <?php
          $res = mysqli_query($conn, "SELECT order_no FROM orders where username='$username'");
          while ($row = $res->fetch_assoc()) {
            $orderno = $row['order_no'];
             echo "<option value='$orderno'>$orderno</option>";
           }
        ?>
        </select><br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input id="target" type="submit" value="Submit">
                    <span id=span_color style="color: <?= ($message == 'User Details submitted successfully. Redirecting to Payment in 5 sec') ? 'green' : 'red' ?>">
            <?= $message ?>
        </span>
                </form>
            </div>
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
    <script src="script/order.js">
    </script>
</body>

</html>