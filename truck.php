<?php 
include "includes/header.php";
include('trucky.php');
$id = $_GET['id'];
	$obj = new Trucky;
	$truck = $obj->showTruckdetails($id);

 ?>




<section class="mt500">
 <div class="container">
 	<div class="row">
 		<div class="col-md-6">
 		        <img src="images/trucks/<?php echo $truck['image_name'] ?>" class="img-res">
      </div>
            <div class="truck_details col-md-6 card">
                    <ul class="list-item mt-2">
                       <li class="list-item card-heading">
                            <h2> <b> <?php echo $truck['t_truck_make'] ?>, <?php echo $truck['t_cat_name'] ?></b></h2> 
						</li>
            <li class="list-item">
              <span> Truck Overview: <em><?php echo $truck['truck_overview'] ?></em></span> 
            </li>
						<li class="list-item">
							<span> Status: <button type="button" class="btn btn-success"><?php echo $truck['t_status'] ?></button></span> 
						</li>
						<li class="list-item">
							<span> Cross Country: <b><?php echo $truck['t_cross_country'] ?></b></span> 
						</li>
						<li class="list-item">
							<span> State: <b><?php echo $truck['t_states_name'] ?></b></span> 
						</li>
						<li class="list-item">
							<span> City: <b><?php echo $truck['t_city_name'] ?></b></span> 
						</li>

                    </ul>
                     <span> <button type="submit" href="dealers.php?id=<?php echo $truck['t_owner_id'] ?>" data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-danger ">Rent</button></span>
                        </div>
                        </div>
 		</div>
 	<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Truck Owner Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <ul>
       					<li class="list-item">
							<p> Name: <b><?php echo ucfirst($truck['t_owner_fname']);?>
							     <?php echo ucfirst($truck['t_owner_lname']);?> </b></p> 
						</li>
       					<li class="list-item">
							<p> Email: <b><?php echo $truck['t_owner_email'] ?></b></p> 
						</li>
						<li class="list-item">
							<p> Phone: <b><?php echo $truck['t_owner_pnumber'] ?></b></p> 
						</li>
       </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Call</button>
      </div>
    </div>
  </div>
</div>
</section>


































 <?php 
include "includes/footer.php";
  ?>