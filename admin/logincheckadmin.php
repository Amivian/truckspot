<?php
require("../users.php");
session_start();
$obj=new User;
if(isset($_POST['submit'])){
	$username = $_POST['email'];
	$password = $_POST['pass'];

$output=$obj->add_admin($username,$password);
	

}


?>