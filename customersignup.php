<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Customer Signup | Spice Box</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
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

/* ===== Navbar (Same Final Theme) ===== */
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

/* ===== Signup Card ===== */
.signup-container {
    margin-top: 130px;
    margin-bottom: 60px;
}

.signup-card {
    position: relative;
    background: #ffffff;
    padding: 45px;
    border-radius: 25px;
    border: 1px solid #e5e5e5;
    border-top: 6px solid #333; /* Dark Accent Strip */
    box-shadow:
        0 20px 50px rgba(0,0,0,0.08),
        inset 0 1px 0 rgba(255,255,255,0.9);
    transition: 0.4s ease;
    animation: fadeUp 1s ease;
    overflow: hidden;
}

/* Metallic Shine Effect */
.signup-card::before {
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

.signup-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 25px 60px rgba(0,0,0,0.12);
}

@keyframes fadeUp {
    from { opacity: 0; transform: translateY(40px); }
    to { opacity: 1; transform: translateY(0); }
}

/* ===== Title ===== */
.signup-title {
    text-align: center;
    margin-bottom: 30px;
    font-weight: 700;
    color: #222;
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
.btn-custom {
    background: linear-gradient(135deg, #ffffff, #e6e6e6);
    border: 1px solid #cfcfcf;
    color: #333;
    border-radius: 15px;
    padding: 12px;
    font-weight: 600;
    transition: 0.3s ease;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.btn-custom:hover {
    background: linear-gradient(135deg, #f5f5f5, #dddddd);
    transform: scale(1.05);
    box-shadow: 0 8px 20px rgba(0,0,0,0.08);
}

/* ===== Password Note ===== */
.password-note {
    font-size: 12px;
    color: #555;
    margin-top: 5px;
}

/* ===== Login Link ===== */
.login-link {
    margin-top: 20px;
    text-align: center;
    color: #444;
}

.login-link a {
    font-weight: 600;
    color: #000;
    transition: 0.3s ease;
}

.login-link a:hover {
    text-decoration: underline;
}

</style>
</head>

<body>

<nav class="navbar navbar-fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Spice Box</a>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="customerlogin.php">Login</a></li>
        </ul>
    </div>
</nav>

<div class="container signup-container">
    <div class="row">
        <div class="col-md-5 col-md-offset-4">

            <div class="signup-card">
                <h3 class="signup-title">Create Your Account</h3>

                <form action="customer_registered_success.php" method="POST">

                    <div class="form-group">
                        <label>Full Name</label>
                        <input type="text" name="fullname" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Contact</label>
                        <input type="text" name="contact" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input 
                            type="password" 
                            name="password" 
                            class="form-control"
                            pattern="^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).{8,}$"
                            title="Password must contain at least 8 characters, one uppercase letter, one number, and one special character"
                            required>
                        <div class="password-note">
                            Must contain: 1 uppercase, 1 number, 1 special character (min 8 characters)
                        </div>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-custom btn-block">
                            Create Account
                        </button>
                    </div>

                    <div class="login-link">
                        Already have an account? 
                        <a href="customerlogin.php">Login here</a>
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>
