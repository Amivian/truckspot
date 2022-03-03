<?php
session_start();
require("../users.php");
require"../trucky.php";
$obj = new User;
include('admin.php');
$obj1= new Admin;
if (!isset($_SESSION['uname'])) {
header('location:admin.php');
}
$k = $obj->getUser($_SESSION['id']);
$obj2 = new Trucky;
    if(isset($_POST['edit_data'])) {
    $id= $_POST['edit_id'];
    $truck = $obj2->showTruckdetails($id);
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
                            
                            <h2 class="main-title">Edit Truck</h2>
                            <div class="card">
                                <div class="card-heading">Truck Details</div>
                                <!--   edit details -->
                                <div class="card-body">
                                     <?php
if(isset($_GET['result'])) {
    echo "<h2 class='alert alert-danger text-center' color:white'>". $_GET['result'] ."</h2>";
}
?>
       
            <div class="row">
                <div class="col-md-3">
                    <div id="note"></div>
                    <form action="edittruck.php" method="POST" style="margin-left:5px; padding:5px;" enctype="multipart/form-data">
                        <p id='chose'></p>
                        <input type="hidden" name="edit_id" value="<?php echo $id ?>">
                      <input type="text" name="tid" class="d-none" value="<?php echo $owner_uname; ?>">

                    
                        <div class="form-group mb-2">
                            <label for=""><b>Truck Name:</b></label>
                            <?php 
                            $obj2->getMake();
                             ?>
                        </div>
                        <div class="form-group mb-2">
                            <label for=""><b>Truck Type:</b></label>
                            <?php 
                            $obj2->getType();
                             ?>
                        </div>
                        <div class="form-group mb-2">
                        <label for=""><b>Status:</b></label>
                        <?php 
                            $obj2->statusInfo();
                             ?>
                     </div>
                     <div class="form-group mb-2">
                        <label for=""><b>Cross Country:</b></label>
                        <?php 
                        $obj2->crossCountry();
                         ?>
                     </div>
                 </div>
                 <div class="col-md-5 my-4">
                     <div class="form-group">
                        <label for=""><b>Category:</b></label>
                            <?php 
                            $obj2->getcat();

                             ?>
                     </div>
                     <!--  <div class="form-group">
                        <label for=""><b>State:</b></label>
                        <?php
                                //calling the function
                                $obj->get_state();
                                ?>
                     </div>

                     <div class="form-group">
                        <label for=""><b>City:</b></label>
                         <div id="citi" name="city"></div>
                        
                     </div> -->
                        <div class="form-group mb-2">
                        <label for=""><b>Truck Description:</b> </label>
                        <textarea id="" cols="30" rows="6" name="tdescription" class="form-control"></textarea>
                    </div>
                        </div>
                        <div class="col-md-3 my-4">
                     <div class="form-group mb-2">
                        <label for=""><b>Plate Number:</b></label>
                        <input type="text" name="plate" class="form-control">
                     </div>
                    
                     <div class="form-group mb-2">
                        <label for="Image"><b>Truck Image:</b></label><br>
                          <input type="file" name="pix" class="file_input" id="pix" value="">
                          <div>
                        
                    <div class="mt-2">
                <button class="btn btn-sm btn-danger" type="submit" name="cancle" id="btn">Cancle</button>  
                <button class="btn btn-sm btn-primary" type="submit" name="edit" id="btn">Update</button>
                    </div>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </section>
</div>
                            
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
</div>
    

                        <!-- <script type="text/javascript" src='./bootstrap/js/jquery-3.6.0.js'></script> -->
<!--     <script type="text/javascript"> --><!-- 
$(document).ready(function(){
                $('#allstate').change(function(){
                    var stateid = document.getElementById('allstate').value;
                //     var test = "t_states_id=" +stateid;
                
                //     $( -->'<!-- #citi').load('../getcity.php', test);
                // })

                // $('#allstate').change(function(){
                //     var pick= $('#allsate').val();
                //     var data ="put=" +pick;
                //         $.ajax({
                //         url: '../getcity.php',
                //         data: data,
                //         type: 'post',
                //         dataType:'json',
                //         success: function(msg){
                //                 setTimeout(function(){
                //                     $('#chose').html(msg.message);
                                    // $('#btn').html('Register');
                    
                                }, 10);

                            },
                        error: function(err){ -->
                             <!--    console.log(err); --><!-- 
                        },
                        })
                })

                                $('#btn').click(function(){
                    // $('#note').html('<h2>Button Selected</h2>');
                })
        })

                            
    </script>
 -->
</body>
</html>