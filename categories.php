<?php include "main_headers.php";?>
<body style="background-color: #EFEDE3;">
<?php include "main_navs.php";?>
	 <!-- Home Category Images -->
	<div class="container">
	<div class="row">
	<?php 			$IDArmour = $_GET['IDCategoriesGlobal'];
					mysqli_next_result($conn);
  					$query2 = "SELECT `IDCategoryItem`, CI.`IDCategoryGlobal`, `nameCategoryItem` 
					FROM `categegories_items` AS CI JOIN `categories_global` AS CG ON CI.`IDCategoryGlobal` = CG.`IDCategoryGlobal` 
					WHERE CI.`IDCategoryGlobal` = '$IDArmour'";
    				$result2 = $conn->query($query2);
					while ($row = mysqli_fetch_assoc($result2)) {
	  				?>
		<div class="col-sm-4">
				<div class="col s10 text-center">
						<a href="category_item.php?IDCategoryItem=<?php echo $row['IDCategoryItem'];?>">
			<img src="imgs/<?php echo $row['IDCategoryItem'];?>.png" alt="Helmets" class ="center" style="width:100%">
		</a>
				</div>
			<div class="container" >
				<h2 class ="h2_centered"><?php echo $row['nameCategoryItem'];?></h2>
			</div>
		</div>
	  
		 <!-- <div class="col">
				<div class="col s10 text-center">
			<img src="imgs/metal_armor.png" class ="center" alt="Armor" style="width:100%">
				</div>	
			<div class="container">
				<h2 class ="h2_centered">Armor</h2>
		  </div>
		</div>-->
	  
		<!--<div class="col">
				<div class="col s10 text-center">
			<img src="imgs/shields.png" alt="Shields" style="width:100%">
				</div>	
			<div class="container">
			  <h2 class ="h2_centered">Shields</h2>
		  </div>
		</div>-->
		<?php } ?>
	  </div>
	</div>


	<?php include "main_footpage.php";?>
</body>
	
</html>