<?php
	
	include_once("connection.php");
	$conn = OpenCon();
	session_start();
    global $mysqli;
	$IDCarrito = $_GET['Carrito'];

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$IDArmour = $_GET['articulo'];
	mysqli_next_result($conn);
	  $query2 = "SELECT `idItem`, `nameItem`, `priceItem`, `unitsItem`, `viewsItem`, `buysItem`, `globalcategoryItem`, `categoryItem` 
	  FROM `items` WHERE `idItem`= '$IDArmour'";
	$result2 = $conn->query($query2);
	while ($row = mysqli_fetch_assoc($result2)) {
		$cantidad = $_GET['canti'];
		$unidades = $row['unitsItem'];
		$unidades = $unidades + $cantidad;
		mysqli_next_result($conn);
			  $query3 = "UPDATE `items` SET `unitsItem`='$unidades' WHERE `idItem`='$IDArmour'";
			$result3 = $conn->query($query3);
	}
/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$sql = "DELETE FROM cart WHERE IDCart = '$IDCarrito'";
	$result1 = $conn->query($sql);
	
	$conn->close();
	header("location: cart.php");
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