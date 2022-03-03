<?php
class Trucky{
	public $con;
	public function __construct(){
		$this->con = new mysqli('localhost', 'root', '', 'truckyapp');
	}
	 public function getOwnertrucks($id){

        $sql = "SELECT * FROM t_trucks JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id JOIN t_status ON t_trucks.t_status_id = t_status.t_status_id JOIN t_cross ON t_trucks.t_cross_id = t_cross.t_cross_id JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id LEFT JOIN t_truck_type ON t_trucks.t_type_id = t_truck_type.t_type_id WHERE t_trucks.t_owner_id ='$id'";
        // die($sql);
        $result=$this->con->query($sql);
    	$data = [];
    	while($row = $result->fetch_assoc()) {
    		$data[] = $row;
    	}
    	return $data;

    }

	 function addTruck($towner, $tname, $ttype, $tnumber, $cross, $tstatus, $tcat, $tstate, $tcity, $tdesc, $pix){
		$sql = "INSERT INTO t_trucks (t_owner_id, t_truck_make_id, t_type_id, t_number, t_cross_id, t_status_id, t_cat_id, t_states_id, t_city_id, truck_overview ) VALUES('$towner', '$tname', '$ttype', '$tnumber', '$cross', '$tstatus', '$tcat', '$tstate', '$tcity', '$tdesc')";
// die($sql);
        $result = $this->con->query($sql);
        $id = $this->con->insert_id;
        // die($sql);
        if($result) {

            $filename = $pix['name'];
    $tmp_name = $pix['tmp_name'];
    $filetype = $pix['type'];
    $size = $pix['size'];

    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $newfilename = time(). ".$ext";
    if ($ext=='jpg' || $ext=='jpeg' || $ext == 'png') {
        echo "Uploaded successfully";
        move_uploaded_file($tmp_name, "images/trucks/$newfilename");
        // $id= $_SESSION['uname'];
        $sql2 = "INSERT INTO images(image_name, t_trucks_id) VALUES('$newfilename','$id')";
        // die($sql2);
        $this->con->query($sql2);
        // die($sql);
        header('location: truckmanagement.php');
        }else{
            echo "upload failed";
            header('location:addtruck.php?m=upload failed');
        }

		
			return true;
		}


}
    public function showAlltrucks(){
        $sql = "SELECT * FROM t_trucks JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id JOIN t_status ON t_trucks.t_status_id = t_status.t_status_id JOIN t_states ON t_trucks.t_states_id = t_states.t_states_id JOIN t_city ON t_trucks.t_city_id = t_city.t_city_id   JOIN t_truck_type ON t_trucks.t_type_id = t_truck_type.t_type_id JOIN  t_cross ON t_trucks.t_cross_id = t_cross.t_cross_id LEFT JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id";
    	$result = $this->con->query($sql);
    	// die($sql);
    	$data =[];
    	while($row = $result->fetch_assoc()) {
    		$data[] = $row;
    	} 
    	return $data;

    }
     public function showTruckdetails($id){
    	 $sql = "SELECT * FROM t_trucks JOIN t_owner ON t_trucks.t_owner_id = t_owner.t_owner_id JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN t_truck_type ON t_trucks.t_type_id = t_truck_type.t_type_id  JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id JOIN t_status ON t_trucks.t_status_id = t_status.t_status_id JOIN t_cross ON t_trucks.t_cross_id = t_cross.t_cross_id JOIN t_states ON t_trucks.t_states_id = t_states.t_states_id JOIN t_city ON t_trucks.t_city_id = t_city.t_city_id  LEFT JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id WHERE t_trucks.t_trucks_id = '$id'";
         
    	$result = $this->con->query($sql);
       $row = $result->fetch_assoc();
       return $row;
    }

