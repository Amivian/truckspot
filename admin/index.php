<!DOCTYPE html>
<html>
<head>
	<title>ADMIN LOGIN FORM</title>
	<link rel="stylesheet" type="text/css" href="css/admin.css?version=<?php echo time(); ?>">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
		<div class="main">
				<div class="inner">
				<div class="innerbox  mx-auto">	
					<img src="images/avatr.png" class="avatr" width="100px">
				</div>		
				<div class="mt-2">
					<h2>Admin Login</h2>
				</div>
				<form action="logincheckadmin.php" method="post">
					<div class="m">	
						<label for="" class="mx-3">Email</label>
						<input type="text" class="input-box" placeholder="Enter Email" name="email" required>
					</div>
					<div>	
						<label for="" class="mx-3">Password</label>
						<input type="password" class="input-box" placeholder="Enter Password" name="pass" required>
					</div>	
					<div>	
						<button type="submit" name="submit" class="btn btn-danger">Login</button>
					</div>
					<div class="mx-3">	
						<input type="checkbox">
						<label for=""> Remember Password</label>
					</div>	
					<div class="mx-3">	
						<a href="#">Forgotten Password?</a>
					</div>		
					<div class="mx-3 adminback">
						<p style="margin-top: 4%"><a href="../index.php">Back to Home</a>	</p>
					</div>
				</form>

			</div>
		 </div>
	</div>
</body>
</html>