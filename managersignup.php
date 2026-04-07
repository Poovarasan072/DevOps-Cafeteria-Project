<html>

<head>
    <title>Manager Signup | Spice Box</title>

    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

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

.dropdown-menu {
    border-radius: 12px;
    border: 1px solid #ddd;
}

/* ===== Welcome Section ===== */
.welcome-section {
    text-align: center;
    color: #444;
    margin-top: 120px;
}

/* ===== Signup Card ===== */
.signup-container {
    margin-top: 40px;
    margin-bottom: 60px;
}

.signup-card {
    position: relative;
    background: #ffffff;
    padding: 45px;
    border-radius: 25px;
    border: 1px solid #e5e5e5;
    border-top: 6px solid #333;
    box-shadow:
        0 20px 50px rgba(0,0,0,0.08),
        inset 0 1px 0 rgba(255,255,255,0.9);
}

/* ===== Inputs ===== */
.form-control {
    border-radius: 15px !important;
    padding: 12px;
    border: 1px solid #dcdcdc;
    background: #fafafa;
}

.form-control:focus {
    border-color: #999;
    background: #ffffff;
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
}

/* ===== Button ===== */
.btn-primary {
    background: linear-gradient(135deg, #ffffff, #e6e6e6);
    border: 1px solid #cfcfcf;
    color: #333;
    border-radius: 15px;
    padding: 10px 20px;
    font-weight: 600;
}

/* Password note */
.password-note {
    font-size: 12px;
    color: #555;
    margin-top: 5px;
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
    <p>Create your manager account to get started.</p>
</div>

<div class="container signup-container">
  <div class="col-md-5 col-md-offset-4">

    <div class="signup-card">
      <h3 class="text-center">Create Manager Account</h3>
      <hr>

      <form action="manager_registered_success.php" method="POST">

        <div class="form-group">
          <label>Full Name</label>
          <input class="form-control" type="text" name="fullname" required>
        </div>

        <div class="form-group">
          <label>Username</label>
          <input class="form-control" type="text" name="username" required>
        </div>

        <div class="form-group">
          <label>Email</label>
          <input class="form-control" type="email" name="email" required>
        </div>

        <div class="form-group">
          <label>Contact</label>
          <input class="form-control" type="text" name="contact" required>
        </div>

        <div class="form-group">
          <label>Address</label>
          <input class="form-control" type="text" name="address" required>
        </div>

        <!-- UPDATED PASSWORD VALIDATION -->
        <div class="form-group">
          <label>Password</label>
          <input 
              class="form-control" 
              type="password" 
              name="password" 
              pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$"
              title="Password must contain at least 8 characters, one uppercase letter, one number, and one special character"
              required>
          <div class="password-note">
              Must contain: 1 uppercase, 1 number, 1 special character (minimum 8 characters)
          </div>
        </div>

        <button class="btn btn-primary btn-block" type="submit">
            Submit
        </button>

      </form>

      <hr>

      <div class="text-center">
        Have an account? <a href="managerlogin.php">Login</a>
      </div>

    </div>
  </div>
</div>

</body>
</html>