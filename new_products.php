<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="js/myjavascript.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
	<!--	<link href="../css/mystyles.css" rel="stylesheet" type="text/css"/>-->
	<link href="css/mystyles.css" rel="stylesheet" type="text/css"/>
</head>
	
<body style="background-color: #EFEDE3;">
	<!-- navbar -->
	<div class="navbar justify-content-end">
			<!-- social media icons -->
		<a href="https://www.facebook.com/DarkKnightArmoury" target="_blank">
				<img border="0" alt="facebook" src="imgs/facebookicon.png" width="25"></a>
		<a href="https://www.pinterest.com.mx/darkknightarmoury/" target="_blank">
				<img border="0" alt="pinterest" src="imgs/pinteresticon.png" width="25"></a>
		<a href="https://www.etsy.com/shop/DarkKnightArmoury" target="_blank">
				<img border="0" alt="etsy" src="imgs/etsy.png" width="22"></a>
			<!-- alligner right -->
		<div class="ml-auto"></div>
		<a class="active" href="index.php"><i class="fa fa-fw fa-home"></i> Home</a>
		<a href="#"><i class="fa fa-fw fa-search"></i> Search</a>
		<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
		<a href="#"><i class="fa fa-fw fa-shopping-cart"></i> (0)</a>
			<!-- Login / Register -->
		<a href="#"><i class="fa fa-fw fa-user"></i> Login</a>
		<a href="new.php" class="mybutton" allign="center"> Register</a>
	  </div>
	  
    <!-- Logo -->
	 <img src="imgs/DKA_Logo_Styled.png" class="rounded mx-auto d-block" alt="Logo" style="top: 8%; left: 12.5%;width:75%;position:absolute">
	<!-- Spacing -->
	<pre> </pre>
	 <!-- Categories -->
	 <div class="container">
			<ul class="mega-menu mega-menu-nr" data-isrtlenabled="false" data-enableclickfordropdown="false">
			<div class="dropdown" alt = "Categories" style="top: 0%; left: -13%"> 
					<img src="imgs/labelicon.png" width="19">
					<a href="#" class = "categories">Categories</a>
					<div class="dropdown-content">
					  <a href="armour.php">Armour</a>
					  <a href="#">Clothing</a>
					  <a href="#">Weaponry</a>
					</div>
				  </div>
			<div class="dropdown" alt = "Popular" style="top: 0%; left: -8%"> 
					<img src="imgs/brandsicon.png"  width="19">
					<a href="popular.php" class = "categories">Popular</a>
				  </div>
			<div class="dropdown" alt = "BestSellers" style="top: 0%; left: -3%"> 
					<img src="imgs/staricon.png"  width="19">
						<a href="best_sellers.php" class = "categories">Best Sellers</a>
			</div>
			
			<div class="dropdown" alt = "NewProducts" style="top: 0%; left: 39%">
					<img src="imgs/bannericon.png"  width="19"> 
					<a href="new_products.php" class = "categories">New Products</a>
			</div>
			<div class="dropdown" alt = "Eras" style="top: 0%; left: 48%"> 
					<img src="imgs/historyicon.png"  width="19"> 
					<a href="#" class = "categories">Eras & Cultures</a>
					<div class="dropdown-content">
					  <a href="#">Crusades</a>
					  <a href="#">Greek & Roman</a>
					  <a href="#">Japanese</a>
					  <a href="#">Pirate</a>
					  <a href="#">Vikings</a>
					</div>
			</div>
		</div>
</br></br></br></br></br>
	 <!-- Home Category Images -->
	 <div class ="container">
	 <h2 style =" font-family: Mongolian Baltic; font-size: 40pt;color: #63563D;">New Products</h2>
	 </br>
	</br>
	</div>
	<div class="container">
	<div class="row">
		<div class="col">
				<div class="col s10 text-center">
			<img src="imgs/items/module_table_bottom.png" class ="center" style="width:50%">
				</div>
			<div class="container" >
				<h2 class ="h2_centered"style ="font-size: 20pt;"> Aaron Canvas Cloak </h2>
				<h2 class ="h2_centered">$36.00</h2>
			</div>
		</div>
	  
		<div class="col">
				<div class="col s10 text-center">
			<img src="imgs/items/0000590_medieval-crossbows_300.png" class ="center" alt="Clothing" style="width:50%">
				</div>	
			<div class="container">
					<h2 class ="h2_centered" style ="font-size: 20pt;">Curved Medieval Crossbow</h2>
					<h2 class ="h2_centered">$40.00</h2>
		  </div>
		</div>
	  
		<div class="col">
				<div class="col s10 text-center">
			<img src="imgs/items/0000661_gothic-pendants_300.png"  style="width:50%">
				</div>	
			<div class="container">
					<h2 class ="h2_centered" style ="font-size: 20pt;">Silver Emerald Pendant</h2>
					<h2 class ="h2_centered">$130.00</h2>
		  </div>
		</div>
	  </div>
	</div>



</body>
	
</html>