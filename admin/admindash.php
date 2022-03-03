
<?php
session_start();
require("../users.php");
$obj = new User;
if (!isset($_SESSION['uname'])) {
header('location:index.php');
}

$k = $obj->getAdmin($_SESSION['id']);
// $users= $obj->regUsersCount();
include('admin.php');
$obj1= new Admin;
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
       <?php   require"includes/sidenar.php" ?>
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-title">Dashboard</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card ">
                                <div class="card-body bg-secondary text-light text-center">
                                    <div class=" h1 "><?php echo $obj1->regUsersCount()?></div>
                                    <div class="card-title text-uppercase">Reg Users</div>
                                </div>
                                <a href="regusers.php" class=" card-footer card-link">Full Detail <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-success text-light text-center">
                                    <div class=" h1 "><?php echo $obj1->truckCount()?></div>
                                    <div class="card-title text-uppercase">Total Trucks</div>
                                </div>
                                <a href="managetrucks.php" class="card-link card-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-info text-light  text-center">
                                    <div class=" h1 "><?php echo $obj1->truckMakeCount()?></div>
                                    <div class="card-title text-uppercase">Listed Brands</div>
                                </div>
                                <a href="managebrands.php" class="card-link card-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body bg-warning text-light  text-center">
                                    <div class=" h1 "><?php echo $obj1->catCount()?></div>
                                    <div class="card-title text-uppercase">Listed Truck Category</div>
                                </div>
                                <a href="managecategory.php" class="card-link card-footer text-center">Full Detail &nbsp; <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-3">
                <div class="col-md-12">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card">
                                        <div class="card-body bg-danger text-light text-center">
                                            <div class=" h1 "><?php echo $obj1->subscriptionCount()?></div>
                                            <div class="card-title text-uppercase">Avaliable Plans</div>
                                        </div>
                                        <a href="manageplans.php" class="card-link card-footer">Full Detail <i class="fa fa-arrow-right"></i></a>
                                    </div>
                                </div>
                              
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