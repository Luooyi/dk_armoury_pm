<?php include "main_headers.php";?>
<body style="background-color: #EFEDE3;">
<?php include "main_navs.php";?>
	 <!-- Home Category Images -->

	 <?php 			$IDArmour = $_GET['IDArticle'];
					mysqli_next_result($conn);
  					$query2 = "SELECT `idItem`, `nameItem`, `priceItem`, `unitsItem`, `viewsItem`, `buysItem`, `globalcategoryItem`, `categoryItem` 
					  FROM `items` WHERE `idItem`= '$IDArmour'";
    				$result2 = $conn->query($query2);
					while ($row = mysqli_fetch_assoc($result2)) {
						$contador = $row['viewsItem'];
						$contador = $contador + 1;
						$contador2 = $row['buysItem'];
						$contador2 = $contador2 + 1;
						mysqli_next_result($conn);
  							$query3 = "UPDATE `items` SET `viewsItem`='$contador' WHERE `idItem`='$IDArmour'";
							$result3 = $conn->query($query3);
							
					  ?>
					  

	<div class="container">
		<div class = "row">
			<div class="col">
			<img src="imgs/articles/<?php echo $row['idItem'];?>_1.png" alt="Armour" class ="center zoom" style="width:80%">
			</div>
				<div class="col">
				<div class="col-md-12">
				<h2 style ="font-family: Mongolian Baltic; font-size: 30pt;color: #63563D;"><?php echo $row['nameItem'];?></h2>
				</div>
				<div class="col-md-12">
				<h3 style =" font-family: Calibri Light; font-size: 14pt;color: #63563D;"> Item # <?php echo $row['idItem'];?></h3>
				</div>
						</br>
				<div class="col-md-12">
				<h3 style =" font-family: Calibri; font-weight:700; font-size: 14pt;color: #63563D;"> $<?php echo $row['priceItem'];?>.00 </h3>
				</div>
				<div class="col-md-12">
				<h3 style =" font-family: Calibri; font-weight:700; font-size: 14pt;color: #63563D;"> Size* </h3>
				</div>
				<div class="col-md-12">
				<select class ="select_size" >
  				 <option value="volvo">Small</option>
 				 <option value="saab">Medium</option>
 				 <option value="mercedes">Large</option>
 				 <option value="audi">XL</option>
				</select>
				</div>
				</br>
				</br>
				<div class="col-md-12">
				<h3 style =" font-family: Calibri Light; font-size: 14pt;color: #63563D;"> Availability: "<?php echo $row['unitsItem'];?>" in stock. </h3>
				</div>
				<div class="col-md-12">
				<form class="form-horizontal" method="POST" action="addtocart.php" autocomplete="off">
					<input type="text" class ="input_qty" id="itemquantity" name="quantity" value = "1">
					<input type="text" id="IDArticle" name="IDArticle" value = "<?php echo $row['idItem'];?>" hidden>
					<button type="submit" href="#" class="mybutton-medium" allign="center"> Add to Cart</button>
				</form>
				</div>
			</div>
		</div>
	</div>
	<?php } ?>


	<?php include "main_footpage.php";?>
</body>
	
</html>