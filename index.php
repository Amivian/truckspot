		<?php

include "includes/header.php";
require('trucky.php');
	$obj= new Trucky;
	$output = $obj->showAlltrucks();	// 
		?>
		
		<!-- jumbo search for trucks starts here -->

		<section id='jumbo'>
			<div class="container">
				<div class="row">
					<div class="col-md-7  mt-5 pt-4">
						<form action="trucksearch.php" method="get" class="">
							<!-- <h2 class="caption-title"></h2> -->
							<h3 class="subtitle mt-5">Find Best Rental Trucks</h3>
							<div class="row">
								<div class="col-sm-12 col-md-10 col-md-offset-1">
									<div class="form-search dark">
										<div>
											<div class="form-title col-md-11">
												<i class="search"></i>
												<h2>Search for Cheap Rental Trucks Around You!</h2>
											</div>
											<div class="row row-inputs">
												<div class="container-fluid mr-4">
													<div class="col-md-12 d-flex justify-content-between align-items-center">
														<div class="col-md-5 mr-3 form-group detail has-labe">
															<label for="formSearchUpLocation">
															Truck Type </label>
															<input  name="truck_name" value="truck_name" type="hidden" class="form-control formSearchUpLocation" id="formSearchUpLocation" value="" placeholder="DAF,MACK,Others">
																<?php 
																$obj->getMake();
																 ?>
															
														</div>
														<div class="col-md-5 ml-3 form-group detail labely">
															<label for="formSearchUpDate">
															Truck Category </label>
															<input  name="tcat" value='tcat' type="hidden" class="form-control" id="formSearchUpDate" value="" placeholder="Flatbed,Offcountry,Others">
																<?php 
																$obj->getcat();
														 ?>
															
														</div>
													</div>
													<div class="col-md-12 d-flex justify-content-between align-items-cente">
														<div class="col-md-5 mr-3 form-group detail labely">
															<label for="formSearchOffLocation">
															Picking Up Location </label>
															<input  name="dropoff" type="text" class="form-control formSearchUpLocation" id="formSearchOffLocation" value="" placeholder="Factory or Anywhere">
															
														</div>
														<div class="col-md-5 ml-3 form-group detail labely">
															<label for="formSearchOffDate">
															Picking Up Date </label>
															<input  name="end_date" type="date" class="form-control" id="formSearchOffDate" value="" placeholder="dd/mm/yyyy">
															
														</div>
													</div>
													<div class="col-md-12 d-flex justify-content-between align-items-cente mb-3">
														<div class="col-md-5 mr-3 form-group detail labely">
															<label for="formSearchOffLocation">
															Dropping Off Location </label>
															<input  name="dropoff" type="text" class="form-control formSearchUpLocation date" id="formSearchOffLocation" value="" placeholder="Warehouse or Anywhere">
															
														</div>
														<div class="col-md-5 ml-3 form-group detail labely">
															<label for="formSearchOffDate">
															Dropping Off Date </label>
															<input  name="end_date" type="date" class="form-control" id="formSearchOffDate" value="" placeholder="dd/mm/yyyy">
															
														</div>
													</div>
													<div class="col-md-11 mx-aut">
														<button type="submit" id="formSearchSubmit" name="search" class="mx-auto btn btn-block btn-submit btn-theme">
														Find Truck  </button>
													</div>
												</div>
											</div>
											
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>
		<!-- jumbo search for trucks starts here -->
	


				<!-- Featured trucks -->

<section class="section-padding gray-bg ">
  <div class="container p-5">
    <div class="Featured-header text-center">
      <h2>Featured Trucks</span> All for You</h2>
      <p>In need of a trustworthy and reliable truck rental Services or you want to make money off your trucks? Worry less cause we gat you covered.  TruckSpot provides all range of heavy duty trucks suitable for varity of goods and containers in and outside your locality.  our aim is to provide truck rental services for your every need or requirement. With our experience in the transportation industry, we are well trained and experienced in handling precious cargo. If you own a truck, you are just a click away from making money just register and just sstarted.
    <div class="row mt-3"> 
     <div class="recent-tab ">
        <ul class="new" role="tablist">
          <li role="presentation" class="active text-center"><a href="#latesttrucks" role="tab" data-toggle="tab" class="front">Latest Truck</a></li>
        </ul>
      </div>
           <div class="listed-tab-content">
        <div role="tabpanel" class="tab-pane active" id="latesttrucks">

							<?php 

				foreach ($output as $truck) {
				

				 ?>
<div class="listed-icons">
	<div class="latest-truck-list">
		<div class="truck-box"><a href="truck.php?id=<?php echo $truck['t_trucks_id'] ?>"> <img src="images/trucks/<?php echo $truck['image_name'] ?>" class="img-res"></a>
		<ul>
			<li><i class="fa fa-truck" aria-hidden="true"></i><?php echo $truck['t_type_name'] ?></span></li>
			<li><i class="fas fa-map-marker-alt" aria-hidden="true"></i> <?php echo $truck['t_city_name'] ?>,<?php echo $truck['t_states_name'] ?></span></li>
			<li><i class="fa fa-road" aria-hidden="true"></i><?php echo $truck['t_status'] ?></span></li>
		</ul>
	</div>
	<div class="truck-overview">
		<h6><a href="truck.php?id=<?php echo $truck['t_trucks_id'] ?>"> <?php echo $truck['t_truck_make'] ?>,<?php echo $truck['t_cat_name'] ?></a></h6>
	</div>
</div>
</div>
<?php 	} ?>
       
      </div>
    </div>
  </div>
</div>
</section>

<!-- /Featured trucks --> 






<!-- statistics page -->
    <section class="stat-page div_zindex">
        <div class="container" style="background-color: transparent;">
            <div class="row">
                <div class="col-md-3 animate__animated animate__slower animate__fadeInLeft">
                    <div class="thumbnail thumbnail-counto no-border no-padding">
                        <div class="stat">
                            <div class="stat-icon"><i class="fas fa-heart"></i></div>
                            <div class="stat-number">1894</div>
                            <h4 class="stat-title">Happy Customers</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate__animated animate__slower animate__fadeInUp">
                    <div class="thumbnail thumbnail-counto no-border no-padding">
                        <div class="stat">
                            <div class="stat-icon"><i class="fas fa-truck-monster"></i></div>
                            <div class="stat-number">520</div>
                            <h4 class="stat-title">Total Truck Count</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate__animated animate__slower animate__fadeInDown">
                    <div class="thumbnail thumbnail-counto no-border no-padding">
                        <div class="stat">
                            <div class="stat-icon"><i class="fas fa-flag "></i></div>
                            <div class="stat-number">2.412.835</div>
                            <h4 class="stat-title">Total KM/MIL</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 animate__animated animate__slower animate__fadeInRight" >
                    <div class="thumbnail thumbnail-counto no-border no-padding">
                        <div class="stat">
                            <div class="stat-icon"><i class="fas fa-comment-alt"></i></div>
                            <div class="stat-number">+234015467</div>
                            <h4 class="stat-title">Customer's Call Service</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!--  statistic page -->


   
		
		
		
		<?php

include "includes/footer.php";
		?>