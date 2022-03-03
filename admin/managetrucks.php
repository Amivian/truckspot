<?php
session_start();
require("../users.php");
$obj = new User;
if (!isset($_SESSION['uname'])) {
header('location:admin.php');
}

include('admin.php');
$obj1= new Admin;
$k = $obj->getUser($_SESSION['id']);
$output = $obj1->getAllTrucks();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Truck Rental | Admin Dashboard</title>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css?version=<?php echo time();?>">
        <link rel="stylesheet" href="css/styles.css?version=<?php echo time();?>">
        <link rel="stylesheet" type="text/css" href="bootstrap/fontawesome/css/all.min.css?version=<?php echo time(); ?>">
    </head>
    <body>
       
        <?php include "includes/header.php " ?>
        <div class="ts-main-content">
            <?php   require"includes/sidenar.php" ?>
            <div class="content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            
                            <h2 class="main-title">Truck Management</h2>
                            
                            <button class="btn btn-success"><a href="../addtruck.php" style="color:white;text-decoration:none"> Add Truck</a></button>
                            <div class="card">
                                <div class="card-heading">All Trucks</div>
                                <div class="card-body">
                                    <table id="users" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                                    <?php
if(isset($_GET['result'])) {
    echo "<h2 class='alert alert-danger text-center color-white'>". $_GET['result'] ."</h2>";
}
if(isset($_GET['result'])) {
    echo "<h2 class='alert alert-success text-center color-white'>". $_GET['result'] ."</h2>";
}

?>

                                            <tr>
                                                <th>#</th>
                                                <th>Image</th>
												<th>Truck Name</th>
												<th>Truck Type</th>
												<th>Category</th>
												<th>Status</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Truck Owner</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $count= 1;

foreach($output as $truck) {



                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
									<td><img src="../images/trucks/<?php echo $truck['image_name'] ?>" alt="truck" class="w-50" ></td>
									<td><?php echo $truck['t_truck_make'] ?></td>
									<td><?php echo $truck['t_type_name'] ?></td>
									<td><?php echo $truck['t_cat_name'] ?></td>
									<td><?php echo $truck['t_status'] ?></td>
                                    <td><?php echo $truck['t_states_name'] ?></td>
                                    <td><?php echo $truck['t_city_name'] ?></td>
                                    <td><?php echo ucfirst($truck['t_owner_uname']) ?></td>
                                    <td> <?php echo "<div class='btn-group'>"?>
                                    <form action="adminedittruck.php" method="POST">
                                            <input type="hidden" name='edit_id' value="<?php echo $truck['t_trucks_id']?>">
                                            <button type="submit" class="btn btn-warning" name="edit_data">Edit</button>
                                        </form>
                                     
                                        <a class='btn btn-danger' href='admindeletetruck.php?id=<?php echo $truck['t_trucks_id']?>' name='delete'  onclick="return confirm('You are about to delete this record.');">Delete</a>
                                    <?php echo "</div>"?>
                                </td>
                                </tr>

                                <?php
                              $count++;  }

                                ?>



                                        </tbody>
                                    </table>
                                    
                                    
                                    
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>