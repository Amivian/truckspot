<?php 
require('trucky.php');
$id = $_GET['id'];
$obj = new Trucky;
$output = $obj->delete($id);

$mg='';
if(isset($_GET['delete'])) {
if($output) {
  $mg = "Truck deleted Successfully";
    header("Location: truckmanagement.php?m=".$mg);
exit();
}else{
  $mg = "Truck not deleted";
    header("Location: truckmanagement.php?m=".$mg);
    // echo $msg;
  exit();
}
}

 ?>