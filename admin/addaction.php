<?php
include('admin.php');
$msg='';
if(isset($_POST['brand_btn'])) {

  $make = $_POST['brand'];

  $obj = new Admin;
  $output = $obj->addBrand($make);

//   echo "<pre>";
// print_r($_POST);
//     echo "</pre>";

if($output) {
  $msg = "Brand added successfully";
    header("Location: managebrands.php?result=".$msg);
    // echo $msg;
  exit();
}else{
  $msg = "Brand not added";
    header("Location: addbrands.php?result=".$msg);
    // echo $msg;
  exit();
}
}


?>
