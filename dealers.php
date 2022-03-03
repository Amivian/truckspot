	<?php

include "includes/header.php";

include "users.php";

$obj= new User;
$owner=$obj->showOwner();

// echo "<pre>";
// print_r($owner);
// echo "</pre>";
 ?>

<section class="mt500">
 <div class="container">
 	<div class="row">
 		<div class="col-md-6">
 			<div>
                    <ul class="list-item">
                       <li class="list-item">
                            <span> Name: <?php echo  ucfirst($owner['t_owner_fname'])?></span> 
                            <span><?php echo  ucfirst($owner['t_owner_lname'])?></span> 
                        </li>
						<li class="list-item">
							<span> Email: <?php echo ucfirst($owner['t_owner_email']) ?></span> 
						</li>
						<li class="list-item">
							<span> Status: <?php echo ucfirst($owner['status']) ?></span> 
						</li>
					  </ul>
                            <a href="#" class="btn btn-danger">View Trucks</a>
                        </div>
                        </div>
 		</div>
 	</div>
</section>


		
	<?php

include "includes/footer.php";
		?>
