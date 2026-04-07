<?php
session_start(); 
$error=''; 

if (isset($_POST['submit'])) {

if (empty($_POST['username']) || empty($_POST['password'])) {
$error = "Username or Password is invalid";
}
else
{

$username = $_POST['username'];
$password = $_POST['password'];

require 'connection.php';
$conn = Connect();

// FIXED TABLE NAME
$query = "SELECT username, password FROM manager WHERE username=? AND password=? LIMIT 1";

$stmt = $conn->prepare($query);

if($stmt === false){
die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$stmt->bind_result($username, $password);
$stmt->store_result();

if ($stmt->fetch())  
{
$_SESSION['login_user1']=$username;
header("location: myrestaurant.php");
} 
else 
{
$error = "Username or Password is invalid";
}

$stmt->close();
mysqli_close($conn);

}
}
?>