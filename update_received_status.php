<?php
require 'connection.php';
$conn = Connect();

if(isset($_POST['order_id'], $_POST['received_status'])){

    $order_id = $_POST['order_id'];
    $received_status = $_POST['received_status'];

    $sql = "UPDATE orders 
            SET received_status='$received_status' 
            WHERE order_ID='$order_id'";

    mysqli_query($conn, $sql);
}

header("Location: view_orders.php");
?>
