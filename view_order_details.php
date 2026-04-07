<?php
include('session_m.php');
require_once 'connection.php';

if (!isset($login_session)) {
    header('Location: managerlogin.php');
    exit();
}

$conn = Connect();

/* =========================
   UPDATE ORDER STATUS
========================= */
if (isset($_POST['update_status'])) {

    $order_id = (int)$_POST['order_id'];
    $status   = $_POST['status'];

    mysqli_query($conn,
        "UPDATE orders 
         SET status='$status' 
         WHERE order_ID='$order_id'"
    );
}

/* =========================
   UPDATE RECEIVED STATUS
========================= */
if (isset($_POST['update_received'])) {

    $order_id = (int)$_POST['order_id'];
    $received_status = $_POST['received_status'];

    mysqli_query($conn,
        "UPDATE orders 
         SET received_status='$received_status' 
         WHERE order_ID='$order_id'"
    );
}

/* =========================
   ADD FOOD TO OFFER
========================= */
if (isset($_POST['add_offer'])) {

    $food_id = (int)$_POST['food_id'];
    $price   = (float)$_POST['offer_price'];
    $qty     = (int)$_POST['offer_quantity'];

    mysqli_query($conn,
        "UPDATE food 
         SET is_offer = 1,
             offer_price = '$price',
             offer_quantity = offer_quantity + '$qty'
         WHERE F_ID = '$food_id'"
    );
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Manager | View Order Details</title>

<link rel="stylesheet" href="css/bootstrap.min.css">
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<style>

body{
background: linear-gradient(135deg,#0f2027,#203a43,#2c5364);
font-family:'Segoe UI',sans-serif;
padding-top:70px;
}

/* NAVBAR */
.navbar{
background: linear-gradient(to right,#1c1c1c,#2d2d2d);
border:none;
box-shadow:0 5px 15px rgba(0,0,0,0.4);
}

.navbar-brand,
.nav > li > a{
color:#fff !important;
font-weight:600;
}

.nav > li.active > a{
background: linear-gradient(to right,#1f3c88,#29539b) !important;
color:#fff !important;
border-radius:5px;
}

/* JUMBOTRON */

.jumbotron{
background: linear-gradient(145deg,#f2f2f2,#d9d9d9);
border-radius:25px;
box-shadow:0 15px 35px rgba(0,0,0,0.4);
border-top:6px solid #1f3c88;
text-align:center;
padding:40px 30px;
margin-bottom:30px;
}

.jumbotron h2{
font-weight:600;
color:#1f3c88;
}

/* SIDEBAR */

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
text-align:center;
}

.list-group-item.active{
background: linear-gradient(to right,#1f3c88,#29539b);
color:#fff;
}

/* TABLE */

table{
background:#fff;
border-radius:15px;
overflow:hidden;
box-shadow:0 10px 20px rgba(0,0,0,0.3);
}

thead{
background: linear-gradient(to right,#1f3c88,#29539b);
color:#fff;
}

th,td{
text-align:center;
vertical-align:middle !important;
}

tbody tr:nth-child(even){
background:#f9f9f9;
}

/* BUTTONS */

.btn-success,
.btn-primary,
.btn-warning{
border-radius:25px;
font-weight:600;
padding:5px 10px;
}

</style>

</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">

<div class="container">

<a class="navbar-brand" href="index.php">Spice Box</a>

<ul class="nav navbar-nav navbar-right">

<li>
<a>Welcome <?php echo $login_session; ?></a>
</li>

<li class="active">
<a>Manager Panel</a>
</li>

<li>
<a href="logout_m.php">Logout</a>
</li>

</ul>

</div>
</nav>


<div class="container">

<div class="jumbotron text-center">

<h2>Manage Orders</h2>
<p>Orders • Status • Offers</p>

</div>

</div>



<div class="container">

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

<a href="delete_food_items.php" class="list-group-item">
<span class="glyphicon glyphicon-trash"></span> Delete Food Items
</a>

<a class="list-group-item active">
<span class="glyphicon glyphicon-list-alt"></span> View Orders
</a>

</div>

</div>


<div class="col-xs-9">

<h3 class="text-center" style="color:#1f3c88;font-weight:600;">Order List</h3>
<hr>

<?php

$user = $_SESSION['login_user1'];

$sql = "

SELECT 
o.*, 
f.is_offer, 
f.offer_price, 
f.offer_quantity

FROM orders o

JOIN food f 
ON o.F_ID = f.F_ID

WHERE o.R_ID IN
(
SELECT R_ID 
FROM restaurants 
WHERE M_ID='$user'
)

ORDER BY o.order_date DESC

";

$result = mysqli_query($conn,$sql);

?>

<table class="table table-bordered table-striped">

<thead>

<tr>

<th>ID</th>
<th>Food</th>
<th>Date</th>
<th>Price</th>
<th>Qty</th>
<th>User</th>
<th>Status</th>
<th>Received</th>
<th>Update</th>
<th>Offer</th>

</tr>

</thead>

<tbody>

<?php

if($result && mysqli_num_rows($result)>0)
{

while($row=mysqli_fetch_assoc($result))
{

$cancelledQty = (int)$row['quantity'];
$offerQty     = (int)$row['offer_quantity'];

?>

<tr>

<td><?php echo $row['order_ID']; ?></td>
<td><?php echo $row['foodname']; ?></td>
<td><?php echo $row['order_date']; ?></td>
<td>₹<?php echo $row['price']; ?></td>
<td><?php echo $row['quantity']; ?></td>
<td><?php echo $row['username']; ?></td>


<td colspan="3">

<form method="POST">

<input type="hidden" name="order_id" value="<?php echo $row['order_ID']; ?>">

<select name="status" class="form-control">

<option <?php if($row['status']=="Pending") echo "selected"; ?>>Pending</option>
<option <?php if($row['status']=="Completed") echo "selected"; ?>>Completed</option>
<option <?php if($row['status']=="Cancelled") echo "selected"; ?>>Cancelled</option>

</select>

<select name="received_status" class="form-control" style="margin-top:5px;">

<option <?php if($row['received_status']=="Not Received") echo "selected"; ?>>Not Received</option>
<option <?php if($row['received_status']=="Received") echo "selected"; ?>>Received</option>

</select>

<button name="update_status" class="btn btn-success btn-xs" style="margin-top:5px;">Update</button>

<button name="update_received" class="btn btn-primary btn-xs" style="margin-top:5px;">Received</button>

</form>

</td>


<td>

<?php

if ($row['status']=="Cancelled" && $offerQty < $cancelledQty)
{

?>

<form method="POST">

<input type="hidden" name="food_id" value="<?php echo $row['F_ID']; ?>">

<input type="number"
name="offer_price"
class="form-control"
placeholder="Offer ₹"
required min="1">

<input type="number"
name="offer_quantity"
class="form-control"
placeholder="Qty"
required
min="1"
max="<?php echo $cancelledQty-$offerQty; ?>">

<button name="add_offer" class="btn btn-warning btn-xs" style="margin-top:5px;">Add Offer</button>

</form>

<?php

}

elseif ($row['is_offer']==1)
{

?>

<span class="label label-success">

Offer ₹<?php echo $row['offer_price']; ?> 
(Qty: <?php echo $row['offer_quantity']; ?>)

</span>

<?php
}
else
{
echo "—";
}
?>

</td>

</tr>

<?php
}
}
?>

</tbody>

</table>

</div>

</div>

</body>
</html>

<?php
$conn->close();
?>