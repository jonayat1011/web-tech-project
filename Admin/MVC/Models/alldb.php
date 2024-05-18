<?php
session_start();
require_once('db.php'); // Assuming this file contains the database connection logic
///// Dashboard 
function Checkusertype($id) {
    $con = conn(); // Assuming this function establishes a database connection
   // $id = mysqli_real_escape_string($con, $id); // Escaping user input to prevent SQL injection

    $sql = "SELECT * FROM user WHERE user_id ='$id'";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    if ($row_num == 1) {
        return $row["user_type"];
    } else {
        return "invalid";
    }
}

function numOFtotalDoctors(){
	$con = conn(); // Assuming this function establishes a database connection
    
    $sql = "SELECT * FROM Doctor";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function numOFtotalPatients(){
	$con = conn(); // Assuming this function establishes a database connection
    

    $sql = "SELECT * FROM Patient";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}


function numtotalAppointments(){

	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}
function numtotalEarning(){
    $con = conn(); // Assuming this function establishes a database connection
    
    // You should enclose "paid" in single quotes as it's a string value
    $sql = "SELECT * FROM Billing WHERE billing_status='paid'";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $num = 0;
    while ($row = mysqli_fetch_assoc($res)) {
    	$num=$num+$row["billing_amount"];
    }
 
    return $num;
}

function numOFcanceledAppointment(){
	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment WHERE appointment_status ='cancelled' ";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function numOFconfirmedAppointment(){
	$con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM Appointment WHERE appointment_status ='confirmed' ";
    $res = mysqli_query($con, $sql);

    $row_num = mysqli_num_rows($res);
    $row = mysqli_fetch_assoc($res);

    return $row_num;

}

function AllappointmentList($date){
		$con = conn(); // Assuming this function establishes a database connection

    $sql = "SELECT * FROM Appointment WHERE appointment_date ='$date' ";
    $res = mysqli_query($con, $sql);

 

    return  $res;

}

function finduserBYid($id){
	$con = conn();
	$sql = "SELECT * FROM user WHERE user_id ='$id'";
    $res = mysqli_query($con, $sql);

        return  $res;
}
function MonthlyAppointmentCounts($year, $month){
    $con = conn();
    $sql = "SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = '$year' AND MONTH(appointment_date) = '$month'";

    $res = mysqli_query($con, $sql);

    return  $res;
}

function WeeklyAppointmentCounts($year, $month, $week) {
    $con = conn();
    if($week==1){
    	$start_day=1;
    	$end_day=7;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      if($week==2){
    	$start_day=8;
    	$end_day=14;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }if($week==3){
    	$start_day=15;
    	$end_day=21;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      if($week==4){
    	$start_day=15;
    	$end_day=30;
      $sql="SELECT COUNT(*) AS count FROM appointment WHERE YEAR(appointment_date) = $year AND MONTH(appointment_date) = $month AND DAY(appointment_date) BETWEEN $start_day and $end_day ";


      }
      

    $res = mysqli_query($con, $sql);

 

    return $res;
}

//print_r(WeeklyAppointmentCounts(2024,5,1)) ;

///// hospital setups
function addDoctorINDoctor($name, $id, $password){
    $con = conn();
    $department_id="";
    $sql = "INSERT INTO `Doctor`(`doctor_id`, `doctor_username`, `doctor_password`, `department_id`) VALUES  ('$id', '$name', '$password', '$department_id')";
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function addDoctorINuser($name, $id, $password, $age, $gender, $phone, $email){
    $con = conn();
    $type="doctor";
     $profilePicture="";
    $sql = "INSERT INTO `user`(`user_id`, `user_name`, `user_type`, `user_age`, `user_gender`, `user_ phone`, `user_email`, `ProfilePicture`) VALUES ('$id', '$name', '$type', '$age', '$gender', '$phone', '$email', '$profilePicture')";
 
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function isDoctorIdExists($id){
   $con = conn();
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    if ($row_num > 0) {
        return false;
    } else {
        return true;
    }
}

function addPatientInPatient($name, $id, $password){
    $con = conn();
    $sql = "INSERT INTO `Patient`(`patient_id`, `patient_username`, `patient_password`) VALUES ('$id', '$name', '$password')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function addPatientInUser($name, $id, $password, $age, $gender, $phone, $email){
   $con = conn();
    $type="Patient";
     $profilePicture="";
    $sql = "INSERT INTO `user`(`user_id`, `user_name`, `user_type`, `user_age`, `user_gender`, `user_ phone`, `user_email`, `ProfilePicture`) VALUES ('$id', '$name', '$type', '$age', '$gender', '$phone', '$email', '$profilePicture')";
 
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function isPatientIdExists($id){
    $con = conn();
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    if ($row_num > 0) {
        return false;
    } else {
        return true;
    }
}



function addStaffInStaff($name, $id, $password, $role, $departmentId){
    $con = conn();
    $sql = "INSERT INTO `Staff`(`staff_id`, `staff_username`, `staff_password`, `staff_role`, `department_id`) VALUES ('$id', '$name', '$password', '$role', '$departmentId')";
    $res = mysqli_query($con, $sql);
    if ($res) {
        return true;
    } else {
        return false;
    }
}

function addStaffInUser($name, $id, $password, $age, $gender, $phone, $email){
    $con = conn();
    $type = "staff";
    $profilePicture="";
    $sql = "INSERT INTO `user`(`user_id`, `user_name`, `user_type`, `user_age`, `user_gender`, `user_ phone`, `user_email`, `ProfilePicture`) VALUES ('$id', '$name', '$type', '$age', '$gender', '$phone', '$email', '$profilePicture')";
 
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function isStaffIdExists($id){
    $con = conn();
    $sql = "SELECT * FROM user WHERE user_id = '$id'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    if ($row_num > 0) {
        return false;
    } else {
        return true;
    }
}


/*

if(isStaffIdExists("s223")){
	if(addStaffInUser("010", "s223", "010", 20, "male", 011, "101@gmail.com") && addStaffInStaff("010", "s223", "010","22","22")){
    echo "yyyyyyy";
} else {
    echo "noooooooooooooo";
}

}else{
	echo "nooo";
}
/*
function Searchuser($SearchbyID) {
 
 $con = conn();
     $sql = "SELECT * FROM user WHERE user_id ='$SearchbyID'";
    $res = mysqli_query($con, $sql);
    return mysqli_fetch_assoc($res);
}

*/
function Searchuser($id) {
    $con = conn(); // Assuming this function establishes a database connection
    $sql = "SELECT * FROM user WHERE user_id ='$id'";
    $res = mysqli_query($con, $sql);
    
    if ($res && mysqli_num_rows($res) > 0) { // Check if query was successful and returned rows
        $row = mysqli_fetch_assoc($res);
        return $row; // Return the fetched row
    } else {
        return null; // Return null if no user found or query failed
    }
}
function SearchDepartment($SearchDepartmentByID){
	    $con = conn(); // Assuming this function establishes a database connection
    $sql = "SELECT * FROM Department WHERE department_id ='$SearchDepartmentByID'";
    $res = mysqli_query($con, $sql);
    
    if ($res && mysqli_num_rows($res) > 0) { // Check if query was successful and returned rows
        $row = mysqli_fetch_assoc($res);
        return $row; // Return the fetched row
    } else {
        return null; // Return null if no user found or query failed
    }
}

function updateUser($id, $name, $age, $gender, $phone, $email) {
    $conn = conn();
    $sql = "UPDATE `user` SET `user_name`='$name', `user_age`='$age', `user_gender`='$gender', `user_ phone`='$phone', `user_email`='$email' WHERE `user_id`='$id';";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        // Handle the error, e.g., log it
        return false;
    }
    return true;
}
function updateDoctor($id, $name, $age, $gender, $phone, $email) {
    $res1 = updateUser($id, $name, $age, $gender, $phone, $email);

    if ($res1) {
        $conn = conn();
        $sql = "UPDATE `Doctor` SET `doctor_username`='$name' WHERE `doctor_id`='$id';";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
    }
    return false;
}

function removeuserInfo($id){
	$conn = conn();
    $sql = "DELETE FROM `user` WHERE `user_id`='$id';";
    $res = mysqli_query($conn, $sql);

    if (!$res) {
        // Handle the error, e.g., log it
        return false;
    }
    return true;

}

function removeDoctorInfo($id){

	$res1=removeuserInfo($id);
	if($res1){

	$conn = conn();
    $sql = "DELETE FROM `Doctor` WHERE `doctor_id`='$id';";
    $res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
	}
	else{
		return false;
	}

}

function doctorsListdb() {
    $conn = conn();
    $sql = "SELECT * FROM `user` WHERE `user_type`='doctor';";
    $res = mysqli_query($conn, $sql);
    return $res;
}


function updatePatient($id, $name, $age, $gender, $phone, $email){
	$res1 = updateUser($id, $name, $age, $gender, $phone, $email);

    if ($res1) {
        $conn = conn();
        $sql = "UPDATE `Patient` SET `patient_username`='$name' WHERE `patient_id`='$id';";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
    }
    return false;

}
function removePatientInfo($id){
	$res1=removeuserInfo($id);
	if($res1){

	$conn = conn();
    $sql = "DELETE FROM `Patient` WHERE `patient_id`='$id';";
    $res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
	}
	else{
		return false;
	}
}

function patientsListdb(){
	 $conn = conn();
    $sql = "SELECT * FROM `user` WHERE `user_type`='patient';";
    $res = mysqli_query($conn, $sql);
    return $res;
}
function updateStaff($id, $name, $age, $gender, $phone, $email, $role, $departmentId){
   $res1 = updateUser($id, $name, $age, $gender, $phone, $email);

    if ($res1) {
        $conn = conn();
        $sql = "UPDATE `Staff` SET `staff_username`='$name',`staff_role`='$role',`department_id`='$departmentId' WHERE `staff_id`='$id';";
        $res = mysqli_query($conn, $sql);

        if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
    }
    return false;
}

function removeStaffInfo($id){
	$res1=removeuserInfo($id);
	if($res1){

	$conn = conn();
    $sql = "DELETE FROM `Staff` WHERE `staff_id`='$id';";
    $res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
	}
	else{
		return false;
	}
}
function staffListdb(){
	    $conn = conn();
    $sql = "SELECT * FROM `user` WHERE `user_type`='staff';";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function isDepartmentIdExists($departmentId){
	 $con = conn();
    $sql = "SELECT * FROM Department WHERE department_id = '$departmentId'";
    $res = mysqli_query($con, $sql);
    $row_num = mysqli_num_rows($res);
    if ($row_num > 0) {
        return false;
    } else {
        return true;
    }

}

function addDepartment($departmentId, $departmentName, $departmentDescription){
    $con = conn();
    
    $sql = "INSERT INTO `Department`(`department_id`, `department_name`, `department_ description`) VALUES ('$departmentId','$departmentName','$departmentDescription');";
 
    $res = mysqli_query($con, $sql);
    if (!empty($res)) {
        return true;
    } else {
        return false;
    }
}

function removeDepartmentInfo($departmentId){
	$conn = conn();
    $sql = "DELETE FROM Department WHERE department_id ='$departmentId';";
    $res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
	
}
function updateDepartmentInfo($departmentId, $departmentName, $departmentDescription){
	$conn = conn();
	$sql="UPDATE `Department` SET `department_name`='$departmentName',`department_ description`='$departmentDescription' WHERE `department_id`='$departmentId';";
	$res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
}

function DepartmentListbd(){
	$conn = conn();
    $sql = "SELECT * FROM `Department` ;";
    $res = mysqli_query($conn, $sql);
    return $res;
}
/*
$doctor_updated = updateStaff("010", "s223", "010", 20, "male", 011, "101@gmail.com","mas","12");
if ($doctor_updated) {
    echo "ssssss information updated successfully.<br>";
} else {
    echo "Failed to update doctor information.<br>";
}
*/
//////////
function InventoryListbd(){
	$conn = conn();
    $sql = "SELECT * FROM `Inventory` ;";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function searchInventory($searchId){
	$con = conn(); // Assuming this function establishes a database connection
    $sql = "SELECT * FROM `Inventory` WHERE  `inventory_id`='$searchId'";
    $res = mysqli_query($con, $sql);
    
    if ($res && mysqli_num_rows($res) > 0) { // Check if query was successful and returned rows
        $row = mysqli_fetch_assoc($res);
        return $row; // Return the fetched row
    } else {
        return null; // Return null if no user found or query failed
    }
}

function isInventoryIdExists($inventoryId) {
 $con = conn();
    $query = "SELECT * FROM inventory WHERE inventory_id = '$inventoryId';";;
    $result = mysqli_query( $con, $query);

    return mysqli_num_rows($result) > 0;
}

// This function adds the inventory item to the inventory list table in the database
function addInventoryInInventoryList($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription) {
     $con = conn();
     $usedquantity=0;
    $query = "INSERT INTO `Inventory`(`inventory_id`, `inventory_name`, `available_inventory_quantity`, `inventory_ description`,`used_inventory_quantity`) VALUES ('$inventoryId','$inventoryName','$availableQuantity','$inventoryDescription','$usedquantity');";
    $result = mysqli_query($con, $query);

    return $result;
}
function deleteInventorydb($inventoryId){
	$conn = conn();
    $sql = "DELETE FROM `Inventory` WHERE `inventory_id`='$inventoryId';";
    $res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
}
function updateInventoryInfo($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription){
	$conn = conn();
	$sql="UPDATE `Inventory` SET `inventory_name`='$inventoryName',`available_inventory_quantity`='$availableQuantity',`inventory_ description`='$inventoryDescription' WHERE `inventory_id`='$inventoryId';";
	$res = mysqli_query($conn, $sql);
 if (!$res) {
            // Handle the error, e.g., log it
            return false;
        }
        return true;
}
//print_r(addInventoryInInventoryList("2", "2", 2,"2"));

function  appointmentsListdb(){
	$conn = conn();
    $sql = "SELECT * FROM `Appointment` ;";
    $res = mysqli_query($conn, $sql);
    return $res;
}

function billingListdb(){
$conn = conn();
    $sql = "SELECT * FROM `Billing` ;";
    $res = mysqli_query($conn, $sql);
    return $res;
}



?>

