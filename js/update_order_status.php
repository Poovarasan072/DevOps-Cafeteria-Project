<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['login_user1'])) {
    header("location: managerlogin.php");
    exit();
}

$conn = Connect();

if (isset($_GET['id'])) {
    $order_id = $_GET['id'];

    $query = "UPDATE orders SET status='Completed' WHERE order_ID='$order_id'";
    mysqli_query($conn, $query);
}

header("location: manager_orders.php");
exit();
