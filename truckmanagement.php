<?php
session_start();
if (empty($_SESSION['uname'])) {
	header("Location: login.php");
}else{
	require('users.php');
	$obj= new User;
	$id = $obj->getUser($_SESSION['uname']);
	echo $id;
	include('trucky.php');
	$obj1 = new Trucky;
	$output = $obj1->getOwnertrucks($_SESSION['id']);

}

require('includes/header.php');
 ?>
<!--truckmangement Header-->
<section class="truckmangement-header  listing_page">
  <div class="container">
    <div class="truckmangement-header_wrap">
      <div class="truckmangement-heading">
        <h1>Manage Your Trucks</h1>
      </div>
      <ul class="coustom-breadcrumb">
        <li><a href="index.php">Home</a></li>
        <li>Truck Management</li>
      </ul>
    </div>
  </div>
</section>
<!-- /truckmangement Header--> 

	<section>
	<div class="container">
		<div class="row mt">
      <?php
      require('includes/dashboard-sidebar.php');
       ?>

				<div class="col-md-10 mb-2">
					<div class="ownertruck">
						<div class="post">
							<?php 
                            if (isset($_GET['delete'])) {
                                echo "<h4 class='alert alert-info'>". $_GET['del']. "</h4>";
                            }
                             if (isset($_GET['mg'])) {
                                echo "<h4 class='alert alert-info'>". $_GET['mg']. "</h4>";
                            }
                            ?>
<?php
if(isset($_GET['mssg'])) {
	echo "<h2 class='alert alert-danger text-center'>". $_GET['mssg'] ."</h2>";
}?>
<?php
if(isset($_GET['result'])) {
	echo "<h2 class='alert alert-success text-center'>". $_GET['result'] ."</h2>";
}

?>

							<button class="btn btn-success"><a href="addtruck.php" style="color:white;"> Add Truck</a></button>
						</div>
						<table class="table table-striped">
							<thead>
								<tr>
									

									<th>Image</th>
									<th>Truck Name</th>
									<th>Truck Type</th>
									<th>Description</th>
									<th>Category</th>
									<th>Status</th>
									<th>Plate Number</th>
									<th>Cross Country</th>
									<th>Date Posted</th>
									<th>Updated</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php

foreach($output as $truck) {



								?>
								<tr>

									<td><img src="images/trucks/<?php echo $truck['image_name'] ?>" alt="truck" ></td>
									<td><?php echo $truck['t_truck_make'] ?></td>
									<td><?php echo $truck['t_type_name'] ?></td>  
									<td><?php echo $truck['truck_overview']?></td>
									<td><?php echo $truck['t_cat_name'] ?></td>
									<td><?php echo $truck['t_status'] ?></td>
									<td><?php echo $truck['t_number'] ?></td>
									<td><?php echo $truck['t_cross_country'] ?></td>
									<td><?php echo date('F j, Y, g:i a', strtotime($truck['date_posted']))?></td>
									<td><?php echo date('F j, Y, g:i a', strtotime($truck['updatedon']))?></td>
									<td> <?php echo "<div class='btn-group'>"?>
										<form action="edittruck.php" method="POST">
											<input type="hidden" name='edit_id' value="<?php echo $truck['t_trucks_id']?>">
											<button type="submit" class="btn btn-success" name="edit_data">Edit</button>
										</form>
										<!-- <a class='btn btn-warning' href='?id=' >Edit</a> -->

										<a class='btn btn-danger' href='delete.php?id=<?php echo $truck['t_trucks_id']?>' name='delete' onclick="return confirm('Do you want to delete')">Delete</a>
									<?php echo "</div>"?>

									</td>
								</tr>

								<?php
								}

								?>
							</tbody>
						</table>
						</div>
	</div>
 </div>
</div>
</section>

<?php
require('includes/footer.php');
?>
