<?php
include('session_m.php');
require_once 'connection.php';

$conn = Connect();

if(!isset($login_session)){
    header('Location: managerlogin.php'); 
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Delete Food Items | Spice Box</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>

/* BODY BACKGROUND */
body{
  background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
  font-family:'Segoe UI',sans-serif;
  padding-top:70px;
}

/* NAVBAR */
.navbar{
  background:linear-gradient(to right,#1c1c1c,#2d2d2d);
  border:none;
  box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

.navbar-brand{
  color:#fff !important;
  font-weight:600;
}

.nav > li > a{
  color:#fff !important;
  font-weight:600;
}

.nav > li.active > a{
  background:linear-gradient(to right,#1f3c88,#29539b)!important;
  color:#fff!important;
  border-radius:5px;
}

/* JUMBOTRON */
.jumbotron{
  background:linear-gradient(145deg,#f2f2f2,#d9d9d9);
  border-radius:25px;
  box-shadow:0 15px 35px rgba(0,0,0,0.4);
  border-top:6px solid #1f3c88;
  text-align:center;
}

/* LEFT PANEL */
.list-group{
  border-radius:20px;
  overflow:hidden;
  box-shadow:0 15px 30px rgba(0,0,0,0.4);
}

.list-group-item{
  background:linear-gradient(145deg,#e6e6e6,#cccccc);
  border:none;
  font-weight:600;
  color:#333;
  text-align:center;
}

.list-group-item:hover{
  background:#ffffff;
}

.list-group-item.active{
  background:linear-gradient(to right,#1f3c88,#29539b);
  color:#fff;
}

/* FORM AREA */
.form-area{
  background:linear-gradient(145deg,#ffffff,#e6e6e6);
  border-radius:25px;
  box-shadow:0 20px 40px rgba(0,0,0,0.4);
  border-top:6px solid #1f3c88;
  padding:40px;
}

/* TABLE */
table{
  background:#fff;
  border-radius:10px;
}

thead{
  background:linear-gradient(to right,#1f3c88,#29539b);
  color:#fff;
}

th,td{
  text-align:center;
}

/* BUTTON */
.btn-danger{
  border-radius:25px;
  background:linear-gradient(to right,#b71c1c,#f44336);
  border:none;
}

</style>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search">

<div class="container">

<div class="navbar-header">
<a class="navbar-brand" href="index.php">Spice Box</a>
</div>

<ul class="nav navbar-nav navbar-right">

<li>
<a href="#">
<span class="glyphicon glyphicon-user"></span>
Welcome <?php echo $login_session; ?>
</a>
</li>

<li class="active">
<a href="managerlogin.php">MANAGER CONTROL PANEL</a>
</li>

<li>
<a href="logout_m.php">
<span class="glyphicon glyphicon-log-out"></span> Log Out
</a>
</li>

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

<!-- LEFT MENU -->
<div class="col-xs-3">

<div class="list-group">

<a href="myrestaurant.php" class="list-group-item">
<span class="glyphicon glyphicon-home"></span> My Restaurant
</a>

<a href="view_food_items.php" class="list-group-item">
<span class="glyphicon glyphicon-list"></span> View Food Items
</a>

<a href="add_food_items.php" class="list-group-item">
<span class="glyphicon glyphicon-plus"></span> Add Food Items
</a>

<a href="edit_food_items.php" class="list-group-item">
<span class="glyphicon glyphicon-edit"></span> Edit Food Items
</a>

<a href="delete_food_items.php" class="list-group-item active">
<span class="glyphicon glyphicon-trash"></span> Delete Food Items
</a>

<a href="view_order_details.php" class="list-group-item">
<span class="glyphicon glyphicon-list-alt"></span> View Order Details
</a>

</div>

</div>


<div class="col-xs-9">

<div class="form-area">

<form action="delete_food_items1.php" method="POST">

<h3 style="text-align:center;">DELETE YOUR FOOD ITEMS FROM HERE</h3>

<?php

$user_check=$_SESSION['login_user1'];

$sql="SELECT * FROM food f 
WHERE f.options='ENABLE' 
AND f.R_ID IN
(
SELECT r.R_ID
FROM restaurants r
WHERE r.M_ID='$user_check'
)
ORDER BY F_ID";

$result=mysqli_query($conn,$sql);

if($result && mysqli_num_rows($result)>0)
{
?>

<table class="table table-striped">

<thead>

<tr>

<th>#</th>
<th>Food ID</th>
<th>Food Name</th>
<th>Price</th>
<th>Description</th>
<th>Restaurant ID</th>

</tr>

</thead>

<tbody>

<?php

while($row=mysqli_fetch_assoc($result))
{

?>

<tr>

<td>
<input name="checkbox[]" type="checkbox" value="<?php echo $row['F_ID']; ?>">
</td>

<td><?php echo $row["F_ID"]; ?></td>
<td><?php echo $row["name"]; ?></td>
<td><?php echo $row["price"]; ?></td>
<td><?php echo $row["description"]; ?></td>
<td><?php echo $row["R_ID"]; ?></td>

</tr>

<?php
}
?>

</tbody>
</table>

<div class="form-group">

<button type="submit"
name="delete"
value="Delete"
class="btn btn-danger pull-right">

DELETE

</button>

</div>

<?php
}
else
{
echo "<h4><center>0 RESULTS</center></h4>";
}
?>

</form>

</div>

</div>

</div>

<br><br><br>

</body>
</html>

<?php
mysqli_close($conn);
?>