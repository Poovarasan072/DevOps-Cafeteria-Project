<?php

include('session_m.php');
require_once 'connection.php';

$conn = Connect();

if(!isset($login_session)){
header('Location: managerlogin.php'); 
exit();
}


/* GET SELECTED FOOD IDS */

$cheks = implode("','", $_POST['checkbox']);


/* DISABLE SELECTED FOOD ITEMS */

$sql = "UPDATE food SET `options` = 'DISABLE' WHERE F_ID in ('$cheks')";

$result = mysqli_query($conn,$sql) or die(mysqli_error($conn));


/* REDIRECT BACK */

header('Location: delete_food_items.php');


$conn->close();

?>