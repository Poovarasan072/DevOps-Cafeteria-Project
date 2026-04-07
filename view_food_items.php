<?php
include('session_m.php');

if(!isset($login_session)){
  header('Location: managerlogin.php');
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>View Food Items | Spice Box</title>
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

<style>
/* ===== BODY BACKGROUND ===== */
body{
  background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  font-family: 'Segoe UI', sans-serif;
  padding-top: 70px;
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

.nav > li > a{
  color:#fff !important;
  font-weight:600;
}

.nav > li.active > a{
  background: linear-gradient(to right,#1f3c88,#29539b) !important;
  color: #fff !important;
  border-radius:5px;
}

/* ===== JUMBOTRON ===== */
.jumbotron{
  background: linear-gradient(145deg,#f2f2f2,#d9d9d9);
  border-radius: 25px;
  box-shadow: 0 15px 35px rgba(0,0,0,0.4),
              inset 0 2px 6px rgba(255,255,255,0.8);
  border-top:6px solid #1f3c88;
  text-align:center;
  padding:40px 30px;
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
  padding:40px 60px;
}

.form-area h3{
  font-weight:600;
  margin-bottom:30px;
  color:#1f3c88;
}

/* ===== TABLE ===== */
.table{
  background:#f7f7f7;
  border-radius:10px;
  overflow:hidden;
  box-shadow:0 10px 20px rgba(0,0,0,0.3);
}

.table th{
  background: linear-gradient(to right,#1f3c88,#29539b);
  color:#fff;
  font-weight:600;
  text-align:center;
}

.table td{
  text-align:center;
  font-weight:500;
  color:#333;
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

<button onclick="topFunction()" id="myBtn">
<span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script>
window.onscroll=function(){scrollFunction()};
function scrollFunction(){
if(document.body.scrollTop>20||document.documentElement.scrollTop>20){
document.getElementById("myBtn").style.display="block";
}else{
document.getElementById("myBtn").style.display="none";
}
}
function topFunction(){
document.body.scrollTop=0;
document.documentElement.scrollTop=0;
}
</script>

<nav class="navbar navbar-inverse navbar-fixed-top">
<div class="container">
<div class="navbar-header">
<a class="navbar-brand" href="index.php">Spice Box</a>
</div>

<ul class="nav navbar-nav navbar-right">
<li><a href="#"><span class="glyphicon glyphicon-user"></span> Welcome <?php echo $login_session; ?></a></li>
<li class="active"><a href="managerlogin.php">MANAGER CONTROL PANEL</a></li>
<li><a href="logout_m.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
</ul>
</div>
</nav>

<div class="container">
<div class="jumbotron">
<h1>Hello Manager!</h1>
<p>Manage all your restaurant from here</p>
</div>
</div>

<div class="container">

<div class="col-xs-3" style="text-align:center;">
<div class="list-group">
<a href="myrestaurant.php" class="list-group-item">My Restaurant</a>
<a href="view_food_items.php" class="list-group-item active">View Food Items</a>
<a href="add_food_items.php" class="list-group-item">Add Food Items</a>
<a href="edit_food_items.php" class="list-group-item">Edit Food Items</a>
<a href="delete_food_items.php" class="list-group-item">Delete Food Items</a>
<a href="view_order_details.php" class="list-group-item">View Order Details</a>
</div>
</div>

<div class="col-xs-9">
<div class="form-area">

<h3 style="text-align:center;">YOUR FOOD ITEMS LIST</h3>

<?php

$user_check=$_SESSION['login_user1'];

$sql="SELECT * FROM food f WHERE f.R_ID IN
(SELECT r.R_ID FROM restaurants r WHERE r.M_ID='$user_check')
ORDER BY F_ID";

$result=mysqli_query($conn,$sql);

if($result && mysqli_num_rows($result)>0){

?>

<table class="table table-striped table-bordered">

<thead>
<tr>
<th></th>
<th>Food ID</th>
<th>Food Name</th>
<th>Price</th>
<th>Description</th>
<th>Restaurant ID</th>
</tr>
</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>
<td><span class="glyphicon glyphicon-menu-right"></span></td>
<td><?php echo $row["F_ID"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo $row["R_ID"]; ?></td>
</tr>

<?php } ?>

</tbody>
</table>

<?php
}
else
{
echo "<h4><center style='color:#1f3c88;'>0 RESULTS</center></h4>";
}
?>

</div>
</div>

</div>

<br><br><br>

</body>
</html>