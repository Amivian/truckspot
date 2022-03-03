<?php
include('admin.php');

if(isset($_POST['plan_btn'])) {
$msg =" ";
  $plan = $_POST['plan'];
  $id = $_POST['edit_id'];

  $obj = new Admin;
  $edited = $obj->editPlan($plan,$id);

if($edited === TRUE) {
  $msg = "Category updated successfully";
    header("Location: manageplans.php?result=".$msg);
  exit();
}
  $msg = "category not updated";
    header("Location: editplan.php?result=".$msg);
  exit();
}



?>
