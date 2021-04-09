<?php

session_start([
    'cookie_lifetime' => 86400,
]);
// mysql connection 

include 'includes/connect_db.php';
include 'includes/header.php';

// match username and password


$user_name = $_POST['username'];

if ( !isset($_SESSION['username']) ) {
    $sql = "SELECT * from customer WHERE customer_name='$user_name'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        $row = $result->fetch_assoc();

        if ($row['customer_password'] == $_POST['password']) {

            $_SESSION['username'] = $_POST['username'];
            $_SESSION['customer_id'] = $row['customer_id'];

        }
    }
    else {
        echo "You have put a wrong password, please <a href='index.html'>try again</a>.";
        session_unset();
    }
}

if (isset($_SESSION['username'])) {

        $sql_menu = "SELECT * from menu";
        $result_menu = $conn->query($sql_menu);

        include 'includes/header.php';
?> 

<div class="container">
    <div class="row">
        <div class="col">
            <nav class="navbar navbar-dark bg-dark"></nav>
        </div>
    </div>
    <div class="row">
        <div class="col-sm"> </div>
        <div class="col-sm"> 
            <p> Welcome, <strong> <?php echo $_POST['username'] ?> </strong> ! </p>
            <form action=order_confirmation.php method='POST'>
                <p class="text-danger"> Select one menu from below :</p>
                <?php
                    if($result_menu->num_rows > 0) {
                        while($row_menu = $result_menu->fetch_assoc()) { 
                        ?>  
                            <div class="form-check"> 
                                <?php  echo '<input type="radio" class="form-check-input" id="'.$row_menu['menu_id'].'" name="menu" value="'.$row_menu['menu_id'].'">';
                                echo '<label class="form-check-label" for="'.$row_menu['menu_id'].'">'.$row_menu['menu_description'].' - '.$row_menu['menu_price'].' Taka</label><br>'; ?>
                            </div> 
                        <?php
                        }
                    }
                ?>
                <br> 
                <p> How many number of menu you went to order : </p>
                <!-- <label for="quantity">Quantity (between 1 and 5):</label> -->
                <input class="form-control" type="number" id="quantity" name="quantity" min="1" max="5">
                <br> 
                <input type="submit" class="btn btn-primary" value="Confirm Order"/>
            </form> 
        </div>
        <div class="col-sm"> </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
}
else {
    echo "0 results";
}
$conn->close();


?>