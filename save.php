<?php
	
	include_once("connection.php");
	$conn = OpenCon();
    global $mysqli;
	
	$gender = isset($_POST['gender']) ? $_POST['gender'] : 0;
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
		$day_birth = $_POST['day_birth'];
			$month_birth = $_POST['month_birth'];
				$year_birth = $_POST['year_birth'];
		$company = $_POST['company'];
	$email = $_POST['email'];
		$street_adress = $_POST['street_adress'];
				$street_adresstwo = $_POST['street_adresstwo'];
								$zip_code = $_POST['zip_code'];
												$city = $_POST['city'];
								$country = $_POST['country'];
																$state = $_POST['state'];
	$phone = $_POST['phone'];
	$password = $_POST['password'];
	
	$sql = "INSERT INTO `users` (`gender`, `first_name`, `last_name`, `day_birth`, `month_birth`, `year_birth`, `company`, `email`, `street_adress`, `street_adresstwo`, `zip_code`, `city`, `country`, `state`, `phone`, `password`) VALUES ('$gender', '$first_name', '$last_name', '$day_birth', '$month_birth', '$year_birth', '$company', '$email', '$street_adress', '$street_adresstwo', '$zip_code', '$city','$country', '$state', '$phone', '$password')";
	if ($conn->query($sql) === TRUE) {
		echo "New record created successfully";
	} else {
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
?>

<html lang="es">
	<head>
		
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-3.1.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>	
	</head>
	
	<body>
		<div class="container">
			<div class="row">
				<div class="row" style="text-align:center">
					
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>