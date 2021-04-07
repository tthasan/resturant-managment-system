<?php

session_start();
include 'includes/connect_db.php';

$sql_menu = "select * from menu where menu_id=".$_POST['menu'];
$result_menu = $conn->query($sql_menu);

if ($result_menu->num_rows > 0) {
    // output data of each row
    $row_menu = $result_menu->fetch_assoc();

    $total_price = (int) $row_menu['menu_price'] * (int) $_POST['quantity'];

    include 'includes/header.php';
    echo "You have ordered ".$row_menu['menu_description']." x ".$_POST['quantity']." times.<br>";
    echo "Your total price is ".$total_price."<br>";

?>
<div class="container">
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <p></p>
            <form action="payment_confirmation.php" method="post">
                <input type="hidden" value="" name="">
                <?php echo "<input type='hidden' name='menu_id' value='".$_POST['menu']."'>"; ?>
                <?php echo "<input type='hidden' name='menu_quantity' value='".$_POST['quantity']."'>"; ?>
                <?php echo "<input type='hidden' name='total_price' value='".$total_price."'>"; ?>
                Please <input type="submit" value="confirm"> to proceed or go to <a href="dashboard.php">Dashboard</a> to edit your menu.
            </form>
        </div>
        <div class="col-sm"></div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
<?php } ?>