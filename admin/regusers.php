<?php
session_start();
require("../users.php");
$obj = new User;
if (!isset($_SESSION['uname'])) {
header('location:admin.php');
}
include ('admin.php');
$obj1= new Admin;
$k = $obj->getUser($_SESSION['id']);
$output = $obj1->getRegUsers();
// $users= $obj->regUsersCount();
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
                            
                            <h2 class="main-title">Registered Users</h2>
                            <div class="card">
                                <div class="card-heading">Reg Users</div>
                                <div class="card-body">
                                    <table id="users" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
                                        <thead>
                                                    <?php
if(isset($_GET['mssg'])) {
    echo "<h2 class='alert alert-danger text-center color-white'>". $_GET['mssg'] ."</h2>";
}

?>

                                            <tr>
                                                <th>#</th>
                                                <th> Image</th>
                                                <th> Name</th>
                                                <th> Username</th>
                                                <th>Email </th>
                                                <th>Company Name</th>
                                                <th>Contact no</th>
                                                <th>Plan</th>
                                                <th>State</th>
                                                <th>City</th>
                                                <th>Reg Date</th>
                                                <th>Action</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                <?php
                                                $count= 1;

foreach($output as $user) {



                                ?>
                                <tr>
                                    <td><?php echo $count ?></td>
                                    <td><img src="../images/logo/<?php echo $user['owner_pix'] ?>" width="50" alt="<?php echo ucfirst($user['t_owner_uname']) ?>"></td>
                                    <td>
                                        <span><?php echo ucfirst($user['t_owner_fname']) ?> </span> &nbsp;
                                        <span><?php echo ucfirst($user['t_owner_lname']) ?></span> </td> 
                                    <td><?php echo ucfirst($user['t_owner_uname']) ?></td>
                                     <td><?php echo $user['t_owner_email'] ?></td>
                                    <td><?php echo ucfirst($user['companyname']) ?></td>
                                    <td><?php echo $user['t_owner_pnumber'] ?></td>
                                    <td><?php echo $user['plan'] ?></td>
                                    <td><?php echo $user['t_states_name'] ?></td>
                                    <td><?php echo $user['t_city_name'] ?></td>
                                    <td><?php echo $user['datereg'] ?></td>
                                    <td> <?php echo "<div class='btn-group'>"?>
                                        <a class='btn btn-warning' href='../editprofile.php?id=<?php echo $user['t_owner_id']?>' name='edit'>Edit</a>
                                        <a class='btn btn-danger' href='deleteuser.php?id=<?php echo $user['t_owner_id']?>' name='delete'  onclick="return confirm('You are about to delete this record.');">Delete</a>
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