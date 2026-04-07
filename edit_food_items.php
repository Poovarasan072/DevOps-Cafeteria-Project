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
<title>Edit Food Items | Spice Box</title>

<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script type="text/javascript">
function display_alert(){
    alert("Data Updated Successfully...!!!");
}
</script>

<style>

/* ===== BODY BACKGROUND ===== */
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
}

.list-group-item:hover{
  background:#ffffff;
}

.list-group-item.active{
  background:linear-gradient(to right,#1f3c88,#29539b);
  color:#fff;
}

/* FORM */
.form-area{
  background:linear-gradient(145deg,#ffffff,#e6e6e6);
  border-radius:25px;
  box-shadow:0 20px 40px rgba(0,0,0,0.4);
  border-top:6px solid #1f3c88;
  padding:40px;
}

.form-control{
  border-radius:10px;
}

.btn-primary{
  border-radius:25px;
  background:linear-gradient(to right,#1f3c88,#29539b);
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

<a href="edit_food_items.php" class="list-group-item active">
<span class="glyphicon glyphicon-edit"></span> Edit Food Items
</a>

<a href="delete_food_items.php" class="list-group-item">
<span class="glyphicon glyphicon-trash"></span> Delete Food Items
</a>

<a href="view_order_details.php" class="list-group-item">
<span class="glyphicon glyphicon-list-alt"></span> View Order Details
</a>

</div>
</div>


<!-- FOOD LIST -->
<div class="col-xs-3">

<div class="form-area" style="padding:20px;">

<div style="text-align:center;">
<h3>Click On Menu</h3>
</div>

<?php

/* UPDATE FOOD */
if(isset($_GET['submit']))
{

$F_ID=$_GET['dfid'];
$name=$_GET['dname'];
$price=$_GET['dprice'];
$description=$_GET['ddescription'];

$query_update="UPDATE food 
SET name='$name',
price='$price',
description='$description'
WHERE F_ID='$F_ID'";

mysqli_query($conn,$query_update);

}

/* FETCH FOOD ITEMS */

$query="SELECT * FROM food f 
WHERE f.R_ID IN 
(
SELECT r.R_ID 
FROM restaurants r 
WHERE r.M_ID='$user_check'
)
ORDER BY F_ID";

$result=mysqli_query($conn,$query);

while($row=mysqli_fetch_array($result))
{

echo "<div class='list-group' style='text-align:center;'>
<b><a href='edit_food_items.php?update={$row['F_ID']}'>{$row['name']}</a></b>
</div>";

}

?>

</div>
</div>


<!-- EDIT FORM -->
<?php

if(isset($_GET['update']))
{

$update=$_GET['update'];

$query1="SELECT * FROM food WHERE F_ID='$update'";
$result1=mysqli_query($conn,$query1);

while($row1=mysqli_fetch_array($result1))
{

?>

<div class="col-md-6">

<div class="form-area">

<form action="edit_food_items.php" method="GET">

<h3 style="text-align:center;">EDIT YOUR FOOD ITEMS HERE</h3>

<input type="hidden" name="dfid" value="<?php echo $row1['F_ID']; ?>">

<div class="form-group">

<label>Food Name:</label>

<input type="text"
class="form-control"
name="dname"
value="<?php echo $row1['name']; ?>"
required>

</div>


<div class="form-group">

<label>Food Price:</label>

<input type="text"
class="form-control"
name="dprice"
value="<?php echo $row1['price']; ?>"
required>

</div>


<div class="form-group">

<label>Food Description:</label>

<input type="text"
class="form-control"
name="ddescription"
value="<?php echo $row1['description']; ?>"
required>

</div>


<div class="form-group">

<button type="submit"
name="submit"
class="btn btn-primary pull-right"
onclick="display_alert()">

Update

</button>

</div>

</form>

</div>

</div>

<?php
}

}

mysqli_close($conn);
?>

</div>

</body>
</html>