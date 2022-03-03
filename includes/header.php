<?php

if(!isset($_SESSION)){
	session_start();
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--required meta tags-->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta content="Truck Rentals" name="keywords">
    <meta content="Post a Truck" name="description">
		<!--font awesome CSS-->
		<link rel="stylesheet" type="text/css" href="./bootstrap/fontawesome/css/all.min.css?version=<?php echo time(); ?>">
		<!-- bootstrap css -->
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css?version=<?php echo time(); ?>">
		<!-- animate css -->
		<link rel="stylesheet" type="text/css" href="./bootstrap/css/animate.min.css?version=<?php echo time(); ?>">
		<!-- css styles -->
		<link rel="stylesheet" type="text/css" href="./css/style.css?version=<?php echo time(); ?>">
		<!--favicon icon  -->
		<link rel="icon"  href="favicon.ico">
		<style type="text/css">

		</style>
		<title>Truckspot, reliable place to get best Rental Trucks</title>
	</head>
	<body>
<section>
		<header id="header" class="bg-dark">
			<div class="container">
				<nav class="nav d-flex">
					<a class="logo active animate__animated animate__slower animate__slideInLeft" href="index.php"><img src="images/truck.png" class="img-fluid" alt=""></a>


					<div class="burger">
						<span class="hand-bug"></span>
						<span class="hand-bug"></span>
						<span class="hand-bug"></span>
						<span class="hand-bug bug"></span>
					</div>

					<div class="navigation-bar">
						<ul class="headnav">
							<li class='nav-links'><a class='links' href='trucks.php'>Trucks Listing</a></li>
							<li class="nav-links"><a class=' links' href='#aboutus'>About Us</a></li>
								<?php
if(!isset($_SESSION['id'])) {
									
							echo "<li class='nav-links'><a class='links' href='register.php'>Register</a> </li>";
							echo " <li class='nav-links'> <a class='links' href='login.php'>Login</a></li>";				
							echo"<li class='nav-links bg-red'><button type='button' class='user_button contact'> <a class='link' href='register.php'>Post Truck</a></button></li>";
								}else{
							echo "<li class='nav-links'><a class='active links' href='index.php'>Home</a> </li>";	
							echo "<li class='nav-links'><a class='links' href='profile.php'>Profile</a></li>";
							echo "<li class='nav-links'><a class='links' href='truckmanagement.php'>Trucks Management</a></li>";
							echo " <li class='nav-links'> <button type='button' class=' user_button contact'> <a class='link' style='color:white;' href='profile.php'> Hi " . $_SESSION['fname'] . " ! </a></button></li>";
						}
				?>
						</ul>
					</div>
				</nav>
			</div>
		</header>
	</section>