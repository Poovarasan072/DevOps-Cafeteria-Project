<?php
session_start();
require 'connection.php';

if (!isset($_SESSION['login_user1'])) {
    header("location: managerlogin.php");
    exit();
}

$conn = Connect();

/* Fetch all orders */
$query = "SELECT * FROM orders ORDER BY order_date DESC";
$result = mysqli_query($conn, $query);
?>

<!DOCTYPE html>
<html>
<head>
<title>Manager Orders</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
<h2 class="text-center">All Customer Orders</h2>

<table class="table table-bordered table-striped">
<tr>
  <th>Order ID</th>
  <th>User</th>
  <th>Food</th>
  <th>Qty</th>
  <th>Price</th>
  <th>Status</th>
  <th>Action</th>
</tr>

<?php
while ($row = mysqli_fetch_assoc($result)) {
?>
<tr>
  <td><?php echo $row['order_ID']; ?></td>
  <td><?php echo $row['username']; ?></td>
  <td><?php echo $row['foodname']; ?></td>
  <td><?php echo $row['quantity']; ?></td>
  <td>₹ <?php echo $row['price']; ?></td>
  <td>
    <span class="<?php echo ($row['status']=='Completed')?'text-success':'text-warning'; ?>">
      <?php echo $row['status']; ?>
    </span>
  </td>
  <td>
    <?php if ($row['status'] == 'Pending') { ?>
      <a href="update_order_status.php?id=<?php echo $row['order_ID']; ?>"
         class="btn btn-success btn-sm">
         Mark Completed
      </a>
    <?php } else { ?>
      <span class="text-muted">Done</span>
    <?php } ?>
  </td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
