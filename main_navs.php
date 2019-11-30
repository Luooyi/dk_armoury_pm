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
		<!-- Login / Register -->
		<?php 
                   if(isset($_SESSION['idUsuario'])){ ?>
				   	<!-- PHP CARRITO COUNT -->
					<?php 
						$IDUser1 = $_SESSION['idUsuario'];
						mysqli_next_result($conn);
  						$query3 = "	SELECT COUNT(IDCart) AS cantidad FROM cart WHERE IDUser = '$IDUser1'";
    					$result3 = $conn->query($query3);
						while ($row = mysqli_fetch_assoc($result3)) {
	  				?>
				   	<a href="cart.php"><i class="fa fa-fw fa-shopping-cart"></i> (<?php echo  $row['cantidad'];?>)</a>
					<?php } ?>
					<a href="account.php?IDUser= <?php echo $_SESSION['idUsuario'] ?>" ><i class="fa fa-fw fa-user"></i> <?php echo $_SESSION['usuario']  ?></a>
					<a href="logout.php"><i class="fa fa-fw fa-sign-out"></i> Logout</a>
					<?php } else {
                    ?>
		<a href="#" data-toggle="modal" data-target="#login"><i class="fa fa-fw fa-user"></i> Login</a>
			<div class="modal fade" id="login">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                        	<h4 class="h2 modal-title">Login</h4>
                        	<button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div><!-- div class="modal-header" -->
                        <div class="modal-body">
                        <div class="row">
                            <div class="container-fluid text-center">
                                <form id="loginform" action="login.php" method="POST">
                                        <div class="container">
										<h2 class ="h2">Email</h2>
											<input class="form-control" name="action1" id="action1" type="hidden" value="login">
                                        	<input class="form-control-large" name="email" id="email" type="text"  placeholder="Email">
												<br>
												<h2 class ="h2">Password</h2>
                                        	<input class="form-control-large" name="password" id="password" type="password" placeholder="Password">
                                        	<br>
                                        	<div class="clearfix">
                                        		<button type="submit"  id="btnLogin" class="mybutton"><i class="fa fa-sign-in"></i> Login</button>
                                        	</div><!-- div class clearfix -->
                                		</div><!-- div class container -->
                                </form>
                            </div><!-- div class container-fluid text-center -->
                        </div><!-- div class row -->
                        </div><!-- div class modal-body -->
                      </div><!-- div class modal-content -->
					</div><!-- div class modal-dialog -->	
            </div><!-- div class modal fade id="login"> -->	
		<a href="register.php" class="mybutton" allign="center"> Register</a>
		<?php } ?>
	  </div><!-- div class Navbar -->	
	  
    <!-- Logo -->
	<a href="index.php">
	 <img src="imgs/DKA_Logo_Styled.png" class="rounded mx-auto d-block" alt="Logo" style="top: 8%; left: 12.5%;width:75%;position:absolute">
	 </a>
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