<?php
session_start();
include('admin.php');
$obj1= new Admin;
require("../users.php");
$obj = new User;
if (!isset($_SESSION['uname'])) {
header('location:admin.php');
}
$k = $obj->getUser($_SESSION['id']);
$output = $obj1->getCategory();
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
                            
                            <h2 class="main-title">Truck Category Management</h2>

                            <button class="btn btn-success"><a href="addcategory.php" style="color:white;text-decoration:none"> Add Truck Category</a></button>
                            <div class="card">
                                <div class="card-heading">All Category</div>
                                <div class="card-body">

                                    <table id="brands" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                                    <?php

if(isset($_GET['result'])) {
    echo "<h2 class='alert alert-success text-center color-white'>". $_GET['result'] ."</h2>";
}

if(isset($_GET['msg'])) {
    echo "<h2 class='alert alert-danger text-center color-white'>". $_GET['msg'] ."</h2>";
}

?>

                                            <tr>
                                                <th>#</th>
                                                <th>Category</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $count= 1;

foreach($output as $make) {



                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
									<td><?php echo $make['t_cat_name'] ?></td>
                                    <td> <?php echo "<div class='btn-group'>"?>
                                      <form action="editcat.php" method="POST">
                                            <input type="hidden" name='edit_id' value="<?php echo $make['t_cat_id']?>">
                                            <button type="submit" class="btn btn-warning" name="edit_data">Edit</button>
                                        </form>
                                     
                                        <a class='btn btn-danger' href='deletecat.php?id=<?php echo $make['t_cat_id']?>' name='delete'  onclick="return confirm('You are about to delete this record.');">Delete</a>
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