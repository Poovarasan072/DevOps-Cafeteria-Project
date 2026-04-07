<?php
session_start();
require 'connection.php';
$conn = Connect();

if(!isset($_SESSION['login_user2'])){
    header("location: customerlogin.php");
    exit();
}

$order_id = $_POST['order_id'];

$query = "
UPDATE orders 
SET order_status='Cancelled' 
WHERE order_id='$order_id'
AND received_status='Not Received'
";

mysqli_query($conn, $query);

header("location: myorders.php");
exit();
?>