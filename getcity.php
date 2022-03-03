<?php 
require('users.php');
$obj= new User;
$m = $_GET['t_states_id'];
$obj ->get_city($m);
 ?>