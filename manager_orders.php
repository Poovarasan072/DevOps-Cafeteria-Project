<?php
include('session_m.php');
require 'connection.php';

if(!isset($login_session)){
    header('Location: managerlogin.php');
}

$conn = Connect();

// Update order status
if(isset($_POST['update_status'])){
    $order_id = $_POST['order_id'];
    $status = $_POST['status'];

    $sql = "UPDATE orders SET status='$status' WHERE order_ID='$order_id'";
    mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manager Orders | Spice Box</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <a class="navbar-brand" href="myrestaurant.php">Spice Box</a>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#">Welcome <?php echo $login_session; ?></a></li>
            <li><a href="logout_m.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="container">
    <h2 class="text-center">Customer Orders</h2>
    <hr>

    <table class="table table-bordered table-striped">
        <tr>
            <th>Order ID</th>
            <th>Food Name</th>
            <th>Price</th>
            <th>Qty</th>
            <th>User</th>
            <th>Order Date</th>
            <th>Status</th>
            <th>Action</th>
        </tr>

        <?php
        $sql = "SELECT * FROM orders ORDER BY order_date DESC";
        $result = mysqli_query($conn, $sql);

        while($row = mysqli_fetch_assoc($result)){
        ?>
        <tr>
            <td><?php echo $row['order_ID']; ?></td>
            <td><?php echo $row['foodname']; ?></td>
            <td>₹<?php echo $row['price']; ?></td>
            <td><?php echo $row['quantity']; ?></td>
            <td><?php echo $row['username']; ?></td>
            <td><?php echo $row['order_date']; ?></td>
            <td>
                <span class="label label-<?php echo ($row['status']=='Completed')?'success':'warning'; ?>">
                    <?php echo $row['status']; ?>
                </span>
            </td>
            <td>
                <form method="POST" style="display:inline;">
                    <input type="hidden" name="order_id" value="<?php echo $row['order_ID']; ?>">
                    <select name="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Completed">Completed</option>
                    </select>
                    <br>
                    <button type="submit" name="update_status" class="btn btn-primary btn-sm">
                        Update
                    </button>
                </form>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
