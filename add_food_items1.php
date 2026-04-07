<?php

include('session_m.php');

if(!isset($login_session)){
header('Location: managerlogin.php'); 
exit();
}

$name = $conn->real_escape_string($_POST['name']);
$price = $conn->real_escape_string($_POST['price']);
$description = $conn->real_escape_string($_POST['description']);
$images_path = $conn->real_escape_string($_POST['images_path']);

// Storing Session
$user_check = $_SESSION['login_user1'];

// Get Restaurant ID
$R_IDsql = "SELECT R_ID FROM RESTAURANTS WHERE M_ID='$user_check'";
$R_IDresult = mysqli_query($conn,$R_IDsql);

$R_ID = "";

if($R_IDresult && mysqli_num_rows($R_IDresult) > 0){
    $R_IDrs = mysqli_fetch_array($R_IDresult, MYSQLI_BOTH);
    $R_ID = $R_IDrs['R_ID'];
}

// Insert Food Item
$query = "INSERT INTO FOOD(name,price,description,R_ID,images_path) 
VALUES('$name','$price','$description','$R_ID','$images_path')";

$success = mysqli_query($conn,$query);

if (!$success){

?>

<!DOCTYPE html>
<html>
<head>
<title></title>

<link rel="stylesheet" type="text/css" href="css/add_food_items.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>

</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
<span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script>
window.onscroll=function(){scrollFunction()};

function scrollFunction(){
if(document.body.scrollTop>20||document.documentElement.scrollTop>20){
document.getElementById("myBtn").style.display="block";
}else{
document.getElementById("myBtn").style.display="none";
}
}

function topFunction(){
document.body.scrollTop=0;
document.documentElement.scrollTop=0;
}
</script>

<nav class="navbar navbar-inverse navbar-fixed-top navigation-clean-search">

<div class="container">

<div class="navbar-header">

<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar">

<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>

</button>

<a class="navbar-brand" href="index.php">Le Cafe'</a>

</div>

<div class="collapse navbar-collapse" id="myNavbar">

<ul class="nav navbar-nav">

<li><a href="index.php">Home</a></li>
<li><a href="aboutus.php">About</a></li>
<li><a href="contactus.php">Contact Us</a></li>

</ul>

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

</div>

</nav>

<div class="container">

<div class="jumbotron">

<h1>Oops...!!!</h1>

<p>Kindly enter your Restaurant details before adding food items.</p>

<p>
<a href="myrestaurant.php">Click Me</a>
</p>

</div>

</div>

<br><br><br><br><br><br><br><br><br><br><br><br>

</body>
</html>

<?php

}
else {

echo "SUCCESS";
header('Location: add_food_items.php');
exit();

}

$conn->close();

?>