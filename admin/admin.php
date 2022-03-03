<?php
class Admin{
	public $con;
	public function __construct(){
		$this->con = new mysqli('localhost', 'root', '', 'truckyapp');
	}

public function regUsersCount(){
	$sql= "SELECT COUNT(t_owner_id) FROM t_owner";
	$result= $this->con->query($sql);
	// die($sql);
	$row= mysqli_fetch_row($result);
	return $row[0];
}  

public function truckCount(){
	$sql= "SELECT COUNT(t_trucks_id) FROM t_trucks";
	$result= $this->con->query($sql);
	// die($sql);
	$row= mysqli_fetch_row($result);
	return $row[0];
}

public function truckMakeCount(){
	$sql= "SELECT COUNT(t_truck_make_id) FROM t_truck_make";
	$result= $this->con->query($sql);
	// die($sql);
	$row= mysqli_fetch_row($result);
	return $row[0];
}

public function catCount(){
	$sql= "SELECT COUNT(t_cat_id) FROM truck_cat";
	$result= $this->con->query($sql);
	// die($sql);
	$row= mysqli_fetch_row($result);
	return $row[0];
}

public function subscriptionCount(){
	$sql= "SELECT COUNT(subscription_id) FROM subscription";
	$result= $this->con->query($sql);
	// die($sql);
	$row= mysqli_fetch_row($result);
	return $row[0];
}

public function getRegUsers(){
 $sql="SELECT * FROM t_owner JOIN t_states ON t_owner.t_states_id = t_states.t_states_id JOIN t_city ON t_owner.t_city_id = t_city.t_city_id JOIN subscription ON t_owner.subscription_id=subscription.subscription_id";
      $result= $this->con->query($sql);
      $data = [];
    while($row = $result->fetch_assoc()) {
    	$data[] = $row;
}
return $data;
}

public function deleteUser($id){
    $sql= "DELETE FROM t_owner WHERE t_owner_id = '$id'";
    $result= $this->con->query($sql);
    // die($sql);
   if($result){
   	$msg= "Record deleted successfully";
   	header("location: reguers.php?msg=".$msg);
   }else{
   	$mssg ="Record Not Deleted, Try Again";
   	header("location: regusers.php?mssg=".$mssg);
   }
}

public function getAllTrucks(){
 $sql="SELECT * FROM t_trucks JOIN t_owner ON t_trucks.t_owner_id = t_owner.t_owner_id JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id JOIN t_status ON t_trucks.t_status_id = t_status.t_status_id JOIN t_states ON t_trucks.t_states_id = t_states.t_states_id JOIN t_city ON t_trucks.t_city_id = t_city.t_city_id   JOIN t_truck_type ON t_trucks.t_type_id = t_truck_type.t_type_id JOIN  t_cross ON t_trucks.t_cross_id = t_cross.t_cross_id LEFT JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id";
      $result= $this->con->query($sql);
      $data = [];
    while($row = $result->fetch_assoc()) {
    	$data[] = $row;
} 
return $data;
}

public function deleteTruck($id){
    $sql= "DELETE FROM t_trucks WHERE t_trucks_id = '$id'";
    $result= $this->con->query($sql);
    // die($sql);
   if($result){
   	$msg= "Record deleted successfully";
   	header("location: managetrucks.php?msg=".$msg);
   }else{
   	$mssg ="Record Not Deleted, Try Again";
   	header("location: managetrucks.php?mssg=".$mssg);
   }
}

public function getAllMake(){
 $sql="SELECT * FROM t_truck_make";
      $result= $this->con->query($sql);
      $data = [];
    while($row = $result->fetch_assoc()) {
    	$data[] = $row;
}
return $data;
}

public function editBrand($make,$id){
	$sql="UPDATE t_truck_make SET t_truck_make='$make' WHERE t_truck_make.t_truck_make_id='$id'";
   // die($sql);
$result = $this->con->query($sql);
if($result === true) {	
$res= "Brand Update successfully";
header("location: managebrands.php?result=".$res);
}else{	
$rsp="Brand Update successfully";
header("location: editbrands.php?rspult=".$res);
}
return true;
}

public function deleteBrands($id){
 $sql= "DELETE FROM t_truck_make WHERE t_truck_make_id = '$id'";
    $result= $this->con->query($sql);
      if($result){
    $msg= "Record deleted successfully";
    header("location: managebrands.php?msg=".$msg);
   }else{
    $mssg ="Record Not Deleted, Try Again";
    header("location: managebrands.php?mssg=".$mssg);
   }
}

public function getPlans(){
 $sql="SELECT * FROM subscription";
      $result= $this->con->query($sql);
      $data = [];
    while($row = $result->fetch_assoc()) {
    	$data[] = $row;
}
return $data;
}

public function deleteSub($id){
 $sql= "DELETE FROM subscription WHERE subscription_id = '$id'";
    $result= $this->con->query($sql);
    // die($sql);
   if($result === true){
    $msg= "Record deleted successfully";
    header("location: manageplans.php?msg=".$msg);
   }else{
    $msg ="Record Not Deleted, Try Again";
    header("location: manageplans.php?mssg=".$mssg);
   }
}

public function getCategory(){
 $sql="SELECT * FROM truck_cat";
      $result= $this->con->query($sql);
      $data = [];
    while($row = $result->fetch_assoc()) {
    	$data[] = $row;
}
return $data;
}

public function deleteCat($id){
 $sql= "DELETE FROM truck_cat WHERE t_cat_id = '$id'";
    $result= $this->con->query($sql);
    // die($sql);
   if($result == true){
    $msg= "Record deleted successfully";
    header("location: managecategory.php?msg=".$msg);
   }else{
    $mssg ="Record Not Deleted, Try Again";
    header("location: managecategory.php?mssg=".$mssg);
   }
}
public function addBrand($make){
  $sql="INSERT INTO t_truck_make (t_truck_make) VALUES('$make')";
// die($sql);
        $result = $this->con->query($sql);
        if ($result === true) {
          $msg = "Brand added successfully";
    header("Location: managebrands.php?result=".$msg);
}else{
  $msg = "Brand not added";
    header("Location: addbrands.php?result=".$msg);
        }
       return true;
}


public function editTrucks($tname, $ttype, $tnumber, $cross,$tstatus, $tcat, $tdesc, $pix,$id){
    $sql= "UPDATE t_trucks SET t_truck_make_id='$tname', t_type_id='$ttype',t_number='$tnumber',t_cross_id='$cross', t_status_id='$tstatus',t_cat_id='$tcat', truck_overview='$tdesc' WHERE t_trucks.t_trucks_id= '$id' ";
    $result =$this->con->query($sql);
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
        move_uploaded_file($tmp_name, "../images/trucks/$newfilename");
        // $id= $_SESSION['uname'];
        $sql2 = "UPDATE images SET image_name='$newfilename', t_trucks_id='$id'";
        // die($sql2);
        $this->con->query($sql2);
        header('location: truckmanagement.php');
        }else{
            echo "upload failed";
            header('location:edittruck.php?m=upload failed');
        }
        return true;
        }
    }

