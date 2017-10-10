<?php 
	require('config.php');
	include('includes/database.php');
?>

<?php
	// Assign get variable
	$id = $_GET['id'];

	// Create customer select query
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>Customer Manager | Edit Customer</title>
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/jumbotron-narrow.css">
		<link rel="stylesheet" type="text/css" href="<?php echo ROOT_PATH; ?>assets/css/style.css">
	</head>

	<body>

		<div class="container">
			<div class="header clearfix">
				<nav>
					<ul class="nav nav-pills pull-right">
						<li><a href="index.php">Home</a></li>
						<li class="active"><a href="add_customer.php">Add Customer</a></li>
					</ul>
				</nav>
				<h3 class="text-muted">Store Customer Manager</h3>
			</div>

			<div class="row marketing">
				<div class="col-lg-12">
					<h2>Add Customer</h2>
					<form method="post" action="add_customer.php">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input name="first_name" type="text" class="form-control" id="first_name" placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input name="last_name" type="text" class="form-control" id="last_name" placeholder="Enter Last Name">
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input name="email" type="email" class="form-control" id="email" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input name="address" type="text" class="form-control" id="address" placeholder="Enter Address">
						</div>
						<div class="form-group">
							<label for="address2">Address 2</label>
							<input name="address2" type="text" class="form-control" id="address2" placeholder="Enter Address 2">
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input name="city" type="text" class="form-control" id="city" placeholder="Enter City">
						</div>
						<div class="form-group">
							<label for="state">State</label>
							<input name="state" type="text" class="form-control" id="state" placeholder="Enter State">
						</div>
						<div class="form-group">
							<label for="zipcode">Zipcode</label>
							<input name="zipcode" type="text" class="form-control" id="zipcode" placeholder="Enter Zipcode">
						</div>
						<input type="submit" class="btn btn-default" value="Add Customer" />
					</form>
				</div>
			</div>

			<footer class="footer">
			</footer>

		</div> <!-- /container -->
	</body>
</html>