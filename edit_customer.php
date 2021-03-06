<?php 
	require('config.php');
	include('includes/database.php');
?>

<?php
	// Assign get variable
	$id = $_GET['id'];

	// Create customer select query
	$query = "SELECT * FROM customers
			INNER JOIN customer_addresses
			ON customer_addresses.customer=customers.id
			WHERE customers.id = $id";

	// GET results
	$result = $mysqli->query($query) or die($mysqli->error.__LINE__);

	if ($result = $mysqli->query($query)){
		// Fetch object array
		while($row = $result->fetch_assoc()){
			$first_name = $row['first_name'];
			$last_name = $row['last_name'];
			$email = $row['email'];
			$address = $row['address'];
			$address2 = $row['address2'];
			$city = $row['city'];
			$state = $row['state'];
			$zipcode = $row['zipcode'];
		}
		// Free Result set
		$result->close();
	}
?>

<?php 
	if($_POST){
		$id = $_GET['id'];
		// Get variables from post array.
		$first_name = mysqli_real_escape_string($mysqli, $_POST['first_name']);
		$last_name = mysqli_real_escape_string($mysqli, $_POST['last_name']);
		$email = mysqli_real_escape_string($mysqli, $_POST['email']);
		$password = mysqli_real_escape_string($mysqli, sha1($_POST['password']));
		$address = mysqli_real_escape_string($mysqli, $_POST['address']);
		$address2 = mysqli_real_escape_string($mysqli, $_POST['address2']);
		$city = mysqli_real_escape_string($mysqli, $_POST['city']);
		$state = mysqli_real_escape_string($mysqli, $_POST['state']);
		$zipcode = mysqli_real_escape_string($mysqli, $_POST['zipcode']);


		// Create customer update query
		$query = "UPDATE customers
				SET
				first_name='$first_name',
				last_name='$last_name',
				email='$email',
				password='$password'
				WHERE id=$id";

		// Run query
		$mysqli->query($query) or die();

		// Create address update query
		$query = "UPDATE customer_addresses
				SET
				address='$address',
				address2='$address2',
				city='$city',
				state='$state',
				zipcode='$zipcode'
				WHERE customer=$id";

		// Run query
		$mysqli->query($query) or die();

		$msg = 'Customer Updated';
		header('Location: index.php?msg='.urlencode($msg).'');
		exit;
	}
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
					<form method="post" action="edit_customer.php?id=<?php echo $id; ?>">
						<div class="form-group">
							<label for="first_name">First Name</label>
							<input name="first_name" type="text" class="form-control" id="first_name" value="<?php echo $first_name; ?>" placeholder="Enter First Name">
						</div>
						<div class="form-group">
							<label for="last_name">Last Name</label>
							<input name="last_name" type="text" class="form-control" id="last_name" value="<?php echo $last_name; ?>" placeholder="Enter Last Name">
						</div>
						<div class="form-group">
							<label for="email">Email address</label>
							<input name="email" type="email" class="form-control" id="email" value="<?php echo $email; ?>" placeholder="Enter Email">
						</div>
						<div class="form-group">
							<label for="password">Password</label>
							<input name="password" type="password" class="form-control" id="password" placeholder="Enter Password">
						</div>
						<div class="form-group">
							<label for="address">Address</label>
							<input name="address" type="text" class="form-control" id="address" value="<?php echo $address; ?>" placeholder="Enter Address">
						</div>
						<div class="form-group">
							<label for="address2">Address 2</label>
							<input name="address2" type="text" class="form-control" id="address2" value="<?php echo $address2; ?>" placeholder="Enter Address 2">
						</div>
						<div class="form-group">
							<label for="city">City</label>
							<input name="city" type="text" class="form-control" id="city" value="<?php echo $city; ?>" placeholder="Enter City">
						</div>
						<div class="form-group">
							<label for="state">State</label>
							<input name="state" type="text" class="form-control" id="state" value="<?php echo $state; ?>" placeholder="Enter State">
						</div>
						<div class="form-group">
							<label for="zipcode">Zipcode</label>
							<input name="zipcode" type="text" class="form-control" id="zipcode" value="<?php echo $zipcode; ?>" placeholder="Enter Zipcode">
						</div>
						<input type="submit" class="btn btn-default" value="Update Customer" />
					</form>
				</div>
			</div>

			<footer class="footer">
			</footer>

		</div> <!-- /container -->
	</body>
</html>