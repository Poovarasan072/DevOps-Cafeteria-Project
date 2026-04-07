<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit();
}

$conn = Connect();
?>

<!DOCTYPE html>
<html>
<head>
    <title>🔥 Offers | Spice Box</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/foodlist.css">
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search">
<div class="container">

    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php">Spice Box</a>
    </div>

    <div class="collapse navbar-collapse" id="myNavbar">

        <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">

            <li>
                <a href="#">
                    <span class="glyphicon glyphicon-user"></span>
                    Welcome <?php echo $_SESSION['login_user2']; ?>
                </a>
            </li>

            <li>
                <a href="foodlist.php">
                    <span class="glyphicon glyphicon-cutlery"></span> Food Zone
                </a>
            </li>

            <li class="active">
                <a href="offers.php">🔥 Offers</a>
            </li>

            <li>
                <a href="cart.php">
                    <span class="glyphicon glyphicon-shopping-cart"></span>
                    Cart (<?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0; ?>)
                </a>
            </li>

            <li>
                <a href="logout_u.php">
                    <span class="glyphicon glyphicon-log-out"></span> Log Out
                </a>
            </li>

        </ul>

    </div>
</div>
</nav>

<!-- ================= HEADER ================= -->
<div class="jumbotron">
    <div class="container text-center">
        <h1>🔥 Special Offers</h1>
        <p>Limited stock · Grab it fast 😋</p>
    </div>
</div>

<!-- ================= OFFERS LIST ================= -->
<div class="container" style="width:95%;">

<?php
$sql = "
    SELECT *
    FROM food
    WHERE is_offer = 1
      AND offer_quantity > 0
      AND options = 'ENABLE'
    ORDER BY F_ID
";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $count = 0;

    while ($row = mysqli_fetch_assoc($result)) {

        if ($count % 4 == 0) echo "<div class='row'>";
?>

<div class="col-md-3">
<form method="POST" action="cart.php?action=add&id=<?php echo $row['F_ID']; ?>">

<div class="mypanel text-center">

    <img src="<?php echo $row['images_path']; ?>" class="img-responsive">

    <h4><?php echo $row['name']; ?></h4>

    <h5>
        <del>₹<?php echo $row['price']; ?></del><br>
        <span class="text-success"><strong>₹<?php echo $row['offer_price']; ?></strong></span>
    </h5>

    <p class="text-danger">
        Only <?php echo $row['offer_quantity']; ?> available
    </p>

    <!-- 🔒 Quantity limited to remaining offer stock -->
    <input type="number"
           name="quantity"
           value="1"
           min="1"
           max="<?php echo $row['offer_quantity']; ?>"
           class="form-control"
           style="width:70px;margin:auto;"
           required>

    <!-- 🔑 OFFER FLOW IDENTIFIER -->
    <input type="hidden" name="from" value="offer">

    <!-- Required for cart -->
    <input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
    <input type="hidden" name="hidden_price" value="<?php echo $row['offer_price']; ?>">
    <input type="hidden" name="hidden_RID" value="<?php echo $row['R_ID']; ?>">

    <br>

    <button type="submit" name="add" class="btn btn-success btn-sm">
        Add to Cart
    </button>

</div>
</form>
</div>

<?php
        $count++;
        if ($count % 4 == 0) echo "</div>";
    }

    if ($count % 4 != 0) echo "</div>";

} else {
    echo "<h4 class='text-center text-muted'>No offers available right now</h4>";
}
?>

</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</body>
</html>
