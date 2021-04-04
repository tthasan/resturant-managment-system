<?php

// mysql connection 

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password, 'simpleappdb');

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";


// match username and password

$user_name = $_POST['username'];

$sql = "SELECT password from user WHERE username='$user_name'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    if ( $row['password'] == $_POST['password']) {
        echo "Welcome ".$_POST['username']."!";
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