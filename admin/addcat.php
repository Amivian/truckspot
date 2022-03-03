<?php
include('admin.php');
$msg='';
if(isset($_POST['cat_btn'])) {

  $cat = $_POST['cat'];

  $obj = new Admin;
  $output = $obj->addCat($cat);

if($output) {
  $msg = "Category added successfully";
    header("Location: managecategory.php?result=".$msg);
    // echo $msg;
  exit();
}else{
  $msg = "Category not added";
    header("Location: addcategory.php?result=".$msg);
    // echo $msg;
  exit();
}
}


?>
