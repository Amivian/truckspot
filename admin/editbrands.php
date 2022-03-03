<?php
session_start();
require("../users.php");
include'../trucky.php';
$obj = new User;
include('admin.php');
$obj1= new Admin;
if (!isset($_SESSION['uname'])) {
header('location:admin.php');
}
$k = $obj->getUser($_SESSION['id']);


if(isset($_POST['edit_data'])) {
    $id= $_POST['edit_id'];
}
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

                            
                            <h2 class="main-title">Edit Truck Make</h2>
                            <div class="card">
                                <div class="card-heading">Truck Details</div>
                                <!--   edit details -->
                                <div class="card-body">
                             <form method="POST" class="form-horizontal" action="edit.php">
                                <div>
                                <input type="hidden" name="edit_id" value="<?php echo $id ?>">
                                <label for="">Edit Make:</label>
                                <input type="text" name="make">
                                <button type="submit" class="btn btn-sm btn-danger" name="brand_btn">update</button>
                            </div>
				            </form>
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