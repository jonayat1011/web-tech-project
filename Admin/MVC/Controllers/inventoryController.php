<?php

session_start();

require_once('../Models/alldb.php');


 
function addStaffToDatabase($name, $id, $password, $age, $gender, $phone, $email, $role, $departmentId) {
    // Check if any required field is empty
    if (empty($name) || empty($id) || empty($password) || empty($age) || empty($gender) || empty($phone) || empty($email) || empty($role) || empty($departmentId)) {
        $_SESSION['AddStaffmess'] = "Please fill in all fields";
        return false;
    } else {
        // Check if the staff ID already exists
        $res = isStaffIdExists($id);
        if ($res) {
            // Add staff to the database
            $res1 = addStaffInUser($name, $id, $password, $age, $gender, $phone, $email);
            $res2 = addStaffInStaff($name, $id, $password, $role, $departmentId);

            // Check if both insertions were successful
            if ($res1 && $res2) {
                $_SESSION['AddStaffmess'] = "New staff member was added successfully.";
                return true;
            } else {
                $_SESSION['AddStaffmess'] = "New staff member was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddStaffmess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}
function SearchByID($ID, $columnName, $userType) {
    $res = Searchuser($ID);
    if (!empty($res)) { // Check if search was successful
        if ($userType == $res["user_type"]) {
            return $res[$columnName];
        }
    } else {
        return ""; // Return empty string if search fails
    }
}

function DoctorsList() {
    return doctorsListdb();
}
function updatePatientInfo($id, $name, $age, $gender, $phone, $email) {
    return updatePatient($id, $name, $age, $gender, $phone, $email);
}
function removePatient($id){
    return removePatientInfo($id);
}

function InventoryList(){

   return InventoryListbd();
}
function searchByInventoryID($searchId){
	$res = searchInventory($searchId);
    if (!empty($res)) { // Check if search was successful
        
            return $res;
        
    } else {
        return ""; // Return empty string if search fails
    }
}
function addInventory($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription) {
    // Check if any required field is empty
    if (empty($inventoryId) || empty($inventoryName) || empty($availableQuantity) || empty($inventoryDescription)) {
        $_SESSION['AddInventoryMess'] = "Please fill in all fields";
        return false;
    } else {
        // Check if the inventory ID already exists
        $res = isInventoryIdExists($inventoryId);
        if ($res==0) {
            // Add inventory to the database
            $res1 = addInventoryInInventoryList($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription);

            // Check if the insertion was successful
            if ($res1) {
                $_SESSION['AddInventoryMess'] = "New inventory item was added successfully.";
                return true;
            } else {
                $_SESSION['AddInventoryMess'] = "New inventory item was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddInventoryMess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}
function deleteInventory($inventoryId){
	return deleteInventorydb($inventoryId);
}
function updateInventory($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription){
	return updateInventoryInfo($inventoryId, $inventoryName, $availableQuantity, $inventoryDescription);
}
// This function checks if the inventory ID already exists in the database




?>