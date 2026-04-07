<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['login_user2'])) {
    header("location: customerlogin.php");
    exit();
}

$conn = Connect();
$username = $_SESSION['login_user2'];

/* CANCEL ORDER */
if (isset($_POST['cancel_order'])) {
    $order_id = $_POST['order_id'];

    mysqli_query($conn, "
        UPDATE orders 
        SET status='Cancelled' 
        WHERE order_ID='$order_id' 
        AND received_status='Not Received'
        AND username='$username'
    ");
}

/* DATE FILTER */
$today_date = date("Y-m-d");
$yesterday_date = date("Y-m-d", strtotime("-1 day"));

$filter_applied = false;
$selected_date = "";

if (isset($_GET['day']) && isset($_GET['month']) && isset($_GET['year'])) {

    $day = $_GET['day'];
    $month = $_GET['month'];
    $year = $_GET['year'];

    if ($day != "" && $month != "" && $year != "") {
        $selected_date = "$year-$month-$day";
        $filter_applied = true;
    }
}

if ($filter_applied) {
    $sql = "SELECT * FROM orders 
            WHERE username='$username' 
            AND DATE(order_date)='$selected_date'
            ORDER BY order_date DESC";
} else {
    $sql = "SELECT * FROM orders 
            WHERE username='$username'
            AND (DATE(order_date)='$today_date' 
                 OR DATE(order_date)='$yesterday_date')
            ORDER BY order_date DESC";
}

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
<title>My Orders | Spice Box</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>

body {
    background: linear-gradient(to right, #f8f9fa, #e9ecef);
}

/* SEARCH BOX */
.search-box {
    background: white;
    padding: 25px;
    border-radius: 18px;
    margin-bottom: 30px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    text-align: center;
}

.search-box select {
    padding: 8px 12px;
    border-radius: 25px;
    border: 2px solid #ddd;
    margin: 5px;
    outline: none;
    transition: 0.3s;
}

.search-box select:focus {
    border-color: #28a745;
    box-shadow: 0 0 8px rgba(40,167,69,0.4);
}

.search-box .btn {
    border-radius: 25px;
    padding: 8px 18px;
    font-weight: 600;
}

/* ORDER CARD */
.order-card {
    background: #ffffff;
    border-radius: 18px;
    padding: 25px;
    margin-bottom: 25px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.08);
    transition: 0.3s ease;
}

.order-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.15);
}

.order-title {
    font-size: 20px;
    font-weight: 600;
}

.order-meta {
    color: #888;
    font-size: 13px;
}

/* STATUS BADGES */
.badge-status {
    padding: 8px 16px;
    border-radius: 30px;
    font-size: 13px;
    font-weight: 600;
    display: inline-block;
    color: white;
}

