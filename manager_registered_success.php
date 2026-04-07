<html>

<head>
    <title>Manager Registration | Spice Box</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

<style>

/* ===== Metallic Light Green Animated Background ===== */
body {
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #e8f5e9, #c8e6c9, #a5d6a7);
    background-size: 300% 300%;
    animation: greenBG 15s ease infinite;
}

@keyframes greenBG {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== Navbar ===== */
.navbar {
    background: linear-gradient(to right, #66bb6a, #43a047);
    border-bottom: 3px solid #2e7d32;
    box-shadow: 0 4px 20px rgba(0,0,0,0.2);
}

.navbar-brand,
.navbar-nav > li > a {
    color: #ffffff !important;
    font-weight: 600;
}

.navbar-nav > li > a:hover {
    color: #f1f8e9 !important;
}

/* ===== Scroll To Top Button ===== */
#myBtn {
    display: none;
    position: fixed;
    bottom: 30px;
    right: 30px;
    z-index: 99;
    border: none;
    outline: none;
    background: linear-gradient(135deg, #43a047, #81c784);
    color: #fff;
    cursor: pointer;
    padding: 12px 15px;
    border-radius: 50%;
    box-shadow: 0 6px 20px rgba(0,0,0,0.3);
    transition: 0.3s ease;
}

#myBtn:hover {
    transform: scale(1.15);
}

/* ===== Success Card ===== */
.jumbotron {
    margin-top: 120px;
    background: linear-gradient(135deg, #ffffff, #f1f8e9);
    border-radius: 25px;
    padding: 60px;
    position: relative;
    overflow: hidden;
    border: 1px solid #c5e1a5;
    border-top: 6px solid #43a047;
    box-shadow: 0 25px 60px rgba(0,0,0,0.15);
    animation: fadeUp 1s ease;
}

/* Shine Animation */
.jumbotron::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.5),
        transparent
    );
    transform: rotate(25deg);
    animation: shine 6s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) rotate(25deg); }
    100% { transform: translateX(100%) rotate(25deg); }
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* Text Styling */
.jumbotron h1 {
    font-weight: 700;
    color: #2e7d32;
}

.jumbotron h2 {
    font-weight: 600;
    color: #388e3c;
}

.jumbotron p {
    font-size: 16px;
    color: #1b5e20;
}

.jumbotron a {
    font-weight: 600;
    color: #1b5e20;
    text-decoration: none;
}

.jumbotron a:hover {
    text-decoration: underline;
}

</style>

</head>

<body>

<button onclick="topFunction()" id="myBtn" title="Go to top">
    <span class="glyphicon glyphicon-chevron-up"></span>
</button>

<script type="text/javascript">
window.onscroll = function() {
    scrollFunction()
};

function scrollFunction(){
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<nav class="navbar navbar-fixed-top navigation-clean-search" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">Spice Box</a>
        </div>

        <ul class="nav navbar-nav">
            <li class="active"><a href="index.php">Home</a></li>
            <li><a href="aboutus.php">About</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        </ul>
    </div>
</nav>

<?php

require 'connection.php';
$conn = Connect();

$fullname = $conn->real_escape_string($_POST['fullname']);
$username = $conn->real_escape_string($_POST['username']);
$email = $conn->real_escape_string($_POST['email']);
$contact = $conn->real_escape_string($_POST['contact']);
$address = $conn->real_escape_string($_POST['address']);
$password = $conn->real_escape_string($_POST['password']);

$query = "INSERT into manager(fullname,username,email,contact,address,password) VALUES('" . $fullname . "','" . $username . "','" . $email . "','" . $contact . "','" . $address ."','" . $password ."')";
$success = $conn->query($query);

if (!$success){
    die("Couldnt enter data: ".$conn->error);
}

$conn->close();

?>

<div class="container">
    <div class="jumbotron text-center">
        <h2><?php echo "Welcome Manager $fullname!" ?></h2>
        <h1>Your account has been created successfully.</h1>
        <p>Login Now from <a href="managerlogin.php">HERE</a></p>
    </div>
</div>

</body>
</html>