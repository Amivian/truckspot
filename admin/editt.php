<?php
include('admin.php');

if(isset($_POST['cat_btn'])) {
$msg =" ";
  $cat = $_POST['cat'];
  $id = $_POST['edit_id'];

  $obj = new Admin;
  $edited = $obj->editCat($cat,$id);

if($edited === TRUE) {
  $msg = "Category updated successfully";
    header("Location: managecategory.php?result=".$msg);
  exit();
}
  $msg = "category not updated";
    header("Location: editcat.php?result=".$msg);
  exit();
}



?>
