<?php include 'includes/header.php' ?>

<div class="container">
	<div class="row">
        <div class="col">
            <nav class="navbar navbar-dark bg-dark"></nav>
        </div>
    </div>

	<div class="row">
		<div class="col">
			<p class="text-center">Welcome to our resturant management system</p>
    	</div>
	</div>

  <div class="row">
    <div class="col-sm"> </div>
    <div class="col-sm">
		<form action="dashboard.php" method="post">
			<div class="mb-3">
				<input type="text" class="form-control" placeholder="Enter Username" name="username" required>
			</div>
		
			<div class="mb-3">
				<input type="password" class="form-control" placeholder="Enter Password" name="password" required>
			</div>
			
			<button type="submit" class="btn btn-primary">Login</button>
	</form>
    </div>
    <div class="col-sm"> </div>
  </div>
</div>


<?php include 'includes/footer.php' ?>



