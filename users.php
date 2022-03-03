<?php
class User{
	public $con;
	public function __construct(){
		$this->con = new mysqli('localhost', 'root', '', 'truckyapp');
	}

	
	public function registerUser($fname,$lname,$uname,$pwd,$email,$phone,$tstate,$tcity){
		$pwd= md5($pwd);
		$sql= "INSERT INTO t_owner(t_owner_fname,t_owner_lname,t_owner_uname,t_owner_pword,t_owner_email,t_owner_pnumber,t_states_id, t_city_id) VALUES('$fname','$lname','$uname','$pwd','$email','$phone','$tstate', '$tcity')";
		// die($sql);
		$result = $this->con->query($sql);
		return true;
}
	

	public function loginUser($email,$uname,$pwd){
		if($pwd == true){
		$pwd = md5($pwd);
		$sql="SELECT * FROM t_owner WHERE (t_owner_uname = '$uname' OR t_owner_email = '$email') AND t_owner_pword = '$pwd'";
// die($sql);
		$result = $this->con->query($sql);
		// die($sql);
		if ($result->num_rows > 0) {
			$rows = $result->fetch_array();
			 if(is_array($rows)) {
			if(!isset($_SESSION)){
				session_start();
			}
$_SESSION['id'] = $rows['t_owner_id'];
				$_SESSION['fname'] = $rows['t_owner_fname'];
				$_SESSION['lname'] = $rows['t_owner_lname'];
				$_SESSION['uname'] = $rows['t_owner_uname'];
				$_SESSION['email'] = $rows['t_owner_email'];
				// $_SESSION['type'] = $rows['t_user_type'];


				return true;
				}
			}

	}else{
		echo "Invalid Password";
		header('location:login.php?m=Invalid Password');
	}
}



function add_admin($username,$password){
          $password = md5($password);
    $sql = " SELECT * FROM t_owner WHERE t_owner_email='$username' AND t_owner_pword='$password' AND role = 'Admin'";
  $result= $this->con->query($sql);
    if($result->num_rows  > 0){
    	$rows = $result->fetch_array();
      echo "login successful";
      session_start();
      $_SESSION['id'] = $rows['t_owner_id'];
				$_SESSION['fname'] = $rows['t_owner_fname'];
				$_SESSION['lname'] = $rows['t_owner_lname'];
				$_SESSION['uname'] = $rows['t_owner_uname'];
				$_SESSION['email'] = $rows['t_owner_email'];
      header('location:../admin/admindash.php');
return true;

    }else{
      echo "login failed";
      header('location:../admin/index.php');
    }
    }


 function getSub($selected=''){
	 	$m = "SELECT * FROM subscription";
	   $result = $this->con->query($m);
		echo "<select name='sub' id='subpans' class='form-control'>";
		echo "<option value=''>Select Plan</option>";
		while($data = $result->fetch_assoc()){
			$sub= $data['plan'];
			$id = $data['subscription_id'];
			if ($selected == $id) {
				echo "<option value='$id' selected>$sub</option>";
			}else{
			echo "<option value='$id'>  $sub </option>";
		}
	
	}echo "</select>";
}

 function get_state($selected=''){
	 	$m = "SELECT * FROM t_states";
	   $result = $this->con->query($m);
		echo "<select name='state' id='allstate' class='form-control'>";
		echo "<option value=''>Select State</option>";
		while($data = $result->fetch_assoc()){
			$state = $data['t_states_name'];
			$id = $data['t_states_id'];
			if ($selected == $id) {
				echo "<option value='$id' selected>$state</option>";
			}else{
			echo "<option value='$id'>  $state </option>";
		}
	
	}echo "</select>";
}
function get_city($id){
	 	$k = "SELECT * FROM t_city WHERE t_states_id='$id'";
	   $result = $this->con->query($k);
		echo "<select name='city' id='citi' class='form-control'>";
		while($data = $result->fetch_assoc()){
			$lga= $data['t_city_name'];
			$id = $data['t_city_id'];
		echo "<option value='$id'> $lga </option>";
	}echo "</select>";
}

function getUser($id){
	    		$sql = "SELECT * FROM  t_owner JOIN t_states ON t_owner.t_states_id = t_states.t_states_id JOIN t_city ON t_owner.t_city_id = t_city.t_city_id WHERE t_owner_id='$id'";
	    		$result = $this->con->query($sql);
	    		$row = $result->fetch_assoc();
	    		
	    		return $row;
	    	}

function getAdmin($id){
	    		$sql = "SELECT * FROM  t_owner JOIN t_states ON t_owner.t_states_id = t_states.t_states_id JOIN t_city ON t_owner.t_city_id = t_city.t_city_id WHERE t_owner_id='$id' AND role ='admin'";
	    		// die($sql);
	    		$result = $this->con->query($sql);
	    		$row = $result->fetch_assoc();
	    		
	    		return $row;
	    	}

function uploadpix($pic_array){
	$filename = $pic_array['name'];
	$tmp_name = $pic_array['tmp_name'];
	$filetype = $pic_array['type'];
	$size = $pic_array['size'];

	$ext = pathinfo($filename, PATHINFO_EXTENSION);
	$newfilename = time(). ".$ext";
	// echo $ext;
	// die();
	if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png') {
		move_uploaded_file($tmp_name, "images/logo/$newfilename");
		$id= $_SESSION['id'];
		$sql = "UPDATE t_owner SET owner_pix = '$newfilename' WHERE t_owner_id='$id'";
		// die($sql);
		$result=$this->con->query($sql);
		if ($result) {
			$msg="Logo Uploaded successfully";
		header('location:profile.php?m='. $msg);
		}else{	
		$msg="Logo Upload Failed";
		header('location:profile.php?m='. $msg);
		}
	}
}




public function showOwner(){
	$sql = "SELECT * FROM t_owner JOIN t_trucks ON t_trucks.t_owner_id = t_owner.t_owner_id";
	$result = $this->con->query($sql);
	$data=[];
	while($row = $result->fetch_assoc()){
$data[]=$row;
}
return $data;
}


 public function updateUser($id,$fname,$lname,$pwd,$phone,$tstate, $tcity, $shopname,$pix,$sub){
 	$pwd = md5('pwd');
	$sql="UPDATE t_owner SET t_owner_fname='$fname', t_owner_lname='$lname',t_owner_pword='$pwd', t_owner_pnumber='$phone',t_states_id='$tstate', t_city_id='$tcity',companyname='$shopname',subscription_id='$sub' WHERE t_owner_id = '$id' ";
	$result= $this->con->query($sql);
	// die($sql);
	   if($result === true) {
    $filename = $pix['name'];
    $tmp_name = $pix['tmp_name'];
    $filetype = $pix['type'];
    $size = $pix['size'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION); 
       $newfilename = time(). ".$ext";
    if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png') {
        echo "Uploaded successfully";
        move_uploaded_file($tmp_name, "images/logo/$newfilename"); 
       $sql2 = "UPDATE t_owner SET owner_pix = '$newfilename' WHERE t_owner_id='$id'";
        // die($sql2);
        $this->con->query($sql2);  
        $msg = " Record Updated";
        header("location: profile.php?msg=".$msg);
        }else{
        $mssg= "Error updating record, try again";
        header("location: editprofile.php?mssg=".$mssg);
    }
return true;
   	}
  }
}
?>
