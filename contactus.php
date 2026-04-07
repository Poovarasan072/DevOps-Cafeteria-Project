```php
<?php
session_start();
?>

<html>

<head>
<title>Contact | Spice Box</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

<style>

/* ===== PAGE BACKGROUND ===== */
body{
    background: linear-gradient(135deg,#f2f2f2,#e6e6e6,#f9f9f9);
    font-family: 'Segoe UI', sans-serif;
}

/* ===== NAVBAR ===== */
.navbar{
    background: linear-gradient(to right,#2e2e2e,#1f1f1f);
    border: none;
}

/* ===== HEADING ===== */
.heading{
    text-align:center;
    margin-top:100px;
    font-size:35px;
    font-weight:600;
    color:#333;
}

.heading .edit{
    color:#5a5a5a;
}

/* ===== METALLIC CARD ===== */
.form-area{
    margin-top:40px;
    padding:40px;
    border-radius:25px;
    background: linear-gradient(145deg,#ffffff,#e6e6e6);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15),
                inset 0 2px 5px rgba(255,255,255,0.8);
    border-top:6px solid #444;
}

/* ===== INPUT FIELDS ===== */
.form-control{
    border-radius:15px;
    border:1px solid #cfcfcf;
    background:#f7f7f7;
    height:45px;
    transition:0.3s;
}

.form-control:focus{
    box-shadow:0 0 8px rgba(150,150,150,0.6);
    border-color:#999;
    background:#fff;
}

/* TEXTAREA */
textarea.form-control{
    height:auto;
}

/* ===== BUTTON ===== */
.btn-primary{
    width:100%;
    border-radius:25px;
    height:45px;
    font-size:16px;
    background: linear-gradient(to right,#d9d9d9,#bfbfbf);
    border:none;
    color:#333;
    font-weight:600;
    transition:0.3s;
}

.btn-primary:hover{
    background: linear-gradient(to right,#cfcfcf,#a6a6a6);
}

/* ===== SCROLL BUTTON ===== */
#myBtn{
    display:none;
    position:fixed;
    bottom:20px;
    right:30px;
    z-index:99;
    border:none;
    outline:none;
    background: linear-gradient(#d9d9d9,#bfbfbf);
    color:#333;
    cursor:pointer;
    padding:12px 15px;
    border-radius:50%;
}

</style>

</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
<span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script>
window.onscroll = function(){scrollFunction()};

function scrollFunction(){
if(document.body.scrollTop>20 || document.documentElement.scrollTop>20){
document.getElementById("myBtn").style.display="block";
}else{
document.getElementById("myBtn").style.display="none";
}}

function topFunction(){
document.body.scrollTop=0;
document.documentElement.scrollTop=0;
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
<li class="active"><a href="contactus.php">Contact Us</a></li>
</ul>

<?php
if(isset($_SESSION['login_user1'])){
?>

<ul class="nav navbar-nav navbar-right">

<li>
<a href="#"><span class="glyphicon glyphicon-user"></span>
Welcome <?php echo $_SESSION['login_user1']; ?>
</a>
</li>

<li><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>

<li>
<a href="logout_m.php">
<span class="glyphicon glyphicon-log-out"></span> Log Out
</a>
</li>

</ul>

<?php
}
else if(isset($_SESSION['login_user2'])){
?>

<ul class="nav navbar-nav navbar-right">

<li>
<a href="#"><span class="glyphicon glyphicon-user"></span>
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
if(isset($_SESSION["cart"])){
echo count($_SESSION["cart"]);
}else{
echo "0";
}
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
else{
?>

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

<?php
}
?>

</div>
</div>
</nav>

<div class="heading">
Want to contact <span class="edit">Spice Box</span>?
<br>
Here are a few ways to get in touch with us.
</div>

<div class="container">
<div class="col-md-5" style="float:none;margin:0 auto;">
<div class="form-area">

<form method="post" action="">

<h3 style="text-align:center;margin-bottom:25px;">Contact Form</h3>

<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="Name" required>
</div>

<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Email" required>
</div>

<div class="form-group">
<input type="number" class="form-control" name="mobile" placeholder="Mobile Number" required>
</div>

<div class="form-group">
<input type="text" class="form-control" name="subject" placeholder="Subject" required>
</div>

<div class="form-group">
<textarea class="form-control" name="message" placeholder="Message" maxlength="140" rows="6"></textarea>
</div>

<input type="submit" name="submit" class="btn btn-primary">

</form>

</div>
</div>
</div>

<?php

if(isset($_POST['submit'])){

require 'connection.php';

$conn = Connect();

if(!$conn){
die("Database Connection Failed");
}

$Name = $conn->real_escape_string($_POST['name']);
$Email_Id = $conn->real_escape_string($_POST['email']);
$Mobile_No = $conn->real_escape_string($_POST['mobile']);
$Subject = $conn->real_escape_string($_POST['subject']);
$Message = $conn->real_escape_string($_POST['message']);

$query="INSERT INTO contact(Name,Email,Mobile,Subject,Message)
VALUES('$Name','$Email_Id','$Mobile_No','$Subject','$Message')";

$success = $conn->query($query);

if(!$success){
die("Could not enter data: ".$conn->error);
}

$conn->close();

}

?>

</body>
</html>
```
