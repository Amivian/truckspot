<?php
include('trucky.php');
$msg='';
if(isset($_POST['add_truck'])) {

  $towner = $_POST['tid'];
  $tname = $_POST['truck_name'];
  $ttype = $_POST['truck_type'];
  $tnumber = $_POST['plate'];
  $pix = $_FILES['pix'];
  $cross = $_POST['cross_country'];
  $tstatus = $_POST['tstatus'];
  $tcat = $_POST['tcat'];
  $tstate = $_POST['state'];
  $tcity = $_POST['city'];
  $tdesc = $_POST['tdescription'];


  $obj = new Trucky;
  $output = $obj->addTruck($towner, $tname, $ttype, $tnumber, $cross, $tstatus, $tcat, $tstate, $tcity, $tdesc, $pix);

//   echo "<pre>";
// print_r($_POST);
//     echo "</pre>";

if($output) {
  $msg = "Truck added successfully";
    header("Location: truckmanagement.php?result=".$msg);
    // echo $msg;
  exit();
}else{
  $msg = "Truck not added";
    header("Location: addtruck.php?result=".$msg);
    // echo $msg;
  exit();
}
}


?>
