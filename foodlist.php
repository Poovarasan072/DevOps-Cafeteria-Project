<?php
session_start();

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Explore | Spice Box</title>

<link rel="stylesheet" type="text/css" href="css/foodlist.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
  <span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script>
window.onscroll = function() { scrollFunction(); };

function scrollFunction() {
  document.getElementById("myBtn").style.display =
    (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20)
    ? "block" : "none";
}

function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}
</script>

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

<li class="active">
  <a href="foodlist.php">
    <span class="glyphicon glyphicon-cutlery"></span> Food Zone
  </a>
</li>

<li>
  <a href="offers.php">🔥 Offers</a>
</li>

<li>
  <a href="cart.php">
    <span class="glyphicon glyphicon-shopping-cart"></span>
    Cart (
    <?php echo isset($_SESSION["cart"]) ? count($_SESSION["cart"]) : 0; ?>
    )
  </a>
</li>

<li>
  <a href="my_orders.php">
    <span class="glyphicon glyphicon-list-alt"></span> My Orders
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

<div id="myCarousel" class="carousel slide" data-ride="carousel">
<div class="carousel-inner">
<div class="item active"><img src="images/slide002.jpg" style="width:100%;"></div>
<div class="item"><img src="images/slide001.jpg" style="width:100%;"></div>
<div class="item"><img src="images/slide003.jpg" style="width:100%;"></div>
</div>
</div>

<div class="jumbotron">
<div class="container text-center">
<h1>Welcome To Spice Box</h1>
</div>
</div>

<div class="container" style="width:95%;">

<?php
require 'connection.php';
$conn = Connect();

/*
IMPORTANT:
- NO offer logic here
- NO offer_quantity
- NO is_offer
*/
$sql = "SELECT * FROM food WHERE options='ENABLE' ORDER BY F_ID";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

$count = 0;
while ($row = mysqli_fetch_assoc($result)) {

if ($count == 0) echo "<div class='row'>";
?>

<div class="col-md-3">
<form method="post" action="cart.php?action=add&id=<?php echo $row['F_ID']; ?>">

<div class="mypanel text-center">
<img src="<?php echo $row['images_path']; ?>" class="img-responsive">

<h4><?php echo $row['name']; ?></h4>
<h5><?php echo $row['description']; ?></h5>

<h5 class="text-danger">₹<?php echo $row['price']; ?></h5>

<input type="number"
       name="quantity"
       value="1"
       min="1"
       max="25"
       class="form-control"
       style="width:60px;margin:auto;"
       required>

<input type="hidden" name="hidden_name" value="<?php echo $row['name']; ?>">
<input type="hidden" name="hidden_price" value="<?php echo $row['price']; ?>">
<input type="hidden" name="hidden_RID" value="<?php echo $row['R_ID']; ?>">

<!-- FORCE NORMAL FLOW -->
<input type="hidden" name="from" value="normal">

<input type="submit" name="add" class="btn btn-success" value="Add to Cart">
</div>

</form>
</div>

<?php
$count++;
if ($count == 4) {
    echo "</div>";
    $count = 0;
}
}
} else {
echo "<h3 class='text-center text-danger'>No food available</h3>";
}
?>

</div>
</body>
</html>
