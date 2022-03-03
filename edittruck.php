<?php
session_start();
if(isset($_SESSION['uname']) == 't_owner') {


  $owner_uname = $_SESSION['uname'];
}
 
require('users.php');
$objstate = new User();


include('trucky.php');
	$obj = new Trucky;
	if(isset($_POST['edit_data'])) {
	$id= $_POST['edit_id'];
	$truck = $obj->showTruckdetails($id);
}
require('includes/header.php');

?>

	<section>
		<div class="container">
			<div class="row mt100">
				<?php
				require('includes/dashboard-sidebar.php');
				 ?>
				<div class="col-md-6 mt-5 offset-2">
					<div id="note"></div>
					<?php
if(isset($_GET['result'])) {
	echo "<h2 class='alert alert-danger text-center' color:white'>". $_GET['result'] ."</h2>";
}

?>
					<div class="my-3"><h4>EDIT TRUCK</h4></div>
					<form action="edit.php" method="POST" style="margin-left:5px; padding:5px;" enctype="multipart/form-data">
						<p id='chose'></p>
						<input type="hidden" name="edit_id" value="<?php echo $id ?>">
          			  <input type="text" name="tid" class="d-none" value="<?php echo $owner_uname; ?>">

                    
						<div class="form-group my-2">
							<label for=""><b>Truck Name:</b></label>
							<?php 
							$obj->getMake();
							 ?>
						</div>
						<div class="form-group mb-2">
							<label for=""><b>Truck Type:</b></label>
							<?php 
							$obj->getType();
							 ?>
						</div>
						<div class="form-group mb-2">
						<label for=""><b>Status:</b></label>
                        <?php 
                        	$obj->statusInfo();
                        	 ?>
                     </div>
                     <div class="form-group mb-2">
						<label for=""><b>Cross Country:</b></label>
						<?php 
						$obj->crossCountry();
						 ?>
                     </div>
                     <div class="form-group">
						<label for=""><b>Category:</b></label>
							<?php 
							$obj->getcat();

							 ?>
                     </div>
                      <div class="form-group">
						<label for=""><b>State:</b></label>
						<?php
								//calling the function
								$objstate->get_state();
								?>
                     </div>

                     <div class="form-group">
						<label for=""><b>City:</b></label>
						 <div id="citi" name="city"></div>
						
                     </div>
						<div class="form-group mb-2">
						<label for=""><b>Truck Description:</b> </label>
						<textarea id="" cols="30" rows="6" name="tdescription" class="form-control"></textarea>
					</div>

                     <div class="form-group mb-2">
                     	<label for=""><b>Plate Number:</b></label>
                     	<input type="text" name="plate" class="form-control">
                     </div>
					
					 <div class="form-group mb-2">
                     	<label for="Image"><b>Truck Image:</b></label><br>
						  <input type="file" name="pix" class="file_input" id="pix" value="">
						  <div>
						
                    <div class="mt-2">
            	<button class="btn btn-sm btn-danger" type="submit" name="cancle" id="btn">Cancle</button>	
            	<button class="btn btn-sm btn-primary" type="submit" name="edit" id="btn">Update</button>
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
require('includes/header.php');
 ?>
