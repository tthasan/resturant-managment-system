<?php

session_start();

echo $_SESSION['username']."<br>";

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password, 'rmsdb');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

echo $_POST['menu']."<br>";
echo $_POST['quantity']."<br>";





