<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

$mass = ""; // Initialize the variable to prevent undefined variable error
unset($_SESSION['AddStaffmess']);

if(isset($_POST['addStaff'])){
    // Retrieve form data
    $staffName = $_POST['staffName'];
    $staffId = $_POST['staffId'];
    $staffPassword = $_POST['staffPassword'];
    $staffAge = $_POST['staffAge'];
    $staffGender = $_POST['staffGender'];
    $staffPhone = $_POST['staffPhone'];
    $staffEmail = $_POST['staffEmail'];
    $staffRole = $_POST['staffRole'];
    $departmentId = $_POST['departmentId'];

    // Perform validation
    if(empty($staffName) || empty($staffId) || empty($staffPassword) || empty($staffAge) || empty($staffGender) || empty($staffPhone) || empty($staffEmail) || empty($staffRole) || empty($departmentId)) {
        $mass = "Please fill in all the fields.";
    } elseif(!filter_var($staffEmail, FILTER_VALIDATE_EMAIL)) {
        $mass = "Invalid email format.";
    } else {
        // If all validations pass, add staff to database
        $res = addStaffToDatabase($staffName, $staffId, $staffPassword, $staffAge, $staffGender, $staffPhone, $staffEmail, $staffRole, $departmentId);
        if (!$res) {
            if(isset($_SESSION['AddStaffmess'])) {
                $mass = $_SESSION['AddStaffmess'];
                unset($_SESSION['AddStaffmess']);
                sendEmail($staffEmail,$staffId,$staffPassword);
            }
        } else {
            if(isset($_SESSION['AddStaffmess'])) {
                $mass = $_SESSION['AddStaffmess'];
                unset($_SESSION['AddStaffmess']);
            }
        }
    }
}


?>




<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Add New Staff</title>
</head>
<body>
    <div class="container">
        <div class="AddNewStaff">
            <h1>Add New Staff</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="staffName">Name:</label>
                    <p>Enter the name of the staff member</p>
                    <input type="text" id="staffName" name="staffName" required>
                </div>
                <div class="form-group">
                    <label for="staffId">ID:</label>
                    <p>Enter the unique ID of the staff member</p>
                    <input type="text" id="staffId" name="staffId" required>
                </div>
                <div class="form-group">
                    <label for="staffPassword">Password:</label>
                    <p>Enter a secure password for the staff member</p>
                    <input type="password" id="staffPassword" name="staffPassword" required>
                </div>
                <div class="form-group">
                    <label for="staffAge">Age:</label>
                    <p>Enter the age of the staff member</p>
                    <input type="number" id="staffAge" name="staffAge" required>
                </div>
                <div class="form-group">
                    <label for="staffGender">Gender:</label>
                    <p>Select the gender of the staff member</p>
                    <select id="staffGender" name="staffGender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staffPhone">Phone:</label>
                    <p>Enter the phone number of the staff member</p>
                    <input type="text" id="staffPhone" name="staffPhone" required>
                </div>
                <div class="form-group">
                    <label for="staffEmail">Email:</label>
                    <p>Enter the email address of the staff member</p>
                    <input type="email" id="staffEmail" name="staffEmail" required>
                </div>
                <div class="form-group">
                    <label for="staffRole">Role:</label>
                    <p>Enter the role of the staff member</p>
                    <input type="text" id="staffRole" name="staffRole" required>
                </div>
                <div class="form-group">
                    <label for="departmentId">Department ID:</label>
                    <p>Enter the department ID for the staff member</p>
                    <input type="text" id="departmentId" name="departmentId" required>
                </div>
                <div class="mass"><p><?php echo $mass; ?></p></div>
                <button type="submit" name="addStaff">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
