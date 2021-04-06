<?php

session_start([
    'cookie_lifetime' => 86400,
]);
// mysql connection 

include 'includes/connect_db.php';

// match username and password

$user_name = $_POST['username'];




$sql = "SELECT * from customer WHERE customer_name='$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();

    if ( $row['customer_password'] == $_POST['password']) {
        echo "Welcome ".$_POST['username']."!";

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['customer_id'] = $row['customer_id'];

        $sql_menu = "SELECT * from menu";
        $result_menu = $conn->query($sql_menu);

        ?> 
        <form action=order_confirmation.php method='POST'>
            <p> select one menu from below</p>
            <?php
                if($result_menu->num_rows > 0) {
                    while($row_menu = $result_menu->fetch_assoc()) {
                        echo '<input type="radio" id="'.$row_menu['menu_id'].'" name="menu" value="'.$row_menu['menu_id'].'">';
                        echo '<label for="'.$row_menu['menu_id'].'">'.$row_menu['menu_description'].' - '.$row_menu['menu_price'].' Taka</label><br>';
                    }
                }
            ?>

            <p> how many number of  menu you went to order </p>
            <label for="quantity">Quantity (between 1 and 5):</label>
            <input type="number" id="quantity" name="quantity" min="1" max="5">
            <input type="submit" value="Confirm Order">
        </form> 

<?php
    }
    else {
        echo "You have put a wrong password, please <a href='index.html'>try again</a>.";
    }
  
} 
else {
    echo "0 results";
}
$conn->close();
    
?>