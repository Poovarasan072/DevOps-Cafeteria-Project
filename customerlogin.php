<?php
include('login_u.php'); 

if(isset($_SESSION['login_user2'])){
header("location: foodlist.php"); 
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Guest Login | Spice Box</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

<style>

/* ===== Animated White-Grey Background ===== */
body {
    font-family: 'Segoe UI', sans-serif;
    min-height: 100vh;
    background: linear-gradient(135deg, #ffffff, #f2f2f2, #e6e6e6);
    background-size: 300% 300%;
    animation: bgMove 18s ease infinite;
}

@keyframes bgMove {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
}

/* ===== Navbar ===== */
.navbar {
    background: #ffffff;
    border-bottom: 3px solid #333;
    box-shadow: 0 4px 20px rgba(0,0,0,0.05);
}

.navbar-brand {
    font-size: 22px;
    font-weight: bold;
    color: #333 !important;
}

.navbar-nav > li > a {
    color: #333 !important;
    font-weight: 600;
}

/* Keep dropdown stable */
.navbar-nav > li > a:hover,
.navbar-nav > li > a:focus,
.navbar-nav > .open > a,
.navbar-nav > .open > a:hover,
.navbar-nav > .open > a:focus {
    background-color: transparent !important;
    color: #000 !important;
}

.dropdown-menu {
    border-radius: 12px;
    border: 1px solid #ddd;
}

.dropdown-menu > li > a:hover {
    background-color: #f0f0f0;
}

/* ===== Welcome Section ===== */
.welcome-section {
    text-align: center;
    color: #444;
    margin-top: 120px;
    animation: fadeDown 1s ease;
}

@keyframes fadeDown {
    from { opacity: 0; transform: translateY(-25px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Login Card ===== */
.login-card {
    position: relative;
    background: white;
    padding: 45px;
    border-radius: 25px;
    border: 1px solid #e5e5e5;
    border-top: 6px solid #333;
    box-shadow:
        0 20px 50px rgba(0,0,0,0.08),
        inset 0 1px 0 rgba(255,255,255,0.9);
    transition: 0.4s ease;
    animation: fadeUp 1s ease;
    overflow: hidden;
}

/* Shine animation */
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
    transform: translateY(-6px);
    box-shadow:
        0 25px 60px rgba(0,0,0,0.12);
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Form Inputs ===== */
.form-control {
    border-radius: 15px;
    padding: 12px;
    border: 1px solid #dcdcdc;
    background: #fafafa;
    transition: 0.3s ease;
}

.form-control:focus {
    border-color: #999;
    background: #ffffff;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    transform: scale(1.02);
}

/* ===== Button ===== */
.btn-primary {
    background: linear-gradient(135deg, #ffffff, #e6e6e6);
    border: 1px solid #cfcfcf;
    color: #333;
    border-radius: 15px;
    padding: 12px;
    font-weight: 600;
    transition: 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.btn-primary:hover {
    background: linear-gradient(135deg, #f5f5f5, #dddddd);
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* Divider */
hr {
    border-color: #eeeeee;
    margin: 25px 0;
}

/* Links */
.create-link a {
    color: #555;
    font-weight: 500;
    transition: 0.3s ease;
}

.create-link a:hover {
    color: #000;
    text-decoration: underline;
}

/* Error Styling */
.error-text {
    color: #c0392b;
    font-weight: 500;
    border-left: 3px solid #c0392b;
    padding-left: 8px;
    display: block;
    margin-bottom: 15px;
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
    <h1>Hi Customer 👋<br> Welcome to <span style="font-weight:600;">Spice Box</span></h1>
    <p>Please login to continue your delicious journey.</p>
</div>

<div class="container" style="margin-top: 40px; margin-bottom: 50px;">
  <div class="col-md-4 col-md-offset-4">

    <label class="error-text"><?php echo $error; ?></label>

    <div class="login-card">

      <h3 class="text-center">Customer Login</h3>
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

      <div class="text-center create-link">
        New here? <a href="customersignup.php">Create a new account</a>
      </div>

    </div>

  </div>
</div>

</body>
</html>
