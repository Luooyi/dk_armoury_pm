<?php
	
	include_once("connection.php");
	$conn = OpenCon();
	session_start();
    global $mysqli;

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	mysqli_next_result($conn);



	$usuario = $_SESSION['idUsuario'];
	$query3 = "SELECT * FROM cart WHERE IDUser = '$usuario'"; 
	$result3 = $conn->query($query3);
	while ($row2 = mysqli_fetch_assoc($result3)) {
		$IDCarrito = $row2['IDCart']; 
		$item = $row2['IDItem'];
		$user = $row2['IDUser'];
		$quanticart = $row2['quantityCart'];
		$toticart = $row2['totalCart'];
		$sql = "INSERT INTO orders (IDItem, IDUser, quantityOrder, totalOrder) VALUES ('$item', '$user', '$quanticart','$toticart')";
		if ($conn->query($sql) === TRUE) {
			echo "New record created successfully";
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
		$query2 = "SELECT `idItem`, `nameItem`, `priceItem`, `unitsItem`, `viewsItem`, `buysItem`, `globalcategoryItem`, `categoryItem` 
		FROM `items` WHERE `idItem`= '$item'";
	  $result2 = $conn->query($query2);
	  while ($row = mysqli_fetch_assoc($result2)) {
		  $cantidad = $row2['quantityCart'];
		  $unidades = $row['unitsItem'];
		  $unidades = $unidades - $cantidad;
		  mysqli_next_result($conn);
				$query4 = "UPDATE `items` SET `unitsItem`='$unidades' WHERE `idItem`='$item'";
			  $result25 = $conn->query($query4);
	  }
	  $sql2 = "DELETE FROM cart WHERE IDCart = '$IDCarrito'";
	  $result1 = $conn->query($sql2);
	}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	$conn->close();
	echo'<script type="text/javascript">
alert("Thank you for your purchase!");
window.location.href="index.php";
</script>';
	//header("location: cart.php");
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