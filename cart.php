<?php
session_start();
require 'connection.php';
$conn = Connect();

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit();
}

/* ================= ADD TO CART ================= */
if (isset($_POST["add"])) {

    $food_id = (int) $_GET["id"];
    $qty     = (int) $_POST["quantity"];
    $from    = isset($_POST["from"]) ? $_POST["from"] : 'normal';

    $query = mysqli_query($conn,
        "SELECT F_ID, name, price, is_offer, offer_price, offer_quantity, R_ID
         FROM food WHERE F_ID = $food_id"
    );

    $food = mysqli_fetch_assoc($query);

    if (!$food) {
        echo "<script>alert('Food item not found');window.location='foodlist.php';</script>";
        exit();
    }

    /* ================= FLOW DECISION ================= */

    if ($from === 'offer') {

        if ($food['is_offer'] != 1) {
            echo "<script>alert('Invalid offer item');window.location='offers.php';</script>";
            exit();
        }

        if ($qty > $food['offer_quantity']) {
            echo "<script>
                alert('Only {$food['offer_quantity']} items available for this offer');
                window.location='offers.php';
            </script>";
            exit();
        }

        $price    = $food['offer_price'];
        $is_offer = 1;

    } else {

        $price    = $food['price'];
        $is_offer = 0;
    }

    /* ================= CART SESSION ================= */

    if (!isset($_SESSION["cart"])) {
        $_SESSION["cart"] = array();
    }

    $item_ids = array_column($_SESSION["cart"], "food_id");

    if (in_array($food_id, $item_ids)) {
        echo "<script>alert('Item already in cart');window.location='cart.php';</script>";
        exit();
    }

    $_SESSION["cart"][] = array(
        'food_id'       => $food_id,
        'food_name'     => $food['name'],
        'food_price'    => $price,
        'food_quantity' => $qty,
        'R_ID'          => $food['R_ID'],
        'is_offer'      => $is_offer
    );

    echo "<script>window.location='cart.php';</script>";
    exit();
}


/* ================= REMOVE ITEM ================= */
if (isset($_GET["action"]) && $_GET["action"] === "delete") {

    if(isset($_SESSION["cart"])){

        foreach ($_SESSION["cart"] as $key => $item) {
            if ($item["food_id"] == $_GET["id"]) {
                unset($_SESSION["cart"][$key]);
                break;
            }
        }

    }

    echo "<script>window.location='cart.php';</script>";
    exit();
}


/* ================= EMPTY CART ================= */
if (isset($_GET["action"]) && $_GET["action"] === "empty") {

    unset($_SESSION["cart"]);

    echo "<script>window.location='cart.php';</script>";
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Cart | Spice Box</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/cart.css">

</head>

<body>

<?php if (!empty($_SESSION["cart"])) { ?>

<div class="container">

<div class="jumbotron">
<h1>Your Shopping Cart</h1>
<p>Almost there 😋</p>
</div>

<table class="table table-bordered table-striped">

<thead>

<tr>
<th>Food</th>
<th>Qty</th>
<th>Price</th>
<th>Total</th>
<th>Action</th>
</tr>

</thead>

<?php
$total = 0;

foreach ($_SESSION["cart"] as $item) {

$lineTotal = $item['food_quantity'] * $item['food_price'];
$total += $lineTotal;
?>

<tr>

<td>

<?php echo $item['food_name']; ?>

<?php if ($item['is_offer'] == 1) { ?>

<span class="label label-success">Offer</span>

<?php } ?>

</td>

<td><?php echo $item['food_quantity']; ?></td>

<td>₹<?php echo $item['food_price']; ?></td>

<td>₹<?php echo $lineTotal; ?></td>

<td>

<a href="cart.php?action=delete&id=<?php echo $item['food_id']; ?>" class="text-danger">
Remove
</a>

</td>

</tr>

<?php } ?>

<tr>

<td colspan="3" align="right">
<strong>Total</strong>
</td>

<td>
<strong>₹<?php echo $total; ?></strong>
</td>

<td></td>

</tr>

</table>

<a href="cart.php?action=empty" class="btn btn-danger">Empty Cart</a>

<a href="foodlist.php" class="btn btn-warning">Continue Shopping</a>

<a href="payment.php" class="btn btn-success pull-right">Checkout</a>

</div>

<?php } else { ?>

<div class="container">

<div class="jumbotron">

<h1>Your Shopping Cart</h1>

<p>No items found. <a href="foodlist.php">Order now</a></p>

</div>

</div>

<?php } ?>

</body>
</html>