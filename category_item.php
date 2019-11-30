<?php include "main_headers.php";?>
<body style="background-color: #EFEDE3;">
<?php include "main_navs.php";?>
	 <!-- Home Category Images -->
	 
	 <div class ="container">
	 <?php 			$IDArmour = $_GET['IDCategoryItem'];
					mysqli_next_result($conn);
  					$query1 = "SELECT `IDCategoryItem`, `IDCategoryGlobal`, `nameCategoryItem` FROM `categegories_items` WHERE `IDCategoryItem` = '$IDArmour'";
    				$result1 = $conn->query($query1);
					while ($row = mysqli_fetch_assoc($result1)) {
	  				?>
	 <h2 style =" font-family: Mongolian Baltic; font-size: 40pt;color: #63563D;"><?php echo $row['nameCategoryItem'];?></h2>
	 <?php } ?>
	 </br>
	</br>
	</div>
	<div class="container">
	<div class="row">
	<?php 			$IDArmour = $_GET['IDCategoryItem'];
					mysqli_next_result($conn);
  					$query2 = "SELECT `idItem`, `nameItem`, `priceItem`, `unitsItem`, `viewsItem`, `buysItem`, `globalcategoryItem`, `categoryItem` 
					  FROM `items` WHERE `categoryItem`= '$IDArmour'";
    				$result2 = $conn->query($query2);
					while ($row = mysqli_fetch_assoc($result2)) {
	  				?>
		<div class="col-sm-4">
				<div class="col s10 text-center">
		<a href="article.php?IDArticle=<?php echo $row['idItem'];?>">
				<img src="imgs/articles/<?php echo $row['idItem'];?>_1.png" class ="center" style="width:80%">
					</a>		
		</div>
			<div class="container" >
				<h2 class ="h2_centered"style ="font-size: 20pt;"><?php echo $row['nameItem'];?></h2>
				<h2 class ="h2_centered">$<?php echo $row['priceItem'];?>.00</h2>
			</div>
		</div>
	  
		<!-- <div class="col">
				<div class="col s10 text-center">
			<img src="imgs/items/w_2_0037659_knee-length-medieval-shoes_100.png" class ="center" alt="Clothing" style="width:50%">
				</div>	
			<div class="container">
					<h2 class ="h2_centered" style ="font-size: 20pt;">Knee Length Medieval Shoes</h2>
					<h2 class ="h2_centered">$189.00</h2>
		  </div>
		</div>
	  
		<div class="col">
				<div class="col s10 text-center">
			<img src="imgs/items/w_2_0037515_adelard-norman-tunic_100.png"  style="width:50%">
				</div>	
			<div class="container">
					<h2 class ="h2_centered" style ="font-size: 20pt;">Adelard Norman Tunic</h2>
					<h2 class ="h2_centered">$68.00</h2>
		  </div>
		</div>-->
		<?php } ?>
	  </div>
	</div>


	<?php include "main_footpage.php";?>
</body>
	
</html>