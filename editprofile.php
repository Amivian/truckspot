<?php
session_start();
require('users.php');
 
 $obj = new User;



if(!isset($_SESSION['id'])) {
	header("Location: login.php");
	exit();
}else{
	$owner_id = $_SESSION['id'];
 }
 $k = $obj->getUser($_SESSION['id']);

require('includes/header.php');
?>


<!--Profile Header-->
<section class="profile-header  listing_page">
  <div class="container">
    <div class="profile-header_wrap">
      <div class="profile-heading">
        <h1>Update Your Profile</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Edit Profile</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Profile Header--> 

	<section class="towner">
		<div class="container">
			<div class="row">
				<?php
				require('includes/dashboard-sidebar.php');
				 ?>
				<div class="col-md-6 p-5 offset-2">
					<div class="ownerlogo mt-3">
					</div>
					<div>
						<div>
						<h1>Update Basic Information</h1>
						</div>
						<?php
if(isset($_GET['mssg'])) {
	echo "<h2 class='alert alert-danger text-center'>". $_GET['mssg'] ."</h2>";
}?>
<?php
if(isset($_GET['result'])) {
	echo "<h2 class='alert alert-success text-center'>". $_GET['result'] ."</h2>";
}

?>
						 <form action="update.php" method="POST" enctype="multipart/form-data">
						 	<div class="form-group mb-2">
						 		<input type="hidden" name="owner_id" value="<?php echo $owner_id?>">
								<label for="fname">First Name</label>
								<input type="text" class="form-control" name="fname" value="<?php echo ucfirst($k['t_owner_fname'])?>" id="fname">
							</div>
							<div class="form-group mb-2">
								<label for="lname">Last Name</label>

								<input type="text" class="form-control" value="<?php echo ucfirst($k['t_owner_lname'])?>" name="lname" id="">
							</div>
							<div class="form-group mb-2">
								<label for="uname">User Name</label>
								<input type="text" class="form-control" id="" value=" <?php echo ucfirst($k['t_owner_uname'])?>" name="uname" disabled>
							</div>
							<div class="form-group mb-2">
								<label for="email">Email</label>
								<input type="email" class="form-control" id="" value="<?php echo $k['t_owner_email']?>" name="email" disabled>
							</div>
							<div class="form-group mb-2">
								<label for="pwd">Reset Password</label>
								<input type="password" class="form-control" id=""  name="pwd">
							</div>
							<div class="form-group mb-2">
								<label for="cpwd">Confirm Password:</label><span class="important" >*</span>
                                	<input type="password" required class="form-control" name="cpwd">
                                </div>
                                <div class="form-group mb-2">
								<label for="cpwd">Phone Number:</label><span class="important" >*</span>
                                	<input type="text"  class="form-control" name="number" value=" <?php echo $k['t_owner_pnumber']?>"required>
                                </div>
                             <div class="form-group  mb-2">
                                	<label for="cname">Company Name:</label><span class="important">*</span>
                                	<input type="text" required class="form-control" name="shop" value=" <?php echo ucfirst($k['companyname'])?>">
                                </div>
                                <div class="form-group mb-2">
                                	<label for="sub">Subscription:</label><span class="important" >*</span>
                                	      <?php  
								$obj->getSub();
								?>
                                </div>
                                <div class="row">
                                <div class="col-md-6">
                                	<label for="state">States</label><span class="important" >*</span>
                                        <?php
								$obj->get_state();
								?>
                                    </div>
                                     <div class="col-md-6">
                                       	<label for="city">City</label>
                                        	<div type="text" name="city" id="citi"></div>
                                        </div>
                                    </div>
                                    <div class="row">	
                                    	<div class="col-md-6">	
                                    		<label for="">Logo <input type="file" name="pix" class="file_input" id="pix" value=""></label>
                                    	</div>
                                    </div>	
                                <div class="form-group mt-2">
                                        <button type="submit" class="btn btn-danger btn-sm">Cancle</button>
                                         <button type="submit" class="btn btn-success btn-sm " name="update">Update</button>
                                    </div>
                            </form>
					</div>

				</div>
			</div>
		</div>
	</section>


						<script type="text/javascript" src='./bootstrap/js/jquery-3.6.0.js'></script>
	<script type="text/javascript">
$(document).ready(function(){
				$('#allstate').change(function(){
					var stateid = document.getElementById('allstate').value;
					var test = "t_states_id=" +stateid;
				
					$('#citi').load('getcity.php', test);
				})

				$('#allstate').change(function(){
					var pick= $('#allsate').val();
					var data ="put=" +pick;
						$.ajax({
						url: 'getcity.php',
						data: data,
						type: 'post',
						dataType:'json',
						success: function(msg){
								setTimeout(function(){
									$('#chose').html(msg.message);
									// $('#btn').html('Register');
					
								}, 10);

							},
						error: function(err){
								console.log(err);
						},
						})
				})

								$('#btn').click(function(){
					// $('#note').html('<h2>Button Selected</h2>');
				})
		})
</script>

<?php
include  "includes/footer.php";
?>
