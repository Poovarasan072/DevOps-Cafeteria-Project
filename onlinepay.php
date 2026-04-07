<?php
session_start();
require 'connection.php';
$conn = Connect();

if(!isset($_SESSION['login_user2']) || !isset($_SESSION['cart'])){
    header("location: customerlogin.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title> Online Payment | Spice Box </title>

    <link rel="stylesheet" type="text/css" href="css/COD.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Spice Box</a>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span>
                Welcome <?php echo $_SESSION['login_user2']; ?>
            </a></li>
            <li><a href="cart.php"><span class="glyphicon glyphicon-shopping-cart"></span> Cart</a></li>
            <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
        </ul>
    </div>
</nav>

<br><br><br>

<div class="container">
    <div class="jumbotron text-center">
        <h2>Online Payment</h2>
        <p>Select payment method</p>
    </div>

    <div class="col-md-6 col-md-offset-3">

        <form method="POST" action="payment.php">

            <!-- PAYMENT MODE -->
            <div class="form-group text-center">
                <label>
                    <input type="radio" name="payment_mode" value="CARD" checked> Debit / Credit Card
                </label>
                &nbsp;&nbsp;&nbsp;
                <label>
                    <input type="radio" name="payment_mode" value="UPI"> UPI
                </label>
            </div>

            <!-- CARD PAYMENT -->
            <div id="cardDiv">
                <h4>Card Details</h4>

                <input type="text" class="form-control" placeholder="Card Number" required>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="MM" required>
                    </div>
                    <div class="col-md-4">
                        <input type="text" class="form-control" placeholder="YY" required>
                    </div>
                    <div class="col-md-4">
                        <input type="password" class="form-control" placeholder="CVV" required>
                    </div>
                </div>
                <br>

                <input type="text" class="form-control" placeholder="Name on Card" required>
            </div>

            <!-- UPI PAYMENT -->
            <div id="upiDiv" style="display:none;">
                <h4>UPI Payment</h4>
                <input type="text" name="upi_id" class="form-control" placeholder="example@upi">
                <br>
                <p class="text-info">
                    You will receive a UPI payment request
                </p>
            </div>

            <br>

            <div class="row">
                <div class="col-md-6">
                    <a href="cart.php" class="btn btn-danger btn-block">Cancel</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-success btn-block">
                        Pay Now
                    </button>
                </div>
            </div>

        </form>

    </div>
</div>

<script>
$("input[name='payment_mode']").change(function(){
    if($(this).val() === "UPI"){
        $("#upiDiv").show();
        $("#cardDiv").hide();
    } else {
        $("#cardDiv").show();
        $("#upiDiv").hide();
    }
});
</script>

</body>
</html>
