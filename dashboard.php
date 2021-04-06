<?php

// mysql connection 

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, 'rmsdb');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


// match username and password

$user_name = $_POST['username'];

$sql = "SELECT customer_password from customer WHERE customer_name='$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    if ( $row['customer_password'] == $_POST['password']) {
        echo "Welcome ".$_POST['username']."!";
        ?>
            <form action="payment.php" method='POST'>
            <form>
            <p> select one menu from below,</p>
  <input type="radio" id="menu1" name="menu" value="menu1">
  <label for="menu1">rice fish soup drinks</label><br>
  <input type="radio" id="menu2" name="menu" value="menu2">
  <label for="menu2">rice mutton soup drinks</label><br>
  <input type="radio" id="menu3" name="menu" value="menu3">
  <label for="menu3">rice chicken soup drinks</label><br>
  <input type="radio" id="menu4" name="menu" value="menu4">
  <label for="menu4">rice beef soup drinks</label>
 <p>
  how many number of  menu you went to order </p>
  <label for="quantity">Quantity (between 1 and 5):</label>
  <input type="number" id="quantity" name="quantity" min="1" max="5">
  <input type="submit">
</form>


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