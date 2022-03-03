<?php
session_start();

include('users.php');

if(isset($_POST['login'])) {
	$email = $_POST['email'];
$uname = $_POST['email'];
$pwd = $_POST['pwd'];

// print_r($_POST);

$objlog = new User;
$output = $objlog->loginUser($email,$uname,$pwd);
if ($output) {
	header("Location: profile.php");

}else{
	$mg="<div class:'alert alert-info'>Invalid Login Details</div>";
	header("Location: login.php?msg=". $mg);
}
}




 ?>
