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

        ?>
        <form action="calculation.php" method="POST">

            <br>
            <input type="checkbox" id="soup" name="soup" value="soup" /> <label for="soup">Soup</label><br>
            <input type="checkbox" id="onthon" name="onthon" value="onthon" /> <label for="onthon">Onthon</label> <br> 
            <input type="checkbox" id="pakura" name="pakura" value="pakura" /> <label for="soup">Pakura</label> <br> 
            <br>
            <input type="checkbox" id="rice" name="rice" value="rice" /> <label for="Rice">Rice</label><br>
            <input type="checkbox" id="nan" name="nan" value="nan" /> <label for="nan">nan</label><br>
            <input type="checkbox" id="nodols" name="nodols" value="nodols" /> <label for="nodols">nodols</label><br>
            <br>
            <input type="checkbox" id="beef" name="beef" value="beef" /> <label for="beef">beef</label><br>
            <input type="checkbox" id="chicken" name="chicken" value="chicken" /> <label for="chicken">chicken</label><br>
            <input type="checkbox" id="mutton" name="mutton" value="mutton" /> <label for="mutton">mutton</label><br>
            <br>
            <input type="checkbox" id="yogart" name="yogart" value="yogart" /> <label for="yogart">yogart</label><br>
            <input type="checkbox" id="sweet" name="sweet" value="sweet" /> <label for="sweet">Sweet</label><br>
            <input type="checkbox" id="drinks" name="drinks" value="drinks" /> <label for="drinks">drinks</label><br>
            <input type="Submit" value="Submit"/> 
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