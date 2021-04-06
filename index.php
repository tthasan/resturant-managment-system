<?php



$str1 = "Welcome Resturant Management system. <br>"; 
$str2 = "Welcome to our Application <br>"; 
$str3 = "Welcome please login before you order. <br>;";

echo $str1;

?>

<form action="dashboard.php" method="post">
	<div class="container">
	  <input type="text" placeholder="Enter Username" name="username" required>
	  <input type="password" placeholder="Enter Password" name="password" required>
	  <button type="submit">Login</button>
	</div>
</form>