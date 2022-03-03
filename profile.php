<?php 	
session_start();
require('users.php');
 
 $obj = new User;

 if (!isset($_SESSION['uname'])) {
 	header('location:register.php');
 }

 $k = $obj->getUser($_SESSION['id']);
 require('includes/header.php');

$pix= $k['owner_pix'];
 if (empty($pix)) {
 	$pix = 'avatar.png';
 }
 ?>


<!--Profile Header-->
<section class="profile-header  listing_page">
  <div class="container">
    <div class="profile-header_wrap">
      <div class="profile-heading">
        <h1>Profile Page</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Profile</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Profile Header--> 
<!-- 	profile main -->
 	<section class="box">
 	<div class="container profile">	
 		<div class="row ">
 			<?php
				require('includes/dashboard-sidebar.php');
				 ?>
 		<div class="col-md-6 mt-5">
 			<?php
if(isset($_GET['result'])) {
	echo "<h2 class='alert alert-success text-center'>". $_GET['result'] ."</h2>";
}
	if(isset($_GET['msg'])) {
	echo "<h2 class='alert alert-success text-center'>". $_GET['msg'] ."</h2>";
}

?>
 		<span><b><?php echo "Welcome ". ucfirst($k['t_owner_fname'])."!";
		?></b></span><br>
		<img src="images/logo/<?php echo $pix ?>" width="100" alt="profile"><br>
		<span>Registered on : <?php date_default_timezone_set("Africa/Lagos"); 
		 	 echo date('F j, Y, g:i a', strtotime($k['datereg'])); ?></span><br>
		 	
		 		<?php
					if ($k['owner_pix'] =='') {
						?>
						<form action="uploadprofile.php" method="post" enctype="multipart/form-data">
							
						  <input type="file" name="pix" class="file_input" id="pix"><br>
							<div class="mt-2">
								<button type="submit" class="btn btn-sm btn-danger" >Upload Picture</button>
							</div>
							</form>
					 <?php
					}
					?> 
						
					
			</div>
			<div class="col-md-3 mt-5">
				
							<p><b>First Name:</b> <?php echo ucfirst($k['t_owner_fname'])?></p>
							<p><b>Last Name:</b> <?php echo ucfirst($k['t_owner_lname'])?></p>
							<p><b>Username:</b> <?php echo ucfirst($k['t_owner_uname'])?></p>
							<p><b>Email:</b> <?php echo $k['t_owner_email']?></p>
							<p><b>Phone Number:</b> <?php echo $k['t_owner_pnumber']?></p>
							<p><b>Company Name:</b>  <?php echo ucfirst($k['companyname'])?></p>
							<p><b>State:</b> <?php echo $k['t_states_name']?></p>
							<p><b>City:</b> <?php echo $k['t_city_name']?> </p>
							<p><b>Status:</b> <?php echo $k['status']?> </p>
							<p>Last Updated on: <?php date_default_timezone_set("Africa/Lagos"); 
		 	 echo date('F j, Y, g:i a', strtotime($k['updatedon']));?></p>
					
		</div>

			</div>
 </section>


<?php 

require('includes/footer.php');

 ?>