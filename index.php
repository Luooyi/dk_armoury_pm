<?php
include 'connection.php';
$conn = OpenCon();
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="bootstrap/css/bootstrap-theme.css" rel="stylesheet">
		<script src="bootstrap/js/jquery-3.4.1.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>	
		<script type="text/javascript" src="js/myjavascript.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">	
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
		<a href="#"><i class="fa fa-fw fa-search" ></i> Search</a>
		<a href="#"><i class="fa fa-fw fa-envelope"></i> Contact</a>
		<a href="cart.php"><i class="fa fa-fw fa-shopping-cart"></i> (0)</a>
			<!-- Login / Register -->



			<?php 
                   if(isset($_SESSION['idUsuario'])){ ?>
					<a href="account.php?IDUser= <?php echo $_SESSION['idUsuario'] ?>" ><i class="fa fa-fw fa-user"></i> <?php echo $_SESSION['usuario']  ?></a>
					<a href="logout.php"><i class="fa fa-fw fa-sign-out-alt"></i> Logout</a>
					<?php } else {
                       ?>
		<a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-fw fa-user"></i> Login</a>
		<div class="modal fade" id="login">
                    <div class="modal-dialog">
                      <div class="modal-content">


                        <div class="modal-header">

                            <h4 class="modal-title">Iniciar Sesión</h4>
                          <button type="button" class="close" data-dismiss="modal">&times;</button>

                        </div>


                        <div class="modal-body">
                         <div class="row">
                            <div class="container-fluid text-center">
                                <form id="loginform" action="login.php" method="POST">
                                        <div class="container">
										<input class="form-control" name="action1" id="action1" type="hidden" value="login">
                                        <input class="form-control-large" name="email" id="email" type="text"  placeholder="Email">
                                        <br>
                                        <input class="form-control-large" name="password" id="password" type="password" placeholder="Password">
                                        <br>
                                        <div class="clearfix">
                                        <label class="float-left checkbox-inline"><input type="checkbox"> Recordarme</label>
                                        <button type="submit"  id="btnLogin" class="btn btn-info float-right"><i class="fa fa-sign-in-alt"></i> Iniciar Sesion</button>

                                        </div>


                                </div>
                                         </form>
                            </div>
                        </div>
                        </div>

                      </div>
					</div>
					

                  </div>





		<a href="new.php" class="mybutton" allign="center"> Register</a>


		<?php } ?>

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
						<!-- Php Categorias Global Query -->
					<?php 
					mysqli_next_result($conn);
  					$query2 = "SELECT `IDCategoryGlobal`, `nameCategoryGlobal` FROM `categories_global` WHERE 1";
    				$result2 = $conn->query($query2);
					while ($row = mysqli_fetch_assoc($result2)) {
	  				?>
					  <a href="categories.php?IDCategoriesGlobal=<?php echo $row['IDCategoryGlobal'];?>"><?php echo $row['nameCategoryGlobal'];?></a>
					  <!-- <a href="#">Clothing</a>
					  <a href="#">Weaponry</a>-->
					  <?php } ?>
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
</br></br></br></br></br></br>
	 <!-- Home Category Images -->
	<div class="container">
	<div class="row">
		<div class="col">
				<div class="col s10 text-center">
						<a href="categories.php?IDCategoriesGlobal=1">
			<img src="imgs/armour.png" alt="Armour" class ="center" style="width:100%">
		</a>
				</div>
			<div class="container" >
				<h2 class ="h2_centered">Armour</h2>

			</div>
		</div>
	  
		<div class="col">
				<div class="col s10 text-center">
				<a href="categories.php?IDCategoriesGlobal=2">
			<img src="imgs/clothing.png" class ="center" alt="Clothing" style="width:100%">
				</div>	
			<div class="container">
				<h2 class ="h2_centered">Clothing</h2>
		  </div>
		</div>
	  
		<div class="col">
				<div class="col s10 text-center">
				<a href="categories.php?IDCategoriesGlobal=3">
			<img src="imgs/Weapons.png" alt="Weaponry" style="width:100%">
				</div>	
			<div class="container">
			  <h2 class ="h2_centered">Weaponry</h2>
		  </div>
		</div>
	  </div>
	</div>



</body>
	
</html>