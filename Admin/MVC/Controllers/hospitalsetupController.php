<?php

session_start();

require_once('../../Models/alldb.php');

function sendEmail($email, $id, $password) {
    $subject = "Welcome to Our Hospital";
    $message = "Dear Staff Member,\n\nYour account has been created successfully.\n\nYour ID: $id\nYour Password: $password\n\nPlease log in to your account using these credentials.";
    $headers = "From: jonayathossainooo@gmail.com";
    
    mail($email, $subject, $message, $headers);
}
function addDoctorToDatabase($name, $id, $password, $age, $gender, $phone, $email) {
    if (empty($name) || empty($id) || empty($password) || empty($age) || empty($gender) || empty($phone) || empty($email)) {
        $_SESSION['AddDoctormess'] = "Please fill in all fields";
        return false;
    } else {
        $res = isDoctorIdExists($id);
        if ($res) {
            $res1 = addDoctorINuser($name, $id, $password, $age, $gender, $phone, $email);
            $res2 = addDoctorINDoctor($name, $id, $password);

            if ($res1 && $res2) {
            	 $_SESSION['AddDoctormess'] = "New doctor was  added successful .";

                return true;
            } else {
                $_SESSION['AddDoctormess'] = "New doctor was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddDoctormess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}

function addPatientToDatabase($name, $id, $password, $age, $gender, $phone, $email) {
    // Check if any required field is empty
    if (empty($name) || empty($id) || empty($password) || empty($age) || empty($gender) || empty($phone) || empty($email)) {
        $_SESSION['AddPatientmess'] = "Please fill in all fields";
        return false;
    } else {
        // Check if the patient ID already exists
        $res = isPatientIdExists($id);
        if ($res) {
            // Add patient to the database
            $res1 = addPatientInUser($name, $id, $password, $age, $gender, $phone, $email);
            $res2 = addPatientInPatient($name, $id, $password); // Assuming you have a function to add patient in the patient table

            // Check if both insertions were successful
            if ($res1 && $res2) {
                $_SESSION['AddPatientmess'] = "New patient was added successfully.";
                return true;
            } else {
                $_SESSION['AddPatientmess'] = "New patient was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddPatientmess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}

 
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
function SearchByDepartmentID($SearchDepartmentByID,$columnName){
    $res = SearchDepartment($SearchDepartmentByID);
if (!empty($res)) { // Check if search was successful
     
            return $res[$columnName];
    
    }
        return ""; // Return empty string if search fails
    
}
function updateDoctorInfo($id, $name, $age, $gender, $phone, $email) {
    return updateDoctor($id, $name, $age, $gender, $phone, $email);
}
function removeDoctor($id){
    return removeDoctorInfo($id);
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
function patientsList(){
    return patientsListdb();
}
function updateStaffInfo($id, $name, $age, $gender, $phone, $email, $role, $departmentId){
    return updateStaff($id, $name, $age, $gender, $phone, $email, $role, $departmentId);
}
function removeStaff($id){
    return removeStaffInfo($id);
}

function StaffList(){
    return staffListdb();
}

function addDepartmentToDatabase($departmentId, $departmentName, $departmentDescription) {
    // Check if any required field is empty
    if (empty($departmentId) || empty($departmentName) || empty($departmentDescription)) {
        $_SESSION['AddDepartmentmess'] = "Please fill in all fields";
        return false;
    } else {
        // Check if the department ID already exists
        $res = isDepartmentIdExists($departmentId); // You need to implement this function
        if ($res) {
            // Add department to the database
            $res = addDepartment($departmentId, $departmentName, $departmentDescription); // You need to implement this function

            // Check if insertion was successful
            if ($res) {
                $_SESSION['AddDepartmentmess'] = "New department was added successfully.";
                return true;
            } else {
                $_SESSION['AddDepartmentmess'] = "New department was not added. Please try again.";
                return false;
            }
        } else {
            $_SESSION['AddDepartmentmess'] = "This ID is already in use. Please try with a new ID.";
            return false;
        }
    }
}
function removeDepartment($departmentId){
    return removeDepartmentInfo($departmentId);
}

function updateDepartment($departmentId, $departmentName, $departmentDescription){
    return updateDepartmentInfo($departmentId, $departmentName, $departmentDescription);
}
function DepartmentList(){
    return DepartmentListbd();
}
/*
$doctor_updated = updateStaffInfo("010", "s223", "010", 20, "male", 011, "101@gmail.com","mas","12");
if ($doctor_updated) {
    echo "ssssss information updated successfully.<br>";
} else {
    echo "Failed to update doctor information.<br>";
}
//print_r(patientsList());
/*
    $user_updated = updateDoctorInfo("010", "Doe", 20, "male", "011", "john.doe@example.com");
    if ($user_updated) {
        echo "User information updated successfully.<br>";
    } else {
        echo "Failed to update user information.<br>";
    }
//echo  SearchByID("2","user_name","doctor") ;
/*
if(addStaffToDatabase("45","s123","45",45,"male",45,"45@g.com","oo","oo")){
    echo $_SESSION['AddPatientmess'];
}
else{
    echo $_SESSION['AddPatientmess'];
}
*/

/*
function Search($SearchbyID)
{
    // Your search logic here
    return "Doctor Name"; // Replace this with your actual search logic
}
/*
function Search($SearchbyID, $columnName, $userType) {
    $res = Searchuser($SearchbyID);
    if ($res) { // Check if search was successful
        if ($userType == "doctor") {
            return $res[$columnName];
        }
    }
    return null; 
}
*/
//echo  Search ("2");


?>