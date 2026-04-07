<?php
include('login_m.php'); 

if(isset($_SESSION['login_user1'])){
header("location: myrestaurant.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Login | Spice Box</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<style>

/* ===== Smooth White-Grey Background ===== */
body {
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #ffffff, #f5f5f5, #eaeaea);
    background-size: 300% 300%;
    animation: bgMove 20s ease infinite;
}

@keyframes bgMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== Navbar (Stable No Color Change) ===== */
.navbar {
    background: #1f1f1f;
    border: none;
}

.navbar-brand {
    color: #ffffff !important;
    font-weight: bold;
}

.navbar-nav > li > a {
    color: #ffffff !important;
    font-weight: 600;
}

/* Disable bootstrap hover background */
.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus,
.navbar-nav > .open > a,
.navbar-nav > .open > a:hover,
.navbar-nav > .open > a:focus {
    background-color: transparent !important;
    color: #ffffff !important;
}

/* ===== Dropdown Grey Stable ===== */
.dropdown-menu {
    background-color: #f3f3f3;
    border-radius: 12px;
    border: 1px solid #ddd;
}

.dropdown-menu > li > a:hover {
    background-color: #e0e0e0;
}

/* ===== Welcome Section ===== */
.welcome-section {
    text-align: center;
    color: #333;
    margin-top: 120px;
    animation: fadeDown 1s ease;
}

@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-30px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Shiny Login Card ===== */
.login-card {
    position: relative;
    background: white;
    padding: 45px;
    border-radius: 25px;
    border: 1px solid #ddd;
    border-top: 5px solid #1f1f1f;
    box-shadow: 0 20px 60px rgba(0,0,0,0.1);
    overflow: hidden;
    transition: 0.4s ease;
}

/* Shine Effect */
.login-card::before {
    content: "";
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(
        120deg,
        transparent,
        rgba(255,255,255,0.4),
        transparent
    );
    transform: rotate(25deg);
    animation: shine 6s infinite;
}

@keyframes shine {
    0% { transform: translateX(-100%) rotate(25deg); }
    100% { transform: translateX(100%) rotate(25deg); }
}

.login-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 30px 70px rgba(0,0,0,0.15);
}

/* ===== Inputs ===== */
.form-control {
    border-radius: 12px;
    border: 1px solid #ccc;
    padding: 12px;
    transition: 0.3s ease;
}

.form-control:focus {
    border-color: #999;
    box-shadow: 0 0 12px rgba(0,0,0,0.08);
}

/* ===== Button ===== */
.btn-primary {
    background: linear-gradient(135deg, #ffffff, #dddddd);
    border: 1px solid #bbb;
    color: #333;
    border-radius: 12px;
    font-weight: 600;
    transition: 0.3s ease;
}

.btn-primary:hover {
    background: linear-gradient(135deg, #f0f0f0, #dcdcdc);
    transform: scale(1.05);
}

/* Error */
.error-text {
    color: #c0392b;
    font-weight: 500;
}

</style>
</head>

<body>

<nav class="navbar navbar-fixed-top">
  <div class="container">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Spice Box</a>
    </div>

    <ul class="nav navbar-nav navbar-right">
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-user"></span> Sign Up <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="customersignup.php">User Sign-up</a></li>
          <li><a href="managersignup.php">Manager Sign-up</a></li>
        </ul>
      </li>

      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <span class="glyphicon glyphicon-log-in"></span> Login <span class="caret"></span>
        </a>
        <ul class="dropdown-menu">
          <li><a href="customerlogin.php">User Login</a></li>
          <li><a href="managerlogin.php">Manager Login</a></li>
        </ul>
      </li>
    </ul>
  </div>
</nav>

<div class="container welcome-section">
    <h1>Hi Manager 👋<br> Welcome to <span style="font-weight:600;">Spice Box</span></h1>
    <p>Kindly LOGIN to continue.</p>
</div>

<div class="container" style="margin-top: 40px; margin-bottom: 50px;">
  <div class="col-md-4 col-md-offset-4">

    <label class="error-text"><?php echo $error; ?></label>

    <div class="login-card">

      <h3 class="text-center">Manager Login</h3>
      <hr>

      <form action="" method="POST">

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="username" placeholder="Enter Username" required autofocus>
        </div>

        <div class="form-group">
          <label>Password</label>
          <input class="form-control" type="password" name="password" placeholder="Enter Password" required>
        </div>

        <button class="btn btn-primary btn-block" name="submit" type="submit">
            Login
        </button>

      </form>

      <hr>

      <div class="text-center">
        New here? <a href="managersignup.php">Create a new account</a>
      </div>

    </div>

  </div>
</div>

</body>
</html>
