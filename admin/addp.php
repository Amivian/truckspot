<?php
include('admin.php');
$msg='';
if(isset($_POST['plan_btn'])) {

  $plan = $_POST['plan'];

  $obj = new Admin;
  $output = $obj->addPlan($plan);

if($output) {
  $msg = "Plan added successfully";
    header("Location: manageplans.php?result=".$msg);
    // echo $msg;
  exit();
}else{
  $msg = "Plan not added";
    header("Location: addplan.php?result=".$msg);
    // echo $msg;
  exit();
}
}


?>
