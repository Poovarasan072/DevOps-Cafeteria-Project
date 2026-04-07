<?php
session_start();
require_once 'connection.php';

if(!isset($_SESSION['login_user1'])){
    header("location: managerlogin.php");
    exit();
}

$conn = Connect();

if(isset($_POST['food_id'])){

    $food_id = mysqli_real_escape_string($conn, $_POST['food_id']);

    $query = "UPDATE food SET is_offer = 1 WHERE F_ID = '$food_id'";
    mysqli_query($conn, $query);
}

header("location: view_orders.php");
exit();
?>