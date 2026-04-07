<?php
session_start();
require 'connection.php';

$conn = Connect();

if(!isset($_SESSION['login_user2'])){
header("location: customerlogin.php"); 
exit();
}

unset($_SESSION["cart"]);
?>

<html>

<head>
<title> Cart | Spice Box </title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<style>

/* ===== CLEAR SHINY METALLIC BACKGROUND ===== */
body {
    background: linear-gradient(135deg, #f8f8f8, #ffffff, #e6e6e6);
    font-family: 'Segoe UI', sans-serif;
}

/* ===== ULTRA SHINY METALLIC NAVBAR ===== */
.navbar {
    background: linear-gradient(90deg, #0f3d2e, #3cb371, #0f3d2e);
    border: none;
    box-shadow: 0 6px 20px rgba(0,0,0,0.6);
}

.navbar-brand {
    font-weight: bold;
    font-size: 22px;
    color: #ffffff !important;
    letter-spacing: 1px;
    text-shadow: 0 0 12px rgba(255,255,255,0.9);
}

.navbar-nav > li > a {
    color: #ffffff !important;
    font-weight: bold;
    transition: 0.3s;
}

.navbar-nav > li > a:hover {
    background: rgba(255,255,255,0.25) !important;
    border-radius: 6px;
}

/* ===== SHINY SCROLL BUTTON ===== */
#myBtn {
    display: none;
    position: fixed;
    bottom: 20px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: none;
    background: linear-gradient(to bottom, #3cb371, #2e8b57);
    color: white;
    cursor: pointer;
    padding: 12px 15px;
    border-radius: 50%;
    font-size: 18px;
    box-shadow: 0 0 20px #2e8b57;
}

/* ===== GLOSSY METALLIC JUMBOTRON ===== */
.jumbotron {
    background: linear-gradient(
        145deg,
        #3cb371 0%,
        #2e8b57 40%,
        #2e8b57 60%,
        #3cb371 100%
    );
    color: white;
    border-radius: 18px;
    margin-top: 100px;
    box-shadow: 
        0 12px 35px rgba(0,0,0,0.5),
        inset 0 3px 12px rgba(255,255,255,0.35);
    border-top: 4px solid rgba(255,255,255,0.4);
}

/* ===== SUCCESS TITLE SHINE ===== */
.jumbotron h1 {
    font-weight: bold;
    text-shadow: 0 0 15px rgba(255,255,255,1);
}

/* ===== THANK YOU TEXT ===== */
h2 {
    font-weight: bold;
    color: #0f3d2e;
    text-shadow: 0 2px 4px rgba(0,0,0,0.2);
}

/* ===== ORDER NUMBER TITLE ===== */
h3 {
    margin-top: 30px;
    font-weight: bold;
}

/* ===== METALLIC ORDER NUMBER BADGE ===== */
h3 span {
    background: linear-gradient(90deg, #0f3d2e, #3cb371, #0f3d2e);
    color: white !important;
    padding: 10px 20px;
    border-radius: 10px;
    font-size: 18px;
    letter-spacing: 1px;
    box-shadow: 
        0 0 20px #2e8b57,
        inset 0 3px 8px rgba(255,255,255,0.4);
}

</style>

</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
<span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script>

window.onscroll = function() {
scrollFunction();
};

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

<?php

if(isset($_SESSION['login_user2'])){

?>

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

<li>
<a href="cart.php">
<span class="glyphicon glyphicon-shopping-cart"></span> Cart
(<?php

if(isset($_SESSION["cart"]))
echo count($_SESSION["cart"]);
else
echo "0";

?>)
</a>
</li>

<li>
<a href="logout_u.php">
<span class="glyphicon glyphicon-log-out"></span> Log Out
</a>
</li>

</ul>

<?php
}
?>

</div>
</div>
</nav>

<div class="container">

<div class="jumbotron">

<h1 class="text-center">
<span class="glyphicon glyphicon-ok-circle"></span>
Order Placed Successfully.
</h1>

</div>

</div>

<br>

<h2 class="text-center">
Thank you for Ordering at Spice Box! The ordering process is now complete.
</h2>

<?php 

$num1 = rand(100000,999999); 
$num2 = rand(100000,999999); 
$num3 = rand(100000,999999);

$number = $num1.$num2.$num3;

?>

<h3 class="text-center">

<strong>Your Order Number:</strong>

<span><?php echo $number; ?></span>

</h3>

</body>
</html>