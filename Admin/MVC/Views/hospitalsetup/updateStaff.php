<?php
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

// Initialize variables to prevent undefined variable error
$SearchedstaffName = "";
$SearchedstaffId = "";
$SearchedstaffAge = "";
$SearchedstaffGender = "";
$SearchedstaffPhone = "";
$SearchedstaffEmail = "";
$SearchedstaffAddress = "";
$SearchedstaffRole = "";
$SearcheddepartmentId = "";
$mass = "";

// Check if search by ID is requested
if(isset($_GET['SearchbyID'])) {
    $SearchbyID = $_GET['SearchbyID'];
    $user_type="staff";
    if($SearchbyID==""){
    $SearchedstaffName = "";
    $SearchedstaffId = "";
    $SearchedstaffAge = "";
    $SearchedstaffGender = "";
    $SearchedstaffPhone = "";
    $SearchedstaffEmail = "";
    
    $SearchedstaffRole = "";
    $SearcheddepartmentId = "";
    }
    else{
    $SearchedstaffName = SearchByID($SearchbyID,"user_name",$user_type);
    $SearchedstaffId = SearchByID($SearchbyID,"user_id",$user_type);
    $SearchedstaffAge = SearchByID($SearchbyID,"user_age",$user_type);
    $SearchedstaffGender = SearchByID($SearchbyID,"user_gender",$user_type);
    $SearchedstaffPhone = SearchByID($SearchbyID,"user_ phone",$user_type);
    $SearchedstaffEmail = SearchByID($SearchbyID,"user_email",$user_type);
    
    $SearchedstaffRole = SearchByID($SearchbyID,"staff_role",$user_type);
    $SearcheddepartmentId = SearchByID($SearchbyID,"department_id",$user_type);
    }
}
if(isset($_GET['updateStaff'])) {
    // Sanitize input before using it in SQL queries
    $id = $_GET['UpdatedstaffId'];
    $name = $_GET['UpdatedstaffName'];
    $age = $_GET['UpdatedstaffAge'];
    $gender = $_GET['UpdatedstaffGender'];
    $phone = $_GET['UpdatedstaffPhone'];
    $email = $_GET['UpdatedstaffEmail'];
  
    // Retrieve other fields as needed
    $role = $_GET['UpdatedstaffRole'];
    $departmentId = $_GET['UpdateddepartmentId'];
    
    // Call the function to update staff information
    $updateStatus = updateStaffInfo($id, $name, $age, $gender, $phone, $email, $role, $departmentId);
    
    if ($updateStatus) {
        $mass = "Staff information updated successfully!";
    } else {
        $mass = "Failed to update staff information.";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Update Staff Information</title>
</head>
<body>
    <div class="container">
        <div class="UpdateStaffInfo">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Update Staff Information</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                        <button type="submit" id="searchByIdButton" name="searchByIdButton">Search</button>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="staffName">Name:</label>
                    <p>Enter the updated name of the staff member</p>
                    <input type="text" id="staffName" name="UpdatedstaffName" value="<?php echo $SearchedstaffName; ?>" placeholder="Enter updated name">
                </div>
                <div class="form-group">
                    <label for="staffId">ID:</label>
                    <p>This is the unique ID of the staff member</p>
                    <input type="text" id="staffId" name="UpdatedstaffId" placeholder="Enter staff ID" value="<?php echo $SearchedstaffId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="staffAge">Age:</label>
                    <p>Enter the updated age of the staff member</p>
                    <input type="number" id="staffAge" name="UpdatedstaffAge" value="<?php echo $SearchedstaffAge; ?>" placeholder="Enter updated age">
                </div>
                <div class="form-group">
                    <label for="staffGender">Gender:</label>
                    <p>Select the updated gender of the staff member</p>
                    <select id="staffGender" name="UpdatedstaffGender">
                        <option value="male" <?php if ($SearchedstaffGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearchedstaffGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearchedstaffGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staffPhone">Phone:</label>
                    <p>Enter the updated phone number of the staff member</p>
                    <input type="text" id="staffPhone" name="UpdatedstaffPhone" value="<?php echo $SearchedstaffPhone; ?>" placeholder="Enter updated phone number">
                </div>
                <div class="form-group">
                    <label for="staffEmail">Email:</label>
                    <p>Enter the updated email address of the staff member</p>
                    <input type="email" id="staffEmail" name="UpdatedstaffEmail" value="<?php echo $SearchedstaffEmail; ?>" placeholder="Enter updated email address">
                </div>
                <div class="form-group">
                    <label for="staffRole">Role:</label>
                    <p>Enter the updated role of the staff member</p>
                    <input type="text" id="staffRole" name="UpdatedstaffRole" value="<?php echo $SearchedstaffRole; ?>" placeholder="Enter updated role">
                </div>
                <div class="form-group">
                    <label for="departmentId">Department ID:</label>
                    <p>Enter the updated department ID for the staff member</p>
                    <input type="text" id="departmentId" name="UpdateddepartmentId" value="<?php echo $SearcheddepartmentId; ?>" placeholder="Enter updated department ID">
                </div>


                <!-- Additional fields can be added here -->

                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="updateStaff">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>



