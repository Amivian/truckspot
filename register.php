   	<?php

include "includes/header.php";
require('users.php');
 
 $obj = new User;
		?>


		<section  class="register mt-">

			<div class="container">
				<div class="row">
					<div class="col-md-4">
						<h2 style="color:black">Create your TruckSpot Rental Account</h2>

							<?php 
							if (isset($_GET['msg'])) {
								echo "<h4 class='alert alert-info'>". $_GET['msg']. "</h4>";
							}
							?>
						<form action="registerprocess.php" method="post" id="user_form">
						<div class="form-group mb-2">
								<label for="fname">First Name</label>
								<input type="text" class="form-control" name="fname" value="" id="fname">
							</div>
							<div class="form-group mb-2">
								<label for="">Last Name</label>
								<input type="text" class="form-control" value="" name="lname" id="">
							</div>
							<div class="form-group mb-2">
								<label for="">User Name</label>
								<input type="text" class="form-control" id="" value="" name="uname">
							</div>
							<div class="form-group mb-2">
								<label for="">Email</label>
								<input type="email" class="form-control" id="" value="" name="email">
							</div>
							<div class="form-group mb-2">
								<label for="">Phone Number</label>
								<input type="text" class="form-control" value="" name="phone" id="" required>
							</div>
							<div class="form-group mb-2">
								<label for="">Password</label>
								<input type="password" class="form-control" id="" value="" name="pwd">
							</div>
							<div class="form-group mb-2">
								<label for="">Confirm Password</label>
								<input type="password" class="form-control" id="" value="" name="cpwd">
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
							<div class="form-group mt-3">
								<button class="btn btn-primary btn-block" type="submit" id="regbtn" name="regbtn">Register </button>
								<!-- <button class="btn btn-primary btn-block" type="submit" id="regbtn" name="regbtn"><a href='login.php'>Login Here</a></button> -->
							</div>
						</form>
					</div>
					<div class="col-md-5 offset-3 mt-  pt-">
						<h3>ARE YOU A TRUCK OWNER OR SOMEONE IN NEED OF A TRUCK?</h3>
						<h5 style='color:black'>Register NOW to get connected !!!</h5>
						<p style='text-align:left'>Its free and only takes a minute</p>
						<i class="fas fa-search"></i><span> Search for Reliable and affordable<br> <i class="= fas fa-truck"></i>  Truck Rentals around you. <br>
							<i class="fas fa-users"></i> Over 100 truck rental services at your disposal. 24/7 Service Avaliable.</span>
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

include ("includes/header.php");

	?>
