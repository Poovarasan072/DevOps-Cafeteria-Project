<?php
session_start();
?>

<html>
<head>
    <title> Home </title>
</head>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/index.css">

<body style="background-image: url(https://images.unsplash.com/photo-1554118811-1e0d58224f24?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1147&q=80);
background-repeat: no-repeat;
background-position: right top;
margin-right: 200px;
background-attachment: fixed;
background-size: 1550px 888px;">

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script type="text/javascript">
window.onscroll = function() { scrollFunction() };

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search" role="navigation">
<div class="container">

<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Spice Box</a>
</div>

<div class="collapse navbar-collapse" id="myNavbar">

<ul class="nav navbar-nav">
    <li class="active"><a href="index.php">Home</a></li>
    <li><a href="aboutus.php">About</a></li>
    <li><a href="contactus.php">Contact Us</a></li>
</ul>

<?php
if (isset($_SESSION['login_user1'])) {
?>

<!-- MANAGER NAVBAR -->
<ul class="nav navbar-nav navbar-right">
    <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user1']; ?></a></li>
    <li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
    <li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
</ul>

<?php
}
else if (isset($_SESSION['login_user2'])) {
?>

<!-- USER NAVBAR -->
<ul class="nav navbar-nav navbar-right">
    <li><a><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $_SESSION['login_user2']; ?></a></li>

    <li><a href="foodlist.php">
        <span class="glyphicon glyphicon-cutlery"></span> Food Zone
    </a></li>

    <!-- 🔥 OFFERS LINK ADDED -->
    <li><a href="offers.php">🔥 Offers</a></li>

    <li><a href="cart.php">
        <span class="glyphicon glyphicon-shopping-cart"></span> Cart
        (<?php
            if (isset($_SESSION["cart"])) {
                echo count($_SESSION["cart"]);
            } else {
                echo "0";
            }
        ?>)
    </a></li>

    <li><a href="logout_u.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
</ul>

<?php
}
else {
?>

<!-- GUEST NAVBAR -->
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="customersignup.php">User Sign-up</a></li>
        <li><a href="managersignup.php">Manager Sign-up</a></li>
    </ul>
</li>

<li class="dropdown">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span>
    </a>
    <ul class="dropdown-menu">
        <li><a href="customerlogin.php">User Login</a></li>
        <li><a href="managerlogin.php">Manager Login</a></li>
    </ul>
</li>
</ul>

<?php } ?>

</div>
</div>
</nav>

<div class="wide">
    <div class="col-xs-6 line"><hr></div>
    <div class="col-xs-2 logo center">
        <img src="images/Cafe.png">
    </div>
    <div class="col-xs-4 line"><hr></div>
    <div class="tagline" style="color:white">Grab your meal and Smile :)</div>
</div>

<div class="orderblock">
    <h2 style="color:white">Feeling Hungry?</h2>
    <center>
        <a class="btn btn-success btn-lg" href="customerlogin.php">Order Now</a>
    </center>
</div>

</body>
</html>
