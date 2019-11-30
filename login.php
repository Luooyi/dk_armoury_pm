<?php
	
	include_once("connection.php");
	$conn = OpenCon();
	session_start();
    global $mysqli;
	$email = $_POST['email'];
    $password = $_POST['password'];
	
	$sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
	$result1 = $conn->query($sql);
	while ($row = mysqli_fetch_assoc($result1)) {

		$_SESSION['usuario']=$row['first_name']; // Initializing Session
        $_SESSION['idUsuario']=$row['ID']; // Initializing Session
	}
	
	$conn->close();
	header("location: index.php");
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
				<?php if($result1) { ?>
                        <h3>REGISTRO GUARDADO</h3>
                        <?php } else { ?>
                        <h3>ERROR AL GUARDAR</h3>
                    <?php } ?>
					<a href="index.php" class="btn btn-primary">Regresar</a>
					
				</div>
			</div>
		</div>
	</body>
</html>