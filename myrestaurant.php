<?php
include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php');
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Manager Control Panel | Spice Box</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>

/* ===== BODY BACKGROUND ===== */
body{
  background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  font-family: 'Segoe UI', sans-serif;
}

/* ===== NAVBAR ===== */
.navbar{
  background: linear-gradient(to right,#1c1c1c,#2d2d2d);
  border: none;
  box-shadow: 0 5px 15px rgba(0,0,0,0.4);
}

.navbar-brand{
  color:#fff !important;
  font-weight:600;
  letter-spacing:1px;
}

/* ===== JUMBOTRON ===== */
.jumbotron{
  background: linear-gradient(145deg,#f2f2f2,#d9d9d9);
  border-radius: 25px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.4),
              inset 0 2px 6px rgba(255,255,255,0.8);
  border-top:6px solid #1f3c88;
  text-align:center;
}

.jumbotron h1{
  font-weight:600;
  color:#1f3c88;
}

.jumbotron p{
  color:#444;
  font-size:16px;
}

/* ===== LEFT PANEL ===== */
.list-group{
  border-radius:20px;
  overflow:hidden;
  box-shadow:0 15px 30px rgba(0,0,0,0.4);
}

.list-group-item{
  background: linear-gradient(145deg,#e6e6e6,#cccccc);
  border:none;
  font-weight:600;
  color:#333;
  transition:0.3s;
}

.list-group-item:hover{
  background: linear-gradient(145deg,#ffffff,#d0d0d0);
  transform:scale(1.03);
}

.list-group-item.active{
  background: linear-gradient(to right,#1f3c88,#29539b);
  color:#fff;
  border-left:5px solid #0f2027;
}

/* ===== FORM AREA ===== */
.form-area{
  background: linear-gradient(145deg,#ffffff,#e6e6e6);
  border-radius:25px;
  box-shadow: 0 20px 40px rgba(0,0,0,0.4),
              inset 0 2px 6px rgba(255,255,255,0.8);
  border-top:6px solid #1f3c88;
  padding:50px 100px 100px 100px;
}

.form-area h3{
  font-weight:600;
  margin-bottom:30px;
  color:#1f3c88;
}

/* ===== INPUT FIELDS ===== */
.form-control{
  border-radius:15px;
  border:1px solid #bbb;
  height:45px;
  background:#f7f7f7;
  transition:0.3s;
}

.form-control:focus{
  border-color:#1f3c88;
  box-shadow:0 0 10px rgba(31,60,136,0.6);
  background:#fff;
}

/* ===== BUTTON ===== */
.btn-primary{
  border-radius:25px;
  padding:10px 30px;
  font-weight:600;
  background: linear-gradient(to right,#1f3c88,#29539b);
  border:none;
  transition:0.3s;
}

.btn-primary:hover{
  background: linear-gradient(to right,#29539b,#1f3c88);
  box-shadow:0 5px 15px rgba(0,0,0,0.4);
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
  background: linear-gradient(#1f3c88,#29539b);
  color:white;
  cursor:pointer;
  padding:12px 15px;
  border-radius:50%;
  box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

#myBtn:hover{
  background: linear-gradient(#29539b,#1f3c88);
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
if(document.body.scrollTop>20||document.documentElement.scrollTop>20){
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
<a class="navbar-brand" href="index.php">Spice Box</a>
</div>

<ul class="nav navbar-nav navbar-right">
<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?></a></li>
<li class="active"><a href="myrestaurant.php">MANAGER CONTROL PANEL</a></li>
<li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
</ul>
</div>
</nav>

<br><br><br>

<div class="container">
<div class="jumbotron">
<h1>Hello Manager!</h1>
<p>Manage your restaurant and orders from here</p>
</div>
</div>

<div class="container">

<!-- LEFT PANEL -->
<div class="col-xs-3" style="text-align:center;">
<div class="list-group">
<a href="myrestaurant.php" class="list-group-item active">My Restaurant</a>
<a href="view_food_items.php" class="list-group-item">View Food Items</a>
<a href="add_food_items.php" class="list-group-item">Add Food Items</a>
<a href="edit_food_items.php" class="list-group-item">Edit Food Items</a>
<a href="delete_food_items.php" class="list-group-item">Delete Food Items</a>
<a href="manager_orders.php" class="list-group-item">
<span class="glyphicon glyphicon-list-alt"></span> View Orders
</a>
</div>
</div>

<!-- RIGHT PANEL -->
<div class="col-xs-9">
<div class="form-area">
<form action="myrestaurant1.php" method="POST">
<h3 style="text-align:center;">MY RESTAURANT</h3>

<div class="form-group">
<input type="text" class="form-control" name="name" placeholder="Restaurant Name" required>
</div>

<div class="form-group">
<input type="email" class="form-control" name="email" placeholder="Restaurant Email" required>
</div>

<div class="form-group">
<input type="text" class="form-control" name="contact" placeholder="Contact Number" required>
</div>

<div class="form-group">
<input type="text" class="form-control" name="address" placeholder="Restaurant Address" required>
</div>

<button type="submit" class="btn btn-primary pull-right">ADD RESTAURANT</button>

</form>
</div>
</div>

</div>

</body>
</html>