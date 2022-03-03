<?php
include('users.php');
session_start();
if (isset($_POST['regbtn'])) {
	$fname = htmlentities(strip_tags($_POST['fname']));
	$lname = $_POST['lname'];
	$uname = $_POST['uname'];
	$pwd = $_POST['pwd'];
	$cpwd = $_POST['cpwd'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];
	$tstate = $_POST['state'];
  $tcity = $_POST['city'];
	// $utype = $_POST['user_type'];
$obj = new User;
$output=$obj->registerUser($fname,$lname,$uname,$pwd,$email,$phone,$tstate, $tcity);
if($output){
	$msg = "<div class:'alert alert-info'>Registration Successful Kindly Login to Post a Truck</div>";
	header("Location:login.php?msg=". $msg);	
}else{
	$msg ="<div class:'alert alert-danger>Registration Failed, Try again</div>";
}

	

}



 ?>



