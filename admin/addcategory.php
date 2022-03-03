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
                            
                            <h2 class="main-title">Add Category</h2>
                            <div class="card">
                                <div class="card-heading">Add Category</div>
                                <div class="card-body">

                                                    <?php
if(isset($_GET['mssg'])) {
    echo "<h2 class='alert alert-danger text-center color-white'>". $_GET['mssg'] ."</h2>";
}
if(isset($_GET['msg'])) {
    echo "<h2 class='alert alert-success text-center color-white'>". $_GET['msg'] ."</h2>";
}

?>								<form action="addcat.php" method="post">

								<div>
								<label for="">Add Category:</label>
								<input type="text" name="cat">
								<button type="submit" class="btn btn-sm btn-danger" name="cat_btn">Add</button>
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