     function getCat($selected=''){
        $m = "SELECT * FROM truck_cat";
       $result = $this->con->query($m);
        echo "<select name='tcat' value='tcat' id='allcat' class='form-control'>";
        echo "<option value=''>Select Category</option>";
        while($data = $result->fetch_assoc()){
            $cat = $data['t_cat_name'];
            $id = $data['t_cat_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$cat</option>";
            }else{
            echo "<option value='$id'>  $cat </option>";
        }
    
    }echo "</select>";
}
  function getMake($selected=''){
        $m = "SELECT * FROM t_truck_make";
       $result = $this->con->query($m);
        echo "<select name='truck_name' value='truck_name' id='allmake' class='form-control'>";
        echo "<option value=''>Select Brand</option>";
        while($data = $result->fetch_assoc()){
            $make = $data['t_truck_make'];
            $id = $data['t_truck_make_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$make</option>";
            }else{
            echo "<option value='$id'>  $make </option>";
        }
    
    }echo "</select>";
}
 function getType($selected=''){
        $m = "SELECT * FROM t_truck_type";
       $result = $this->con->query($m);
        echo "<select name='truck_type' value'truck_type' id='alltype' class='form-control'>";
        echo "<option value=''>Select Type</option>";
        while($data = $result->fetch_assoc()){
            $type = $data['t_type_name'];
            $id = $data['t_type_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$type</option>";
            }else{
            echo "<option value='$id'>  $type </option>";
        }
    
    }echo "</select>";
}
 function statusInfo($selected=''){
        $m = "SELECT * FROM t_status";
       $result = $this->con->query($m);
        echo "<select name='tstatus' id='sat' class='form-control'>";
        echo "<option value=''>Select Status</option>";
        while($data = $result->fetch_assoc()){
            $status = $data['t_status'];
            $id = $data['t_status_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$status</option>";
            }else{
            echo "<option value='$id'>  $status </option>";
        }
    
    }echo "</select>";
}
 function crossCountry($selected=''){
        $m = "SELECT * FROM t_cross";
       $result = $this->con->query($m);
        echo "<select name='cross_country' id='cros' class='form-control'>";
        echo "<option value=''>Select</option>";
        while($data = $result->fetch_assoc()){
            $cross = $data['t_cross_country'];
            $id = $data['t_cross_id'];
            if ($selected == $id) {
                echo "<option value='$id' selected>$cross</option>";
            }else{
             echo "<option value='$id'>  $cross </option>";
        }
    
    }echo "</select>";
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
        echo "Uploaded successfully";
        move_uploaded_file($tmp_name, "images/$newfilename");
        $id= $_SESSION['uname'];
        $sql = "INSERT INTO images(image_content, images_id) VALUES('$newfilename','$id')";
        $this->con->query($sql);
        header('location: truckmanagement.php');
        }else{
            echo "upload failed";
            header('location:addtruck.php?m=upload failed');
        }
    }
    
 public function showImages($id){
        $sql = "SELECT * FROM t_trucks  JOIN images ON t_trucks.images_id=images.images_id WHERE images_id='$id'";
        $result = $this->con->query($sql);
       $row = $result->fetch_assoc();
        return $row;
    }

    public function searchTruck($make, $cat) {
        $sql = " SELECT * FROM t_trucks JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id WHERE t_truck_make.t_truck_make_id LIKE '%$make%' OR truck_cat.t_cat_id LIKE '%$cat%'";
 
        $result = $this->con->query($sql);
        // die($sql);
        $data =[];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        } 
        return $data;
    }

 public function showRecentTrucks(){
        // $sql = "SELECT * FROM t_trucks ORDER BY date_posted DESC";
        $sql = "SELECT * FROM t_trucks JOIN t_truck_make ON t_trucks.t_truck_make_id = t_truck_make.t_truck_make_id JOIN truck_cat ON t_trucks.t_cat_id = truck_cat.t_cat_id JOIN t_status ON t_trucks.t_status_id = t_status.t_status_id  JOIN t_truck_type ON t_trucks.t_type_id = t_truck_type.t_type_id JOIN  t_cross ON t_trucks.t_cross_id = t_cross.t_cross_id LEFT JOIN images ON t_trucks.t_trucks_id = images.t_trucks_id order by date_posted desc limit 4";
        $result = $this->con->query($sql);
        // die($sql);
        $data =[];
        while($row = $result->fetch_assoc()) {
            $data[] = $row;
        } 
        return $data;

     }

public function delete($id){
    $sql= "DELETE FROM t_trucks WHERE t_trucks.t_trucks_id = '$id'";
    $detail = $this->con->query($sql);
    // die($sql);
    if ($detail) {
        $msg= "Truck Record Delete";
        header("location: truckmanagement.php?msg=".$msg);
    }else{
        $mssg= "Error deleting record, try again";
        header("location: truckmanagement.php?mssg=".$mssg);
    }
    
}
public function editTrucks($tname, $ttype, $tnumber, $cross,$tstatus, $tcat, $tstate, $tcity, $tdesc, $pix,$id){
    $sql= "UPDATE t_trucks SET t_truck_make_id='$tname', t_type_id='$ttype',t_number='$tnumber',t_cross_id='$cross', t_status_id='$tstatus',t_cat_id='$tcat', t_states_id='$tstate',t_city_id='$tcity',truck_overview='$tdesc' WHERE t_trucks.t_trucks_id= '$id' ";
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
        move_uploaded_file($tmp_name, "images/trucks/$newfilename");
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

}
?>