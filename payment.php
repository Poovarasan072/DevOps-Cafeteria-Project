<?php
session_start();
require 'connection.php';
$conn = Connect();

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit();
}

$gtotal = 0;
$username = $_SESSION["login_user2"];

/* ================= PLACE ORDERS ================= */
if (!empty($_SESSION["cart"])) {

    foreach ($_SESSION["cart"] as $item) {

        $F_ID     = mysqli_real_escape_string($conn, $item["food_id"]);
        $foodname = mysqli_real_escape_string($conn, $item["food_name"]);
        $quantity = (int)$item["food_quantity"];
        $price    = (float)$item["food_price"];
        $R_ID     = mysqli_real_escape_string($conn, $item["R_ID"]);
        $is_offer = (int)$item["is_offer"];

        $total = $quantity * $price;
        $gtotal += $total;

        /* INSERT ORDER 
           Note: order_date removed because DB auto handles it */
        $insert = "
            INSERT INTO orders
            (F_ID, foodname, price, quantity, username, R_ID)
            VALUES
            ('$F_ID', '$foodname', '$price', '$quantity', '$username', '$R_ID')
        ";

        if (!mysqli_query($conn, $insert)) {
            echo "<script>alert('Order failed');window.location='cart.php';</script>";
            exit();
        }

        /* ================= OFFER STOCK REDUCTION ================= */
        if ($is_offer == 1) {

            $updateOffer = "
                UPDATE food
                SET offer_quantity = offer_quantity - $quantity
                WHERE F_ID = '$F_ID'
                AND is_offer = 1
                AND offer_quantity >= $quantity
            ";

            mysqli_query($conn, $updateOffer);

            /* AUTO DISABLE OFFER WHEN ZERO */
            mysqli_query($conn, "
                UPDATE food
                SET is_offer = 0
                WHERE F_ID = '$F_ID' 
                AND offer_quantity <= 0
            ");
        }
    }

    /* CLEAR CART AFTER SUCCESS */
    unset($_SESSION["cart"]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment | Spice Box</title>
    <link rel="stylesheet" href="css/payment.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<div class="container">
    <div class="jumbotron text-center" style="background:#fff3cd; border-radius:15px;">
        <h1 style="color:#d35400;">🎉 Order Process!</h1>
        <p style="font-size:18px;">Your delicious food is being prepared 😋</p>
    </div>
</div>

<h2 class="text-center" style="color:#27ae60;">
    Grand Total: ₹<?= number_format($gtotal, 2); ?>/-
</h2>

<h5 class="text-center text-muted">
    Including all service charges (No delivery charge)
</h5>

<br>

<div class="text-center">
    <a href="foodlist.php" class="btn btn-warning btn-lg">
        🍽 Continue Ordering
    </a>

    <a href="onlinepay.php" class="btn btn-success btn-lg">
        💳 Pay Online
    </a>

    <a href="COD.php" class="btn btn-primary btn-lg">
        💵 Cash On Delivery
    </a>
</div>

</body>
</html>
