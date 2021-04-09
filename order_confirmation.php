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
?>


<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-dark bg-dark"></nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm"></div>
        <div class="col-sm">
            <p></p>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th><th>Item</th><th>Quantity</th><th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td> <?php echo $row_menu['menu_description']; ?> </td>
                        <td> <?php echo $_POST['quantity']; ?> </td>
                        <td> <?php echo $total_price; ?> </td>
                    </tr>
                </tbody>
            </table>

        </div>
        <div class="col-sm"></div>
    </div>
    <div class="row">
        <div class="col-6"></div>
        <div class="col-2">
            <form action="payment_confirmation.php" method="post">
                <input type="hidden" value="" name="">
                <?php echo "<input type='hidden' name='menu_id' value='".$_POST['menu']."'>"; ?>
                <?php echo "<input type='hidden' name='menu_quantity' value='".$_POST['quantity']."'>"; ?>
                <?php echo "<input type='hidden' name='total_price' value='".$total_price."'>"; ?>
                <input class="form-control btn btn-primary"" type="submit" value="Confirm">
            </form>
        </div>
        <div class="col-4"></div>
    </div>
</div>


<?php include 'includes/footer.php'; ?>
<?php } ?>