public function editCat($cat,$id){
  $sql="UPDATE truck_cat SET t_cat_name='$cat' WHERE t_cat_id='$id'";
   // die($sql);
$result = $this->con->query($sql);
if($result === true) { 
$msg= "Category Update successfully";
header("location: managecategory.php?result=".$msg);
}else{  
$rsp="Sorry Failed Update";
header("location: editcat.php?rspult=".$res);
}
return true;
}
public function addCat($cat){
  $sql="INSERT INTO truck_cat (t_cat_name) VALUES('$cat')";
// die($sql);
 $result = $this->con->query($sql);
 if ($result === true) {
 $msg = "Category added successfully";
    header("Location: managecategory.php?result=".$msg);
}else{
  $msg = "Category not added";
    header("Location: addcategory.php?result=".$msg);
}
return true;
}

public function addPlan($plan){
  $sql="INSERT INTO subscription (plan) VALUES('$plan')";
// die($sql);
 $result = $this->con->query($sql);
 if ($result === true) {
 $msg = "Plan added successfully";
    header("Location: manageplans.php?result=".$msg);
}else{
  $msg = "Plan not added";
    header("Location: addplan.php?result=".$msg);
}
return true;
}
public function editPlan($plan,$id){
  $sql="UPDATE subscription SET plan = '$plan' WHERE subscription_id='$id'";
   // die($sql);
$result = $this->con->query($sql);
if($result === true) { 
$msg= "Plan Updated successfully";
header("location: managecplans.php?result=".$msg);
}else{  
$rsp="Sorry Failed to Update";
header("location: editplan.php?rspult=".$res);
}
return true;
}
}
 ?>
