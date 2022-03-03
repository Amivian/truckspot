<?php
include('admin.php');
$res=" ";
if(isset($_POST['brand_btn'])) {

  $make = $_POST['make'];
  $id = $_POST['edit_id'];

  $obj = new Admin;
  $edited = $obj->editBrand($make,$id);

if($edited === TRUE) {
  $res = "Make updated successfully";
    header("Location: managebrands.php?result=".$res);
  exit();
}
  $res = "Make not updated";
    header("Location: editbrands.php?result=".$res);
  exit();
}



?>
