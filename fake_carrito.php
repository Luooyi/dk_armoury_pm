<?php
	include_once("connection.php");
	$conn = OpenCon();
	global $mysqli;
	session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>

</head>
	
<body>

	 <!-- Home Category Images -->

	 <?php 			$IDArmour = $_POST['IDArticle'];
					mysqli_next_result($conn);
  					$query2 = "SELECT `idItem`, `nameItem`, `priceItem`, `unitsItem`, `viewsItem`, `buysItem`, `globalcategoryItem`, `categoryItem` 
					  FROM `items` WHERE `idItem`= '$IDArmour'";
    				$result2 = $conn->query($query2);
					while ($row = mysqli_fetch_assoc($result2)) {
						$contador = $row['buysItem'];
						$itemsbuy = $row['idItem'];
						$usuario = $_SESSION['idUsuario'];
						$cantidad = $_POST['quantity'];
						$totalcart = $row['priceItem'];
						$totalcart = $totalcart * $cantidad;
						$contador = $contador + 1;
						$unidades = $row['unitsItem'];
						$unidades = $unidades - $cantidad;
						mysqli_next_result($conn);
  							$query3 = "UPDATE `items` SET `buysItem`='$contador', `unitsItem`='$unidades' WHERE `idItem`='$IDArmour'";
							$result3 = $conn->query($query3);
							echo $contador;
					$sql = "INSERT INTO cart(IDItem, IDUser, quantityCart, totalCart) VALUES ('$itemsbuy', '$usuario', '$cantidad', '$totalcart')";

if ($conn->query($sql) === TRUE) {
	echo "New record created successfully";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
		}
$conn->close();


	header("Location:article.php?IDArticle=$IDArmour");
	?>

</body>
	
</html>