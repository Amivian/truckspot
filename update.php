<?php
session_start();
include('users.php');
$obj = new User;

if (isset($_POST['update'])){
	$id = $_POST['owner_id'];
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$pwd = $_POST['pwd'];
	$cpwd = $_POST['cpwd'];
	$phone = $_POST['number'];
	$tstate = $_POST['state'];
  $tcity = $_POST['city'];
  $shopname = $_POST['shop'];
  $pix = $_FILES['pix'];
   $sub = $_POST['sub'];

// echo "<pre>";
// print_r($_POST);print_r($_FILES);
// echo "</pre>";

$output=$obj->updateUser($id,$fname,$lname,$pwd,$phone,$tstate, $tcity, $shopname,$pix,$sub);
if($output){
	$msg = "Profile Updated Successfully";
	header("Location:profile.php?msg=". $msg);	
}else{
	$msg ="OOps!! Update Failed, Try again";
	header("Location:editprofile.php?msg=". $msg);
}

	

}



 ?>



