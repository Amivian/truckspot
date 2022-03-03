	<?php
require('trucky.php');
if(isset($_GET['search'])) {

$make = $_GET['truck_name'];
$cat = $_GET['tcat'];

	$obj = new Trucky;
	$output = $obj->searchTruck($make, $cat);
	$recent = $obj->showRecentTrucks();
	// // 
	// error_reporting(0);
}

include "includes/header.php";

		?>
<!--Page Header-->
<section class="trucks-header  listing_page">
  <div class="container">
    <div class="trucks-header_wrap">
      <div class="trucks-heading">
        <h1>Truck search</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Truck Search</li>
      </ul>
    </div>
  </div>
</section>
<!-- /Page Header--> 



	<section class="mt-3 listings">
		<div class="container">
			<div class="row">
				 <div class="col-md-9 order-md-3">
 				<?php 
if($output) {
				foreach ($output as $truck) {
				

?>				 
				 	 <div class="truck-listing-m gray-bg">
					<div class="truck-listing-img">
							<img src="images/trucks/<?php echo $truck['image_name'] ?>" class="img-res">
						</div>
						<div class="truck-listing-content">
					<h5><a href="truck.php?id=<?php echo $truck['t_trucks_id'] ?>"><?php echo $truck['t_truck_make'] ?>,<?php echo $truck['t_cat_name'] ?></a>
					 </h5>

				<table class="table">
							<tbody>
								<tr>
								<td><i class="fa fa-truck"></i>
								2015 </td>
								<td><i class="fa fa-dashboard"></i>
								Diesel </td>
								<td><i class="fa fa-cog"></i>
								Auto </td>
								<td>
								<i class="fa fa-road"></i> 25000 </td>
							</tr>
						</tbody>
					</table>
					<a href="truck.php?id=<?php echo $truck['t_trucks_id'] ?>" class="btn btn-danger color-white">View Details <span class="angle_arrow"><i class="fa fa-angle-right" aria-hidden="true"></i></span></a>
					</div>
				</div>
 <?php 

                }} else {

                    echo "<h1 class='alert alert-danger' style='text-align:center'>No Result Found !!!</h1>";
                }
                ?>		</div>

			<!-- search section -->

		 <aside class="col-md-3 order-md-9">
        <div class="sidebar_search">
          <div class="filter_heading">
            <h5 class="filter"><i class="fa fa-filter" aria-hidden="true"></i> Find Best Rental Trucks</h5>
          </div>
           <div class="sidebar_filter">
            <form action="#" method="get">
              <div class="form-group select gray-bg" name="type">
               
                  	<?php 
							$obj->getMake();
					 ?>
               </div>


                <div class="form-group select my-2" name="cat">
                	<?php 
							$obj->getcat();
					 ?>
                </div>

                <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block" name="search"><i class="fa fa-search" aria-hidden="true"></i> Search Truck</button>
              </div>
		    </form>
		  </div>
      </div>

	 <div class="sidebar_search">
          <div class="filter_heading">
            <h5 class="filter"><i class="fa fa-truck" aria-hidden="true"></i> Recently Listed Trucks</h5>
          </div>
          <div class="recent_trucks">
		     <ul>
<?php
foreach ($recent as $new) {
 ?>	
          	 <li class=" gray-bg">
					<div class="recent_post_img">
						<a href="truck.php?id=<?php echo $new['t_trucks_id'] ?>"><img src="images/trucks/<?php echo $new['image_name'] ?>">
						</a></div>
						<div class="recent_post_title">
					<p><a href="truck.php?id=<?php echo $new['t_trucks_id'] ?>"><?php echo $new['t_truck_make'] ?>,<?php echo $new['t_cat_name'] ?></a>
					 </p>
					</div>
				</li>
<?php } ?>	
				</ul>
			</div>
          </div>
      </div>
  </aside>
		</div>
	</div>

</section>

			<?php

include "includes/footer.php";
		?>

		


