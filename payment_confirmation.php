<?php
session_start();

include 'includes/connect_db.php';


$sql_order = "INSERT INTO `customer_order` (`order_id`, `customer_id`, `menu_id`, `menu _quentatiy`, `total_price`) VALUES (NULL, '".$_SESSION['customer_id']."', '".$_POST['menu_id']."', '".$_POST['menu_quantity']."', '".$_POST['total_price']."')";

$conn->query($sql_order);

$sql_id = "SELECT MAX(order_id) FROM customer_order";
$result_id = $conn->query($sql_id);

if ($result_id->num_rows > 0) {

    $row_id = $result_id->fetch_assoc();

    $sql_payment = "INSERT INTO `payment` (`payment_id`, `order_id`, `customer_id`, `order_date`) VALUES (NULL, '".$row_id['MAX(order_id)']."', '".$_SESSION['customer_id']."', CURRENT_TIMESTAMP)";

    $conn->query($sql_payment);

}

include 'includes/header.php'

?>

<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-dark bg-dark"></nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm"> <p class="text-success">Your payment is confirmed. Please go to <a href='dashboard.php'>Dashboard</a></p></div>
        <div class="col-sm"></div>
    </div>
</div>



<?php include 'includes/footer.php'; ?>