.badge-pending {
    background: linear-gradient(45deg, #f7971e, #ffd200);
}

.badge-completed {
    background: linear-gradient(45deg, #28a745, #6dd5ed);
}

.badge-cancelled {
    background: linear-gradient(45deg, #dc3545, #ff6a6a);
}

/* RECEIVED BADGE */
.received-badge {
    background: linear-gradient(45deg, #00b09b, #96c93d);
    padding: 8px 16px;
    border-radius: 30px;
    color: white;
    font-weight: bold;
    font-size: 13px;
    animation: pulse 2s infinite;
    box-shadow: 0 0 10px rgba(0,0,0,0.15);
}

@keyframes pulse {
    0% { transform: scale(1); }
    50% { transform: scale(1.08); }
    100% { transform: scale(1); }
}

/* NO ORDERS */
.no-orders {
    text-align: center;
    padding: 60px;
    background: white;
    border-radius: 18px;
    box-shadow: 0 6px 18px rgba(0,0,0,0.1);
}

.no-orders i {
    font-size: 70px;
    color: #ccc;
    margin-bottom: 20px;
}

</style>
</head>

<body>

<nav class="navbar navbar-inverse">
<div class="container">
    <a class="navbar-brand" href="foodlist.php">🍴 Spice Box</a>
    <ul class="nav navbar-nav navbar-right">
        <li><a>Welcome <?php echo $username; ?></a></li>
        <li><a href="logout_u.php">Logout</a></li>
    </ul>
</div>
</nav>

<div class="container">

<h2 class="text-center" style="margin-top:20px;">
<i class="fa fa-list-alt"></i> My Orders
</h2>
<hr>

<!-- SEARCH SECTION -->
<div class="search-box">
<form method="GET">

<h4><strong><i class="fa fa-calendar"></i> Search Older Orders</strong></h4>
<br>

<select name="day">
<option value="">Day</option>
<?php for($d=1;$d<=31;$d++){ ?>
<option value="<?php echo sprintf("%02d",$d); ?>">
<?php echo sprintf("%02d",$d); ?>
</option>
<?php } ?>
</select>

<select name="month">
<option value="">Month</option>
<?php 
$months = [
"01"=>"January","02"=>"February","03"=>"March",
"04"=>"April","05"=>"May","06"=>"June",
"07"=>"July","08"=>"August","09"=>"September",
"10"=>"October","11"=>"November","12"=>"December"
];
foreach($months as $num=>$name){ ?>
<option value="<?php echo $num; ?>">
<?php echo $name; ?>
</option>
<?php } ?>
</select>

<select name="year">
<option value="">Year</option>
<?php for($y=date("Y");$y>=2022;$y--){ ?>
<option value="<?php echo $y; ?>">
<?php echo $y; ?>
</option>
<?php } ?>
</select>

<br><br>

<button type="submit" class="btn btn-primary">
<i class="fa fa-search"></i> Search
</button>

<a href="my_orders.php" class="btn btn-default">
Reset
</a>

</form>
</div>

<?php
if (mysqli_num_rows($result) > 0) {

while ($row = mysqli_fetch_assoc($result)) {

$status_class = "badge-pending";
if ($row['status'] == "Completed") $status_class = "badge-completed";
if ($row['status'] == "Cancelled") $status_class = "badge-cancelled";
?>

<div class="order-card">
<div class="row">

<div class="col-md-8">

<div class="order-title">
<?php echo $row['foodname']; ?>
</div>

<div class="order-meta">
Order ID: #<?php echo $row['order_ID']; ?> |
<?php echo date("d M Y, h:i A", strtotime($row['order_date'])); ?>
</div>

<br>

<strong>Price:</strong> ₹<?php echo $row['price']; ?><br>
<strong>Quantity:</strong> <?php echo $row['quantity']; ?>

</div>

<div class="col-md-4 text-right">

<span class="badge-status <?php echo $status_class; ?>">
<?php echo $row['status']; ?>
</span>

<br><br>

<?php if ($row['received_status']=="Received") { ?>
<span class="received-badge">
✔ Order Received
</span>

<?php } elseif ($row['received_status']=="Not Received" && $row['status']!="Cancelled") { ?>

<form method="POST" onsubmit="return confirm('Cancel this order?');">
<input type="hidden" name="order_id" value="<?php echo $row['order_ID']; ?>">
<button name="cancel_order" class="btn btn-danger btn-sm">
<i class="fa fa-times"></i> Cancel Order
</button>
</form>

<?php } ?>

</div>
</div>
</div>

<?php } 

} else { ?>

<div class="no-orders">
<i class="fa fa-shopping-basket"></i>
<h3>No Orders Found</h3>
<p>
<?php 
if ($filter_applied) {
echo "No orders on <strong>" . date("d M Y", strtotime($selected_date)) . "</strong>.";
} else {
echo "You have no orders for Today or Yesterday.";
}
?>
</p>
<a href="foodlist.php" class="btn btn-success btn-lg">
<i class="fa fa-cutlery"></i> Browse Food
</a>
</div>

<?php } ?>

</div>
</body>
</html>
