<?php
include('trucky.php');

if(isset($_POST['edit'])) {

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
  $id = $_POST['edit_id'];

  $obj = new Trucky;
  $edited = $obj->editTrucks($tname, $ttype, $tnumber, $cross, $tstatus, $tcat, $tstate, $tcity, $tdesc,$pix,$id);

if($edited=== TRUE) {
  $msg = "Truck updated successfully";
    header("Location: truckmanagement.php?result=".$msg);
  exit();
}
  $mg = "Truck not updated";
    header("Location: edittruck.php?result=".$mg);
  exit();
}



?>
