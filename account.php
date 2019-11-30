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
	<form class="form-horizontal" method="POST" action="edit.php" autocomplete="off">
	<div class="row">
		<div class="col-md-5">
			<div class="container" >
				<h2 class ="h2_big">My Account</h2>
			</div>
		</div>
		<div class="col-md-7">
		</br>
		<!-- Your Personal Details -->
		<h2 class ="h2">Your Personal Details</h2>
		<hr/>
			 <!-- PHP QUERY -->
		<?php 		$IDArmour = $_GET['IDUser'];
					mysqli_next_result($conn);
  					$query1 = "SELECT * FROM `users` WHERE `ID` = '$IDArmour'";
    				$result1 = $conn->query($query1);
					while ($row = mysqli_fetch_assoc($result1)) {
					  ?>
		<input type="text" class ="input_account" id="ID" name="ID" value = "<?php echo $IDArmour;?>" hidden>
		<p class = "p">First Name</p>
		<input type="text" class ="input_account" id="first_name" name="first_name" value = "<?php echo $row['first_name'];?>">
		<p class = "p">Last Name</p>
		<input type="text" class ="input_account" id="last_name" name="last_name" value = "<?php echo $row['last_name'];?>">
		<div class="form-group">
		<p class = "p">Date of Birth</p>
						<select class="form-control-short" id="day_birth" name="day_birth" value = "db_daybirth">
							<option value="0">Day</option>
							<option value="01"<?php echo ($row['day_birth']== 1) ? 'selected="selected"': ''; ?>>01</option>
							<option value="02"<?php echo ($row['day_birth']== 2) ? 'selected="selected"': ''; ?>>02</option>
							<option value="03"<?php echo ($row['day_birth']== 3) ? 'selected="selected"': ''; ?>>03</option>
							<option value="04"<?php echo ($row['day_birth']== 4) ? 'selected="selected"': ''; ?>>04</option>
							<option value="05"<?php echo ($row['day_birth']== 5) ? 'selected="selected"': ''; ?>>05</option>
							<option value="06"<?php echo ($row['day_birth']== 6) ? 'selected="selected"': ''; ?>>06</option>
							<option value="07"<?php echo ($row['day_birth']== 7) ? 'selected="selected"': ''; ?>>07</option>
							<option value="08"<?php echo ($row['day_birth']== 8) ? 'selected="selected"': ''; ?>>08</option>
							<option value="09"<?php echo ($row['day_birth']== 9) ? 'selected="selected"': ''; ?>>09</option>
							<option value="10"<?php echo ($row['day_birth']== 10) ? 'selected="selected"': ''; ?>>10</option>
							<option value="11"<?php echo ($row['day_birth']== 11) ? 'selected="selected"': ''; ?>>11</option>
							<option value="12"<?php echo ($row['day_birth']== 12) ? 'selected="selected"': ''; ?>>12</option>
							<option value="13"<?php echo ($row['day_birth']== 13) ? 'selected="selected"': ''; ?>>13</option>
							<option value="14"<?php echo ($row['day_birth']== 14) ? 'selected="selected"': ''; ?>>14</option>
							<option value="15"<?php echo ($row['day_birth']== 15) ? 'selected="selected"': ''; ?>>15</option>
							<option value="16"<?php echo ($row['day_birth']== 16) ? 'selected="selected"': ''; ?>>16</option>
							<option value="17"<?php echo ($row['day_birth']== 17) ? 'selected="selected"': ''; ?>>17</option>
							<option value="18"<?php echo ($row['day_birth']== 18) ? 'selected="selected"': ''; ?>>18</option>
							<option value="19"<?php echo ($row['day_birth']== 19) ? 'selected="selected"': ''; ?>>19</option>
							<option value="20"<?php echo ($row['day_birth']== 20) ? 'selected="selected"': ''; ?>>20</option>
							<option value="21"<?php echo ($row['day_birth']== 21) ? 'selected="selected"': ''; ?>>21</option>
							<option value="22"<?php echo ($row['day_birth']== 22) ? 'selected="selected"': ''; ?>>22</option>
							<option value="23"<?php echo ($row['day_birth']== 23) ? 'selected="selected"': ''; ?>>23</option>
							<option value="24"<?php echo ($row['day_birth']== 24) ? 'selected="selected"': ''; ?>>24</option>
							<option value="25"<?php echo ($row['day_birth']== 25) ? 'selected="selected"': ''; ?>>25</option>
							<option value="26"<?php echo ($row['day_birth']== 26) ? 'selected="selected"': ''; ?>>26</option>
							<option value="27"<?php echo ($row['day_birth']== 27) ? 'selected="selected"': ''; ?>>27</option>
							<option value="28"<?php echo ($row['day_birth']== 28) ? 'selected="selected"': ''; ?>>28</option>
							<option value="29"<?php echo ($row['day_birth']== 29) ? 'selected="selected"': ''; ?>>29</option>
							<option value="30"<?php echo ($row['day_birth']== 30) ? 'selected="selected"': ''; ?>>30</option>
							<option value="31"<?php echo ($row['day_birth']== 31) ? 'selected="selected"': ''; ?>>31</option>
						</select>
						<select class="form-control-medium" id="month_birth" name="month_birth" value = "db_monthbirth">
							<option value="0">Month</option>
							<option value="01"<?php echo ($row['month_birth']== 1) ? 'selected="selected"': ''; ?>>January</option>
							<option value="02"<?php echo ($row['month_birth']== 2) ? 'selected="selected"': ''; ?>>February</option>
							<option value="03"<?php echo ($row['month_birth']== 3) ? 'selected="selected"': ''; ?>>March</option>
							<option value="04"<?php echo ($row['month_birth']== 4) ? 'selected="selected"': ''; ?>>April</option>
							<option value="05"<?php echo ($row['month_birth']== 5) ? 'selected="selected"': ''; ?>>May</option>
							<option value="06"<?php echo ($row['month_birth']== 6) ? 'selected="selected"': ''; ?>>June</option>
							<option value="07"<?php echo ($row['month_birth']== 7) ? 'selected="selected"': ''; ?>>July</option>
							<option value="08"<?php echo ($row['month_birth']== 8) ? 'selected="selected"': ''; ?>>August</option>
							<option value="09"<?php echo ($row['month_birth']== 9) ? 'selected="selected"': ''; ?>>September</option>
							<option value="10"<?php echo ($row['month_birth']== 10) ? 'selected="selected"': ''; ?>>October</option>
							<option value="11"<?php echo ($row['month_birth']== 11) ? 'selected="selected"': ''; ?>>November</option>
							<option value="12"<?php echo ($row['month_birth']== 12) ? 'selected="selected"': ''; ?>>December</option>
						</select>
						<select class="form-control-mediumshort" id="year_birth" name="year_birth" value = "db_yearbirth">
									<option value="0">Year</option>
							    	<option value="2019"<?php echo ($row['year_birth']== 2019) ? 'selected="selected"': ''; ?>>2019</option>
							        <option value="2018"<?php echo ($row['year_birth']== 2018) ? 'selected="selected"': ''; ?>>2018</option>
    								<option value="2017"<?php echo ($row['year_birth']== 2017) ? 'selected="selected"': ''; ?>>2017</option>
    								<option value="2016"<?php echo ($row['year_birth']== 2016) ? 'selected="selected"': ''; ?>>2016</option>
    								<option value="2015"<?php echo ($row['year_birth']== 2015) ? 'selected="selected"': ''; ?>>2015</option>
    								<option value="2014"<?php echo ($row['year_birth']== 2014) ? 'selected="selected"': ''; ?>>2014</option>
    								<option value="2013"<?php echo ($row['year_birth']== 2013) ? 'selected="selected"': ''; ?>>2013</option>
    								<option value="2012"<?php echo ($row['year_birth']== 2012) ? 'selected="selected"': ''; ?>>2012</option>
    								<option value="2011"<?php echo ($row['year_birth']== 2011) ? 'selected="selected"': ''; ?>>2011</option>
    								<option value="2010"<?php echo ($row['year_birth']== 2010) ? 'selected="selected"': ''; ?>>2010</option>
    								<option value="2009"<?php echo ($row['year_birth']== 2009) ? 'selected="selected"': ''; ?>>2009</option>
    								<option value="2008"<?php echo ($row['year_birth']== 2008) ? 'selected="selected"': ''; ?>>2008</option>
    								<option value="2007"<?php echo ($row['year_birth']== 2007) ? 'selected="selected"': ''; ?>>2007</option>
    								<option value="2006"<?php echo ($row['year_birth']== 2006) ? 'selected="selected"': ''; ?>>2006</option>
    								<option value="2005"<?php echo ($row['year_birth']== 2005) ? 'selected="selected"': ''; ?>>2005</option>
    								<option value="2004"<?php echo ($row['year_birth']== 2004) ? 'selected="selected"': ''; ?>>2004</option>
    								<option value="2003"<?php echo ($row['year_birth']== 2003) ? 'selected="selected"': ''; ?>>2003</option>
    								<option value="2002"<?php echo ($row['year_birth']== 2002) ? 'selected="selected"': ''; ?>>2002</option>
    								<option value="2001"<?php echo ($row['year_birth']== 2001) ? 'selected="selected"': ''; ?>>2001</option>
    								<option value="2000"<?php echo ($row['year_birth']== 2000) ? 'selected="selected"': ''; ?>>2000</option>
    								<option value="1999"<?php echo ($row['year_birth']== 1999) ? 'selected="selected"': ''; ?>>1999</option>
    								<option value="1998"<?php echo ($row['year_birth']== 1998) ? 'selected="selected"': ''; ?>>1998</option>
    								<option value="1997"<?php echo ($row['year_birth']== 1997) ? 'selected="selected"': ''; ?>>1997</option>
    								<option value="1996"<?php echo ($row['year_birth']== 1996) ? 'selected="selected"': ''; ?>>1996</option>
    								<option value="1995"<?php echo ($row['year_birth']== 1995) ? 'selected="selected"': ''; ?>>1995</option>
    								<option value="1994"<?php echo ($row['year_birth']== 1994) ? 'selected="selected"': ''; ?>>1994</option>
    								<option value="1993"<?php echo ($row['year_birth']== 1993) ? 'selected="selected"': ''; ?>>1993</option>
    								<option value="1992"<?php echo ($row['year_birth']== 1992) ? 'selected="selected"': ''; ?>>1992</option>
    								<option value="1991"<?php echo ($row['year_birth']== 1991) ? 'selected="selected"': ''; ?>>1991</option>
    								<option value="1990"<?php echo ($row['year_birth']== 1990) ? 'selected="selected"': ''; ?>>1990</option>
    								<option value="1989"<?php echo ($row['year_birth']== 1989) ? 'selected="selected"': ''; ?>>1989</option>
    								<option value="1988"<?php echo ($row['year_birth']== 1988) ? 'selected="selected"': ''; ?>>1988</option>
    								<option value="1987"<?php echo ($row['year_birth']== 1987) ? 'selected="selected"': ''; ?>>1987</option>
    								<option value="1986"<?php echo ($row['year_birth']== 1986) ? 'selected="selected"': ''; ?>>1986</option>
    								<option value="1985"<?php echo ($row['year_birth']== 1985) ? 'selected="selected"': ''; ?>>1985</option>
    								<option value="1984"<?php echo ($row['year_birth']== 1984) ? 'selected="selected"': ''; ?>>1984</option>
    								<option value="1983"<?php echo ($row['year_birth']== 1983) ? 'selected="selected"': ''; ?>>1983</option>
    								<option value="1982"<?php echo ($row['year_birth']== 1982) ? 'selected="selected"': ''; ?>>1982</option>
    								<option value="1981"<?php echo ($row['year_birth']== 1981) ? 'selected="selected"': ''; ?>>1981</option>
    								<option value="1980"<?php echo ($row['year_birth']== 1980) ? 'selected="selected"': ''; ?>>1980</option>
    								<option value="1979"<?php echo ($row['year_birth']== 1979) ? 'selected="selected"': ''; ?>>1979</option>
    								<option value="1978"<?php echo ($row['year_birth']== 1978) ? 'selected="selected"': ''; ?>>1978</option>
    								<option value="1977"<?php echo ($row['year_birth']== 1977) ? 'selected="selected"': ''; ?>>1977</option>
    								<option value="1976"<?php echo ($row['year_birth']== 1976) ? 'selected="selected"': ''; ?>>1976</option>
    								<option value="1975"<?php echo ($row['year_birth']== 1975) ? 'selected="selected"': ''; ?>>1975</option>
    								<option value="1974"<?php echo ($row['year_birth']== 1974) ? 'selected="selected"': ''; ?>>1974</option>
    								<option value="1973"<?php echo ($row['year_birth']== 1973) ? 'selected="selected"': ''; ?>>1973</option>
    								<option value="1972"<?php echo ($row['year_birth']== 1972) ? 'selected="selected"': ''; ?>>1972</option>
    								<option value="1971"<?php echo ($row['year_birth']== 1971) ? 'selected="selected"': ''; ?>>1971</option>
    								<option value="1970"<?php echo ($row['year_birth']== 1970) ? 'selected="selected"': ''; ?>>1970</option>
    								<option value="1969"<?php echo ($row['year_birth']== 1969) ? 'selected="selected"': ''; ?>>1969</option>
    								<option value="1968"<?php echo ($row['year_birth']== 1968) ? 'selected="selected"': ''; ?>>1968</option>
    								<option value="1967"<?php echo ($row['year_birth']== 1967) ? 'selected="selected"': ''; ?>>1967</option>
    								<option value="1966"<?php echo ($row['year_birth']== 1966) ? 'selected="selected"': ''; ?>>1966</option>
    								<option value="1965"<?php echo ($row['year_birth']== 1965) ? 'selected="selected"': ''; ?>>1965</option>
    								<option value="1964"<?php echo ($row['year_birth']== 1964) ? 'selected="selected"': ''; ?>>1964</option>
    								<option value="1963"<?php echo ($row['year_birth']== 1963) ? 'selected="selected"': ''; ?>>1963</option>
    								<option value="1962"<?php echo ($row['year_birth']== 1962) ? 'selected="selected"': ''; ?>>1962</option>
    								<option value="1961"<?php echo ($row['year_birth']== 1961) ? 'selected="selected"': ''; ?>>1961</option>
    								<option value="1960"<?php echo ($row['year_birth']== 1960) ? 'selected="selected"': ''; ?>>1960</option>
    								<option value="1959"<?php echo ($row['year_birth']== 1959) ? 'selected="selected"': ''; ?>>1959</option>
    								<option value="1958"<?php echo ($row['year_birth']== 1958) ? 'selected="selected"': ''; ?>>1958</option>
    								<option value="1957"<?php echo ($row['year_birth']== 1957) ? 'selected="selected"': ''; ?>>1957</option>
    								<option value="1956"<?php echo ($row['year_birth']== 1956) ? 'selected="selected"': ''; ?>>1956</option>
    								<option value="1955"<?php echo ($row['year_birth']== 1955) ? 'selected="selected"': ''; ?>>1955</option>
    								<option value="1954"<?php echo ($row['year_birth']== 1954) ? 'selected="selected"': ''; ?>>1954</option>
    								<option value="1953"<?php echo ($row['year_birth']== 1953) ? 'selected="selected"': ''; ?>>1953</option>
    								<option value="1952"<?php echo ($row['year_birth']== 1952) ? 'selected="selected"': ''; ?>>1952</option>
    								<option value="1951"<?php echo ($row['year_birth']== 1951) ? 'selected="selected"': ''; ?>>1951</option>
    								<option value="1950"<?php echo ($row['year_birth']== 1950) ? 'selected="selected"': ''; ?>>1950</option>
    								<option value="1949"<?php echo ($row['year_birth']== 1949) ? 'selected="selected"': ''; ?>>1949</option>
    								<option value="1948"<?php echo ($row['year_birth']== 1948) ? 'selected="selected"': ''; ?>>1948</option>
    								<option value="1947"<?php echo ($row['year_birth']== 1947) ? 'selected="selected"': ''; ?>>1947</option>
    								<option value="1946"<?php echo ($row['year_birth']== 1946) ? 'selected="selected"': ''; ?>>1946</option>
    								<option value="1945"<?php echo ($row['year_birth']== 1945) ? 'selected="selected"': ''; ?>>1945</option>
    								<option value="1944"<?php echo ($row['year_birth']== 1944) ? 'selected="selected"': ''; ?>>1944</option>
    								<option value="1943"<?php echo ($row['year_birth']== 1943) ? 'selected="selected"': ''; ?>>1943</option>
    								<option value="1942"<?php echo ($row['year_birth']== 1942) ? 'selected="selected"': ''; ?>>1942</option>
    								<option value="1941"<?php echo ($row['year_birth']== 1941) ? 'selected="selected"': ''; ?>>1941</option>
    								<option value="1940"<?php echo ($row['year_birth']== 1940) ? 'selected="selected"': ''; ?>>1940</option>
    								<option value="1939"<?php echo ($row['year_birth']== 1939) ? 'selected="selected"': ''; ?>>1939</option>
    								<option value="1938"<?php echo ($row['year_birth']== 1938) ? 'selected="selected"': ''; ?>>1938</option>
    								<option value="1937"<?php echo ($row['year_birth']== 1937) ? 'selected="selected"': ''; ?>>1937</option>
    								<option value="1936"<?php echo ($row['year_birth']== 1936) ? 'selected="selected"': ''; ?>>1936</option>
    								<option value="1935"<?php echo ($row['year_birth']== 1935) ? 'selected="selected"': ''; ?>>1935</option>
    								<option value="1934"<?php echo ($row['year_birth']== 1934) ? 'selected="selected"': ''; ?>>1934</option>
    								<option value="1933"<?php echo ($row['year_birth']== 1933) ? 'selected="selected"': ''; ?>>1933</option>
    								<option value="1932"<?php echo ($row['year_birth']== 1932) ? 'selected="selected"': ''; ?>>1932</option>
    								<option value="1931"<?php echo ($row['year_birth']== 1931) ? 'selected="selected"': ''; ?>>1931</option>
    								<option value="1930"<?php echo ($row['year_birth']== 1930) ? 'selected="selected"': ''; ?>>1930</option>
    								<option value="1929"<?php echo ($row['year_birth']== 1929) ? 'selected="selected"': ''; ?>>1929</option>
    								<option value="1928"<?php echo ($row['year_birth']== 1928) ? 'selected="selected"': ''; ?>>1928</option>
    								<option value="1927"<?php echo ($row['year_birth']== 1927) ? 'selected="selected"': ''; ?>>1927</option>
    								<option value="1926"<?php echo ($row['year_birth']== 1926) ? 'selected="selected"': ''; ?>>1926</option>
    								<option value="1925"<?php echo ($row['year_birth']== 1925) ? 'selected="selected"': ''; ?>>1925</option>
    								<option value="1924"<?php echo ($row['year_birth']== 1924) ? 'selected="selected"': ''; ?>>1924</option>
    								<option value="1923"<?php echo ($row['year_birth']== 1923) ? 'selected="selected"': ''; ?>>1923</option>
    								<option value="1922"<?php echo ($row['year_birth']== 1922) ? 'selected="selected"': ''; ?>>1922</option>
    								<option value="1921"<?php echo ($row['year_birth']== 1921) ? 'selected="selected"': ''; ?>>1921</option>
    								<option value="1920"<?php echo ($row['year_birth']== 1920) ? 'selected="selected"': ''; ?>>1920</option>
    								<option value="1919"<?php echo ($row['year_birth']== 1919) ? 'selected="selected"': ''; ?>>1919</option>
    								<option value="1918"<?php echo ($row['year_birth']== 1918) ? 'selected="selected"': ''; ?>>1918</option>
    								<option value="1917"<?php echo ($row['year_birth']== 1917) ? 'selected="selected"': ''; ?>>1917</option>
    								<option value="1916"<?php echo ($row['year_birth']== 1916) ? 'selected="selected"': ''; ?>>1916</option>
    								<option value="1915"<?php echo ($row['year_birth']== 1915) ? 'selected="selected"': ''; ?>>1915</option>
    								<option value="1914"<?php echo ($row['year_birth']== 1914) ? 'selected="selected"': ''; ?>>1914</option>
    								<option value="1913"<?php echo ($row['year_birth']== 1913) ? 'selected="selected"': ''; ?>>1913</option>
    								<option value="1912"<?php echo ($row['year_birth']== 1912) ? 'selected="selected"': ''; ?>>1912</option>
    								<option value="1911"<?php echo ($row['year_birth']== 1911) ? 'selected="selected"': ''; ?>>1911</option>
    								<option value="1910"<?php echo ($row['year_birth']== 1910) ? 'selected="selected"': ''; ?>>1910</option>
    								<option value="1909"<?php echo ($row['year_birth']== 1909) ? 'selected="selected"': ''; ?>>1909</option>
    								<option value="1908"<?php echo ($row['year_birth']== 1908) ? 'selected="selected"': ''; ?>>1908</option>
    								<option value="1907"<?php echo ($row['year_birth']== 1907) ? 'selected="selected"': ''; ?>>1907</option>
    								<option value="1906"<?php echo ($row['year_birth']== 1906) ? 'selected="selected"': ''; ?>>1906</option>
    								<option value="1905"<?php echo ($row['year_birth']== 1905) ? 'selected="selected"': ''; ?>>1905</option>
						</select>
		<p class = "p">Email</p>
		<input type="text" class ="input_account" id="email" name="email" value = "<?php echo $row['email'];?>">
		</br>
		</br>
		<!-- Company Details -->
		<h2 class ="h2">Company Details</h2>
		<hr/>
		<p class = "p">Company Name</p>
		<input type="text" class ="input_account" id="company" name="company" value = "<?php echo $row['company'];?>">
		</br>
		</br>
		<!-- Your Address -->
		<h2 class ="h2">Your Address</h2>
		<hr/>
		<p class = "p">Street Address</p>
		<input type="text" class ="input_account" id="street_adress" name="street_adress" value = "<?php echo $row['street_adress'];?>">
		<p class = "p">Street Address 2</p>
		<input type="text" class ="input_account" id="street_adresstwo" name="street_adresstwo" value = "<?php echo $row['street_adresstwo'];?>">
		<p class = "p">Zip/Postal Code</p>
		<input type="text" class ="input_account" id="zip_code" name="zip_code" value = "<?php echo $row['zip_code'];?>">
		<p class = "p">City</p>
		<input type="text" class ="input_account" id="city" name="city" value = "<?php echo $row['city'];?>">
		<p class = "p">Country</p>
			<select class="form-control-large" id="country" name="country" selected="<?php echo $row['country'];?>">
						<option> Country </option>
						<option value="United States"								<?php echo ($row['country']=="United States"								) ? 'selected="selected"': ''; ?>>United States</option> 
						<option value="United Kingdom"								<?php echo ($row['country']=="United Kingdom"								) ? 'selected="selected"': ''; ?>>United Kingdom</option> 
						<option value="Afghanistan"									<?php echo ($row['country']=="Afghanistan"									) ? 'selected="selected"': ''; ?>>Afghanistan</option> 
						<option value="Albania"										<?php echo ($row['country']=="Albania"										) ? 'selected="selected"': ''; ?>>Albania</option> 
						<option value="Algeria"										<?php echo ($row['country']=="Algeria"										) ? 'selected="selected"': ''; ?>>Algeria</option> 
						<option value="American Samoa"								<?php echo ($row['country']=="American Samoa"								) ? 'selected="selected"': ''; ?>>American Samoa</option> 
						<option value="Andorra"										<?php echo ($row['country']=="Andorra"										) ? 'selected="selected"': ''; ?>>Andorra</option> 
						<option value="Angola"										<?php echo ($row['country']=="Angola"										) ? 'selected="selected"': ''; ?>>Angola</option> 
						<option value="Anguilla"									<?php echo ($row['country']=="Anguilla"									) ? 'selected="selected"': ''; ?>>Anguilla</option> 
						<option value="Antarctica"									<?php echo ($row['country']=="Antarctica"									) ? 'selected="selected"': ''; ?>>Antarctica</option> 
						<option value="Antigua and Barbuda"							<?php echo ($row['country']=="Antigua and Barbuda"							) ? 'selected="selected"': ''; ?>>Antigua and Barbuda</option> 
						<option value="Argentina"									<?php echo ($row['country']=="Argentina"									) ? 'selected="selected"': ''; ?>>Argentina</option> 
						<option value="Armenia"										<?php echo ($row['country']=="Armenia"										) ? 'selected="selected"': ''; ?>>Armenia</option> 
						<option value="Aruba"										<?php echo ($row['country']=="Aruba"										) ? 'selected="selected"': ''; ?>>Aruba</option> 
						<option value="Australia"									<?php echo ($row['country']=="Australia"									) ? 'selected="selected"': ''; ?>>Australia</option> 
						<option value="Austria"										<?php echo ($row['country']=="Austria"										) ? 'selected="selected"': ''; ?>>Austria</option> 
						<option value="Azerbaijan"									<?php echo ($row['country']=="Azerbaijan"									) ? 'selected="selected"': ''; ?>>Azerbaijan</option> 
						<option value="Bahamas"										<?php echo ($row['country']=="Bahamas"										) ? 'selected="selected"': ''; ?>>Bahamas</option> 
						<option value="Bahrain"										<?php echo ($row['country']=="Bahrain"										) ? 'selected="selected"': ''; ?>>Bahrain</option> 
						<option value="Bangladesh"									<?php echo ($row['country']=="Bangladesh"									) ? 'selected="selected"': ''; ?>>Bangladesh</option> 
						<option value="Barbados"									<?php echo ($row['country']=="Barbados"									) ? 'selected="selected"': ''; ?>>Barbados</option> 
						<option value="Belarus"										<?php echo ($row['country']=="Belarus"										) ? 'selected="selected"': ''; ?>>Belarus</option> 
						<option value="Belgium"										<?php echo ($row['country']=="Belgium"										) ? 'selected="selected"': ''; ?>>Belgium</option> 
						<option value="Belize"										<?php echo ($row['country']=="Belize"										) ? 'selected="selected"': ''; ?>>Belize</option> 
						<option value="Benin"										<?php echo ($row['country']=="Benin"										) ? 'selected="selected"': ''; ?>>Benin</option> 
						<option value="Bermuda"										<?php echo ($row['country']=="Bermuda"										) ? 'selected="selected"': ''; ?>>Bermuda</option> 
						<option value="Bhutan"										<?php echo ($row['country']=="Bhutan"										) ? 'selected="selected"': ''; ?>>Bhutan</option> 
						<option value="Bolivia"										<?php echo ($row['country']=="Bolivia"										) ? 'selected="selected"': ''; ?>>Bolivia</option> 
						<option value="Bosnia and Herzegovina"						<?php echo ($row['country']=="Bosnia and Herzegovina"						) ? 'selected="selected"': ''; ?>>Bosnia and Herzegovina</option> 
						<option value="Botswana"									<?php echo ($row['country']=="Botswana"									) ? 'selected="selected"': ''; ?>>Botswana</option> 
						<option value="Bouvet Island"								<?php echo ($row['country']=="Bouvet Island"								) ? 'selected="selected"': ''; ?>>Bouvet Island</option> 
						<option value="Brazil"										<?php echo ($row['country']=="Brazil"										) ? 'selected="selected"': ''; ?>>Brazil</option> 
						<option value="British Indian Ocean Territory"				<?php echo ($row['country']=="British Indian Ocean Territory"				) ? 'selected="selected"': ''; ?>>British Indian Ocean Territory</option> 
						<option value="Brunei Darussalam"							<?php echo ($row['country']=="Brunei Darussalam"							) ? 'selected="selected"': ''; ?>>Brunei Darussalam</option> 
						<option value="Bulgaria"									<?php echo ($row['country']=="Bulgaria"									) ? 'selected="selected"': ''; ?>>Bulgaria</option> 
						<option value="Burkina Faso"								<?php echo ($row['country']=="Burkina Faso"								) ? 'selected="selected"': ''; ?>>Burkina Faso</option> 
						<option value="Burundi"										<?php echo ($row['country']=="Burundi"										) ? 'selected="selected"': ''; ?>>Burundi</option> 
						<option value="Cambodia"									<?php echo ($row['country']=="Cambodia"									) ? 'selected="selected"': ''; ?>>Cambodia</option> 
						<option value="Cameroon"									<?php echo ($row['country']=="Cameroon"									) ? 'selected="selected"': ''; ?>>Cameroon</option> 
						<option value="Canada"										<?php echo ($row['country']=="Canada"										) ? 'selected="selected"': ''; ?>>Canada</option> 
						<option value="Cape Verde"									<?php echo ($row['country']=="Cape Verde"									) ? 'selected="selected"': ''; ?>>Cape Verde</option> 
						<option value="Cayman Islands"								<?php echo ($row['country']=="Cayman Islands"								) ? 'selected="selected"': ''; ?>>Cayman Islands</option> 
						<option value="Central African Republic"					<?php echo ($row['country']=="Central African Republic"					) ? 'selected="selected"': ''; ?>>Central African Republic</option> 
						<option value="Chad"										<?php echo ($row['country']=="Chad"										) ? 'selected="selected"': ''; ?>>Chad</option> 
						<option value="Chile"										<?php echo ($row['country']=="Chile"										) ? 'selected="selected"': ''; ?>>Chile</option> 
						<option value="China"										<?php echo ($row['country']=="China"										) ? 'selected="selected"': ''; ?>>China</option> 
						<option value="Christmas Island"							<?php echo ($row['country']=="Christmas Island"							) ? 'selected="selected"': ''; ?>>Christmas Island</option> 
						<option value="Cocos (Keeling) Islands"						<?php echo ($row['country']=="Cocos (Keeling) Islands"						) ? 'selected="selected"': ''; ?>>Cocos (Keeling) Islands</option> 
						<option value="Colombia"									<?php echo ($row['country']=="Colombia"									) ? 'selected="selected"': ''; ?>>Colombia</option> 
						<option value="Comoros"										<?php echo ($row['country']=="Comoros"										) ? 'selected="selected"': ''; ?>>Comoros</option> 
						<option value="Congo"										<?php echo ($row['country']=="Congo"										) ? 'selected="selected"': ''; ?>>Congo</option> 
						<option value="Congo, The Democratic Republic of The"		<?php echo ($row['country']=="Congo, The Democratic Republic of The"		) ? 'selected="selected"': ''; ?>>Congo, The Democratic Republic of The</option> 
						<option value="Cook Islands"								<?php echo ($row['country']=="Cook Islands"								) ? 'selected="selected"': ''; ?>>Cook Islands</option> 
						<option value="Costa Rica"									<?php echo ($row['country']=="Costa Rica"									) ? 'selected="selected"': ''; ?>>Costa Rica</option> 
						<option value="Cote D'ivoire"								<?php echo ($row['country']=="Cote D'ivoire"								) ? 'selected="selected"': ''; ?>>Cote D'ivoire</option> 
						<option value="Croatia"										<?php echo ($row['country']=="Croatia"										) ? 'selected="selected"': ''; ?>>Croatia</option> 
						<option value="Cuba"										<?php echo ($row['country']=="Cuba"										) ? 'selected="selected"': ''; ?>>Cuba</option> 
						<option value="Cyprus"										<?php echo ($row['country']=="Cyprus"										) ? 'selected="selected"': ''; ?>>Cyprus</option> 
						<option value="Czech Republic"								<?php echo ($row['country']=="Czech Republic"								) ? 'selected="selected"': ''; ?>>Czech Republic</option> 
						<option value="Denmark"										<?php echo ($row['country']=="Denmark"										) ? 'selected="selected"': ''; ?>>Denmark</option> 
						<option value="Djibouti"									<?php echo ($row['country']=="Djibouti"									) ? 'selected="selected"': ''; ?>>Djibouti</option> 
						<option value="Dominica"									<?php echo ($row['country']=="Dominica"									) ? 'selected="selected"': ''; ?>>Dominica</option> 
						<option value="Dominican Republic"							<?php echo ($row['country']=="Dominican Republic"							) ? 'selected="selected"': ''; ?>>Dominican Republic</option> 
						<option value="Ecuador"										<?php echo ($row['country']=="Ecuador"										) ? 'selected="selected"': ''; ?>>Ecuador</option> 
						<option value="Egypt"										<?php echo ($row['country']=="Egypt"										) ? 'selected="selected"': ''; ?>>Egypt</option> 
						<option value="El Salvador"									<?php echo ($row['country']=="El Salvador"									) ? 'selected="selected"': ''; ?>>El Salvador</option> 
						<option value="Equatorial Guinea"							<?php echo ($row['country']=="Equatorial Guinea"							) ? 'selected="selected"': ''; ?>>Equatorial Guinea</option> 
						<option value="Eritrea"										<?php echo ($row['country']=="Eritrea"										) ? 'selected="selected"': ''; ?>>Eritrea</option> 
						<option value="Estonia"										<?php echo ($row['country']=="Estonia"										) ? 'selected="selected"': ''; ?>>Estonia</option> 
						<option value="Ethiopia"									<?php echo ($row['country']=="Ethiopia"									) ? 'selected="selected"': ''; ?>>Ethiopia</option> 
						<option value="Falkland Islands (Malvinas)"					<?php echo ($row['country']=="Falkland Islands (Malvinas)"					) ? 'selected="selected"': ''; ?>>Falkland Islands (Malvinas)</option> 
						<option value="Faroe Islands"								<?php echo ($row['country']=="Faroe Islands"								) ? 'selected="selected"': ''; ?>>Faroe Islands</option> 
						<option value="Fiji"										<?php echo ($row['country']=="Fiji"										) ? 'selected="selected"': ''; ?>>Fiji</option> 
						<option value="Finland"										<?php echo ($row['country']=="Finland"										) ? 'selected="selected"': ''; ?>>Finland</option> 
						<option value="France"										<?php echo ($row['country']=="France"										) ? 'selected="selected"': ''; ?>>France</option> 
						<option value="French Guiana"								<?php echo ($row['country']=="French Guiana"								) ? 'selected="selected"': ''; ?>>French Guiana</option> 
						<option value="French Polynesia"							<?php echo ($row['country']=="French Polynesia"							) ? 'selected="selected"': ''; ?>>French Polynesia</option> 
						<option value="French Southern Territories"					<?php echo ($row['country']=="French Southern Territories"					) ? 'selected="selected"': ''; ?>>French Southern Territories</option> 
						<option value="Gabon"										<?php echo ($row['country']=="Gabon"										) ? 'selected="selected"': ''; ?>>Gabon</option> 
						<option value="Gambia"										<?php echo ($row['country']=="Gambia"										) ? 'selected="selected"': ''; ?>>Gambia</option> 
						<option value="Georgia"										<?php echo ($row['country']=="Georgia"										) ? 'selected="selected"': ''; ?>>Georgia</option> 
						<option value="Germany"										<?php echo ($row['country']=="Germany"										) ? 'selected="selected"': ''; ?>>Germany</option> 
						<option value="Ghana"										<?php echo ($row['country']=="Ghana"										) ? 'selected="selected"': ''; ?>>Ghana</option> 
						<option value="Gibraltar"									<?php echo ($row['country']=="Gibraltar"									) ? 'selected="selected"': ''; ?>>Gibraltar</option> 
						<option value="Greece"										<?php echo ($row['country']=="Greece"										) ? 'selected="selected"': ''; ?>>Greece</option> 
						<option value="Greenland"									<?php echo ($row['country']=="Greenland"									) ? 'selected="selected"': ''; ?>>Greenland</option> 
						<option value="Grenada"										<?php echo ($row['country']=="Grenada"										) ? 'selected="selected"': ''; ?>>Grenada</option> 
						<option value="Guadeloupe"									<?php echo ($row['country']=="Guadeloupe"									) ? 'selected="selected"': ''; ?>>Guadeloupe</option> 
						<option value="Guam"										<?php echo ($row['country']=="Guam"										) ? 'selected="selected"': ''; ?>>Guam</option> 
						<option value="Guatemala"									<?php echo ($row['country']=="Guatemala"									) ? 'selected="selected"': ''; ?>>Guatemala</option> 
						<option value="Guinea"										<?php echo ($row['country']=="Guinea"										) ? 'selected="selected"': ''; ?>>Guinea</option> 
						<option value="Guinea-bissau"								<?php echo ($row['country']=="Guinea-bissau"								) ? 'selected="selected"': ''; ?>>Guinea-bissau</option> 
						<option value="Guyana"										<?php echo ($row['country']=="Guyana"										) ? 'selected="selected"': ''; ?>>Guyana</option> 
						<option value="Haiti"										<?php echo ($row['country']=="Haiti"										) ? 'selected="selected"': ''; ?>>Haiti</option> 
						<option value="Heard Island and Mcdonald Islands"			<?php echo ($row['country']=="Heard Island and Mcdonald Islands"			) ? 'selected="selected"': ''; ?>>Heard Island and Mcdonald Islands</option> 
						<option value="Holy See (Vatican City State)"				<?php echo ($row['country']=="Holy See (Vatican City State)"				) ? 'selected="selected"': ''; ?>>Holy See (Vatican City State)</option> 
						<option value="Honduras"									<?php echo ($row['country']=="Honduras"									) ? 'selected="selected"': ''; ?>>Honduras</option> 
						<option value="Hong Kong"									<?php echo ($row['country']=="Hong Kong"									) ? 'selected="selected"': ''; ?>>Hong Kong</option> 
						<option value="Hungary"										<?php echo ($row['country']=="Hungary"										) ? 'selected="selected"': ''; ?>>Hungary</option> 
						<option value="Iceland"										<?php echo ($row['country']=="Iceland"										) ? 'selected="selected"': ''; ?>>Iceland</option> 
						<option value="India"										<?php echo ($row['country']=="India"										) ? 'selected="selected"': ''; ?>>India</option> 
						<option value="Indonesia"									<?php echo ($row['country']=="Indonesia"									) ? 'selected="selected"': ''; ?>>Indonesia</option> 
						<option value="Iran, Islamic Republic of"					<?php echo ($row['country']=="Iran, Islamic Republic of"					) ? 'selected="selected"': ''; ?>>Iran, Islamic Republic of</option> 
						<option value="Iraq"										<?php echo ($row['country']=="Iraq"										) ? 'selected="selected"': ''; ?>>Iraq</option> 
						<option value="Ireland"										<?php echo ($row['country']=="Ireland"										) ? 'selected="selected"': ''; ?>>Ireland</option> 
						<option value="Israel"										<?php echo ($row['country']=="Israel"										) ? 'selected="selected"': ''; ?>>Israel</option> 
						<option value="Italy"										<?php echo ($row['country']=="Italy"										) ? 'selected="selected"': ''; ?>>Italy</option> 
						<option value="Jamaica"										<?php echo ($row['country']=="Jamaica"										) ? 'selected="selected"': ''; ?>>Jamaica</option> 
						<option value="Japan"										<?php echo ($row['country']=="Japan"										) ? 'selected="selected"': ''; ?>>Japan</option> 
						<option value="Jordan"										<?php echo ($row['country']=="Jordan"										) ? 'selected="selected"': ''; ?>>Jordan</option> 
						<option value="Kazakhstan"									<?php echo ($row['country']=="Kazakhstan"									) ? 'selected="selected"': ''; ?>>Kazakhstan</option> 
						<option value="Kenya"										<?php echo ($row['country']=="Kenya"										) ? 'selected="selected"': ''; ?>>Kenya</option> 
						<option value="Kiribati"									<?php echo ($row['country']=="Kiribati"									) ? 'selected="selected"': ''; ?>>Kiribati</option> 
						<option value="Korea, Democratic People's Republic of"		<?php echo ($row['country']=="Korea, Democratic People's Republic of"		) ? 'selected="selected"': ''; ?>>Korea, Democratic People's Republic of</option> 
						<option value="Korea, Republic of"							<?php echo ($row['country']=="Korea, Republic of"							) ? 'selected="selected"': ''; ?>>Korea, Republic of</option> 
						<option value="Kuwait"										<?php echo ($row['country']=="Kuwait"										) ? 'selected="selected"': ''; ?>>Kuwait</option> 
						<option value="Kyrgyzstan"									<?php echo ($row['country']=="Kyrgyzstan"									) ? 'selected="selected"': ''; ?>>Kyrgyzstan</option> 
						<option value="Lao People's Democratic Republic"			<?php echo ($row['country']=="Lao People's Democratic Republic"			) ? 'selected="selected"': ''; ?>>Lao People's Democratic Republic</option> 
						<option value="Latvia"										<?php echo ($row['country']=="Latvia"										) ? 'selected="selected"': ''; ?>>Latvia</option> 
						<option value="Lebanon"										<?php echo ($row['country']=="Lebanon"										) ? 'selected="selected"': ''; ?>>Lebanon</option> 
						<option value="Lesotho"										<?php echo ($row['country']=="Lesotho"										) ? 'selected="selected"': ''; ?>>Lesotho</option> 
						<option value="Liberia"										<?php echo ($row['country']=="Liberia"										) ? 'selected="selected"': ''; ?>>Liberia</option> 
						<option value="Libyan Arab Jamahiriya"						<?php echo ($row['country']=="Libyan Arab Jamahiriya"						) ? 'selected="selected"': ''; ?>>Libyan Arab Jamahiriya</option> 
						<option value="Liechtenstein"								<?php echo ($row['country']=="Liechtenstein"								) ? 'selected="selected"': ''; ?>>Liechtenstein</option> 
						<option value="Lithuania"									<?php echo ($row['country']=="Lithuania"									) ? 'selected="selected"': ''; ?>>Lithuania</option> 
						<option value="Luxembourg"									<?php echo ($row['country']=="Luxembourg"									) ? 'selected="selected"': ''; ?>>Luxembourg</option> 
						<option value="Macao"										<?php echo ($row['country']=="Macao"										) ? 'selected="selected"': ''; ?>>Macao</option> 
						<option value="Macedonia, The Former Yugoslav Republic of"	<?php echo ($row['country']=="Macedonia, The Former Yugoslav Republic of"	) ? 'selected="selected"': ''; ?>>Macedonia, The Former Yugoslav Republic of</option> 
						<option value="Madagascar"									<?php echo ($row['country']=="Madagascar"									) ? 'selected="selected"': ''; ?>>Madagascar</option> 
						<option value="Malawi"										<?php echo ($row['country']=="Malawi"										) ? 'selected="selected"': ''; ?>>Malawi</option> 
						<option value="Malaysia"									<?php echo ($row['country']=="Malaysia"									) ? 'selected="selected"': ''; ?>>Malaysia</option> 
						<option value="Maldives"									<?php echo ($row['country']=="Maldives"									) ? 'selected="selected"': ''; ?>>Maldives</option> 
						<option value="Mali"										<?php echo ($row['country']=="Mali"										) ? 'selected="selected"': ''; ?>>Mali</option> 
						<option value="Malta"										<?php echo ($row['country']=="Malta"										) ? 'selected="selected"': ''; ?>>Malta</option> 
						<option value="Marshall Islands"							<?php echo ($row['country']=="Marshall Islands"							) ? 'selected="selected"': ''; ?>>Marshall Islands</option> 
						<option value="Martinique"									<?php echo ($row['country']=="Martinique"									) ? 'selected="selected"': ''; ?>>Martinique</option> 
						<option value="Mauritania"									<?php echo ($row['country']=="Mauritania"									) ? 'selected="selected"': ''; ?>>Mauritania</option> 
						<option value="Mauritius"									<?php echo ($row['country']=="Mauritius"									) ? 'selected="selected"': ''; ?>>Mauritius</option> 
						<option value="Mayotte"										<?php echo ($row['country']=="Mayotte"										) ? 'selected="selected"': ''; ?>>Mayotte</option> 
						<option value="Mexico"										<?php echo ($row['country']=="Mexico"										) ? 'selected="selected"': ''; ?>>Mexico</option> 
						<option value="Micronesia, Federated States of"				<?php echo ($row['country']=="Micronesia, Federated States of"				) ? 'selected="selected"': ''; ?>>Micronesia, Federated States of</option> 
						<option value="Moldova, Republic of"						<?php echo ($row['country']=="Moldova, Republic of"						) ? 'selected="selected"': ''; ?>>Moldova, Republic of</option> 
						<option value="Monaco"										<?php echo ($row['country']=="Monaco"										) ? 'selected="selected"': ''; ?>>Monaco</option> 
						<option value="Mongolia"									<?php echo ($row['country']=="Mongolia"									) ? 'selected="selected"': ''; ?>>Mongolia</option> 
						<option value="Montserrat"									<?php echo ($row['country']=="Montserrat"									) ? 'selected="selected"': ''; ?>>Montserrat</option> 
						<option value="Morocco"										<?php echo ($row['country']=="Morocco"										) ? 'selected="selected"': ''; ?>>Morocco</option> 
						<option value="Mozambique"									<?php echo ($row['country']=="Mozambique"									) ? 'selected="selected"': ''; ?>>Mozambique</option> 
						<option value="Myanmar"										<?php echo ($row['country']=="Myanmar"										) ? 'selected="selected"': ''; ?>>Myanmar</option> 
						<option value="Namibia"										<?php echo ($row['country']=="Namibia"										) ? 'selected="selected"': ''; ?>>Namibia</option> 
						<option value="Nauru"										<?php echo ($row['country']=="Nauru"										) ? 'selected="selected"': ''; ?>>Nauru</option> 
						<option value="Nepal"										<?php echo ($row['country']=="Nepal"										) ? 'selected="selected"': ''; ?>>Nepal</option> 
						<option value="Netherlands"									<?php echo ($row['country']=="Netherlands"									) ? 'selected="selected"': ''; ?>>Netherlands</option> 
						<option value="Netherlands Antilles"						<?php echo ($row['country']=="Netherlands Antilles"						) ? 'selected="selected"': ''; ?>>Netherlands Antilles</option> 
						<option value="New Caledonia"								<?php echo ($row['country']=="New Caledonia"								) ? 'selected="selected"': ''; ?>>New Caledonia</option> 
						<option value="New Zealand"									<?php echo ($row['country']=="New Zealand"									) ? 'selected="selected"': ''; ?>>New Zealand</option> 
						<option value="Nicaragua"									<?php echo ($row['country']=="Nicaragua"									) ? 'selected="selected"': ''; ?>>Nicaragua</option> 
						<option value="Niger"										<?php echo ($row['country']=="Niger"										) ? 'selected="selected"': ''; ?>>Niger</option> 
						<option value="Nigeria"										<?php echo ($row['country']=="Nigeria"										) ? 'selected="selected"': ''; ?>>Nigeria</option> 
						<option value="Niue"										<?php echo ($row['country']=="Niue"										) ? 'selected="selected"': ''; ?>>Niue</option> 
						<option value="Norfolk Island"								<?php echo ($row['country']=="Norfolk Island"								) ? 'selected="selected"': ''; ?>>Norfolk Island</option> 
						<option value="Northern Mariana Islands"					<?php echo ($row['country']=="Northern Mariana Islands"					) ? 'selected="selected"': ''; ?>>Northern Mariana Islands</option> 
						<option value="Norway"										<?php echo ($row['country']=="Norway"										) ? 'selected="selected"': ''; ?>>Norway</option> 
						<option value="Oman"										<?php echo ($row['country']=="Oman"										) ? 'selected="selected"': ''; ?>>Oman</option> 
						<option value="Pakistan"									<?php echo ($row['country']=="Pakistan"									) ? 'selected="selected"': ''; ?>>Pakistan</option> 
						<option value="Palau"										<?php echo ($row['country']=="Palau"										) ? 'selected="selected"': ''; ?>>Palau</option> 
						<option value="Palestinian Territory, Occupied"				<?php echo ($row['country']=="Palestinian Territory, Occupied"				) ? 'selected="selected"': ''; ?>>Palestinian Territory, Occupied</option> 
						<option value="Panama"										<?php echo ($row['country']=="Panama"										) ? 'selected="selected"': ''; ?>>Panama</option> 
						<option value="Papua New Guinea"							<?php echo ($row['country']=="Papua New Guinea"							) ? 'selected="selected"': ''; ?>>Papua New Guinea</option> 
						<option value="Paraguay"									<?php echo ($row['country']=="Paraguay"									) ? 'selected="selected"': ''; ?>>Paraguay</option> 
						<option value="Peru"										<?php echo ($row['country']=="Peru"										) ? 'selected="selected"': ''; ?>>Peru</option> 
						<option value="Philippines"									<?php echo ($row['country']=="Philippines"									) ? 'selected="selected"': ''; ?>>Philippines</option> 
						<option value="Pitcairn"									<?php echo ($row['country']=="Pitcairn"									) ? 'selected="selected"': ''; ?>>Pitcairn</option> 
						<option value="Poland"										<?php echo ($row['country']=="Poland"										) ? 'selected="selected"': ''; ?>>Poland</option> 
						<option value="Portugal"									<?php echo ($row['country']=="Portugal"									) ? 'selected="selected"': ''; ?>>Portugal</option> 
						<option value="Puerto Rico"									<?php echo ($row['country']=="Puerto Rico"									) ? 'selected="selected"': ''; ?>>Puerto Rico</option> 
						<option value="Qatar"										<?php echo ($row['country']=="Qatar"										) ? 'selected="selected"': ''; ?>>Qatar</option> 
						<option value="Reunion"										<?php echo ($row['country']=="Reunion"										) ? 'selected="selected"': ''; ?>>Reunion</option> 
						<option value="Romania"										<?php echo ($row['country']=="Romania"										) ? 'selected="selected"': ''; ?>>Romania</option> 
						<option value="Russian Federation"							<?php echo ($row['country']=="Russian Federation"							) ? 'selected="selected"': ''; ?>>Russian Federation</option> 
						<option value="Rwanda"										<?php echo ($row['country']=="Rwanda"										) ? 'selected="selected"': ''; ?>>Rwanda</option> 
						<option value="Saint Helena"								<?php echo ($row['country']=="Saint Helena"								) ? 'selected="selected"': ''; ?>>Saint Helena</option> 
						<option value="Saint Kitts and Nevis"						<?php echo ($row['country']=="Saint Kitts and Nevis"						) ? 'selected="selected"': ''; ?>>Saint Kitts and Nevis</option> 
						<option value="Saint Lucia"									<?php echo ($row['country']=="Saint Lucia"									) ? 'selected="selected"': ''; ?>>Saint Lucia</option> 
						<option value="Saint Pierre and Miquelon"					<?php echo ($row['country']=="Saint Pierre and Miquelon"					) ? 'selected="selected"': ''; ?>>Saint Pierre and Miquelon</option> 
						<option value="Saint Vincent and The Grenadines"			<?php echo ($row['country']=="Saint Vincent and The Grenadines"			) ? 'selected="selected"': ''; ?>>Saint Vincent and The Grenadines</option> 
						<option value="Samoa"										<?php echo ($row['country']=="Samoa"										) ? 'selected="selected"': ''; ?>>Samoa</option> 
						<option value="San Marino"									<?php echo ($row['country']=="San Marino"									) ? 'selected="selected"': ''; ?>>San Marino</option> 
						<option value="Sao Tome and Principe"						<?php echo ($row['country']=="Sao Tome and Principe"						) ? 'selected="selected"': ''; ?>>Sao Tome and Principe</option> 
						<option value="Saudi Arabia"								<?php echo ($row['country']=="Saudi Arabia"								) ? 'selected="selected"': ''; ?>>Saudi Arabia</option> 
						<option value="Senegal"										<?php echo ($row['country']=="Senegal"										) ? 'selected="selected"': ''; ?>>Senegal</option> 
						<option value="Serbia and Montenegro"						<?php echo ($row['country']=="Serbia and Montenegro"						) ? 'selected="selected"': ''; ?>>Serbia and Montenegro</option> 
						<option value="Seychelles"									<?php echo ($row['country']=="Seychelles"									) ? 'selected="selected"': ''; ?>>Seychelles</option> 
						<option value="Sierra Leone"								<?php echo ($row['country']=="Sierra Leone"								) ? 'selected="selected"': ''; ?>>Sierra Leone</option> 
						<option value="Singapore"									<?php echo ($row['country']=="Singapore"									) ? 'selected="selected"': ''; ?>>Singapore</option> 
						<option value="Slovakia"									<?php echo ($row['country']=="Slovakia"									) ? 'selected="selected"': ''; ?>>Slovakia</option> 
						<option value="Slovenia"									<?php echo ($row['country']=="Slovenia"									) ? 'selected="selected"': ''; ?>>Slovenia</option> 
						<option value="Solomon Islands"								<?php echo ($row['country']=="Solomon Islands"								) ? 'selected="selected"': ''; ?>>Solomon Islands</option> 
						<option value="Somalia"										<?php echo ($row['country']=="Somalia"										) ? 'selected="selected"': ''; ?>>Somalia</option> 
						<option value="South Africa"								<?php echo ($row['country']=="South Africa"								) ? 'selected="selected"': ''; ?>>South Africa</option> 
						<option value="South Georgia and The South Sandwich Islands"<?php echo ($row['country']=="South Georgia and The South Sandwich Islands") ? 'selected="selected"': ''; ?>>South Georgia and The South Sandwich Islands</option> 
						<option value="Spain"										<?php echo ($row['country']=="Spain"										) ? 'selected="selected"': ''; ?>>Spain</option> 
						<option value="Sri Lanka"									<?php echo ($row['country']=="Sri Lanka"									) ? 'selected="selected"': ''; ?>>Sri Lanka</option> 
						<option value="Sudan"										<?php echo ($row['country']=="Sudan"										) ? 'selected="selected"': ''; ?>>Sudan</option> 
						<option value="Suriname"									<?php echo ($row['country']=="Suriname"									) ? 'selected="selected"': ''; ?>>Suriname</option> 
						<option value="Svalbard and Jan Mayen"						<?php echo ($row['country']=="Svalbard and Jan Mayen"						) ? 'selected="selected"': ''; ?>>Svalbard and Jan Mayen</option> 
						<option value="Swaziland"									<?php echo ($row['country']=="Swaziland"									) ? 'selected="selected"': ''; ?>>Swaziland</option> 
						<option value="Sweden"										<?php echo ($row['country']=="Sweden"										) ? 'selected="selected"': ''; ?>>Sweden</option> 
						<option value="Switzerland"									<?php echo ($row['country']=="Switzerland"									) ? 'selected="selected"': ''; ?>>Switzerland</option> 
						<option value="Syrian Arab Republic"						<?php echo ($row['country']=="Syrian Arab Republic"						) ? 'selected="selected"': ''; ?>>Syrian Arab Republic</option> 
						<option value="Taiwan, Province of China"					<?php echo ($row['country']=="Taiwan, Province of China"					) ? 'selected="selected"': ''; ?>>Taiwan, Province of China</option> 
						<option value="Tajikistan"									<?php echo ($row['country']=="Tajikistan"									) ? 'selected="selected"': ''; ?>>Tajikistan</option> 
						<option value="Tanzania, United Republic of"				<?php echo ($row['country']=="Tanzania, United Republic of"				) ? 'selected="selected"': ''; ?>>Tanzania, United Republic of</option> 
						<option value="Thailand"									<?php echo ($row['country']=="Thailand"									) ? 'selected="selected"': ''; ?>>Thailand</option> 
						<option value="Timor-leste"									<?php echo ($row['country']=="Timor-leste"									) ? 'selected="selected"': ''; ?>>Timor-leste</option> 
						<option value="Togo"										<?php echo ($row['country']=="Togo"										) ? 'selected="selected"': ''; ?>>Togo</option> 
						<option value="Tokelau"										<?php echo ($row['country']=="Tokelau"										) ? 'selected="selected"': ''; ?>>Tokelau</option> 
						<option value="Tonga"										<?php echo ($row['country']=="Tonga"										) ? 'selected="selected"': ''; ?>>Tonga</option> 
						<option value="Trinidad and Tobago"							<?php echo ($row['country']=="Trinidad and Tobago"							) ? 'selected="selected"': ''; ?>>Trinidad and Tobago</option> 
						<option value="Tunisia"										<?php echo ($row['country']=="Tunisia"										) ? 'selected="selected"': ''; ?>>Tunisia</option> 
						<option value="Turkey"										<?php echo ($row['country']=="Turkey"										) ? 'selected="selected"': ''; ?>>Turkey</option> 
						<option value="Turkmenistan"								<?php echo ($row['country']=="Turkmenistan"								) ? 'selected="selected"': ''; ?>>Turkmenistan</option> 
						<option value="Turks and Caicos Islands"					<?php echo ($row['country']=="Turks and Caicos Islands"					) ? 'selected="selected"': ''; ?>>Turks and Caicos Islands</option> 
						<option value="Tuvalu"										<?php echo ($row['country']=="Tuvalu"										) ? 'selected="selected"': ''; ?>>Tuvalu</option> 
						<option value="Uganda"										<?php echo ($row['country']=="Uganda"										) ? 'selected="selected"': ''; ?>>Uganda</option> 
						<option value="Ukraine"										<?php echo ($row['country']=="Ukraine"										) ? 'selected="selected"': ''; ?>>Ukraine</option> 
						<option value="United Arab Emirates"						<?php echo ($row['country']=="United Arab Emirates"						) ? 'selected="selected"': ''; ?>>United Arab Emirates</option> 
						<option value="United Kingdom"								<?php echo ($row['country']=="United Kingdom"								) ? 'selected="selected"': ''; ?>>United Kingdom</option> 
						<option value="United States"								<?php echo ($row['country']=="United States"								) ? 'selected="selected"': ''; ?>>United States</option> 
						<option value="United States Minor Outlying Islands"		<?php echo ($row['country']=="United States Minor Outlying Islands"		) ? 'selected="selected"': ''; ?>>United States Minor Outlying Islands</option> 
						<option value="Uruguay"										<?php echo ($row['country']=="Uruguay"										) ? 'selected="selected"': ''; ?>>Uruguay</option> 
						<option value="Uzbekistan"									<?php echo ($row['country']=="Uzbekistan"									) ? 'selected="selected"': ''; ?>>Uzbekistan</option> 
						<option value="Vanuatu"										<?php echo ($row['country']=="Vanuatu"										) ? 'selected="selected"': ''; ?>>Vanuatu</option> 
						<option value="Venezuela"									<?php echo ($row['country']=="Venezuela"									) ? 'selected="selected"': ''; ?>>Venezuela</option> 
						<option value="Viet Nam"									<?php echo ($row['country']=="Viet Nam"									) ? 'selected="selected"': ''; ?>>Viet Nam</option> 
						<option value="Virgin Islands, British"						<?php echo ($row['country']=="Virgin Islands, British"						) ? 'selected="selected"': ''; ?>>Virgin Islands, British</option> 
						<option value="Virgin Islands, U.S."						<?php echo ($row['country']=="Virgin Islands, U.S."						) ? 'selected="selected"': ''; ?>>Virgin Islands, U.S.</option> 
						<option value="Wallis and Futuna"							<?php echo ($row['country']=="Wallis and Futuna"							) ? 'selected="selected"': ''; ?>>Wallis and Futuna</option> 
						<option value="Western Sahara"								<?php echo ($row['country']=="Western Sahara"								) ? 'selected="selected"': ''; ?>>Western Sahara</option> 
						<option value="Yemen"										<?php echo ($row['country']=="Yemen"										) ? 'selected="selected"': ''; ?>>Yemen</option> 
						<option value="Zambia"										<?php echo ($row['country']=="Zambia"										) ? 'selected="selected"': ''; ?>>Zambia</option> 
						<option value="Zimbabwe"									<?php echo ($row['country']=="Zimbabwe"									) ? 'selected="selected"': ''; ?>>Zimbabwe</option>
				</select>
		<p class = "p">State/Province</p>
		<input type="text" class ="input_account" id="state" name="state" value = "<?php echo $row['state'];?>">
		</br>
		</br>
		<!-- Your Contact Information -->
		<h2 class ="h2">Your Contact Information</h2>
		<hr/>
		<p class = "p">Phone</p>
		<input type="text" class ="input_account" id="phone" name="phone" value = "<?php echo $row['phone'];?>">
		
		<?php } ?>
	</div> <!-- col-md-7 -->
	</div> <!-- row -->
	 <!-- BUTTON SAVE -->
	<div class ="col-sm-5">
	</div>
	<div class ="col-sm-7">
	<div class ="text-center">
	</br>
	<button type="submit" href="#" class="mybutton-medium" allign="center"> SAVE</button>
	</div>
	</div>
	</form>
	</div> <!-- container -->



</body>
	
</html>