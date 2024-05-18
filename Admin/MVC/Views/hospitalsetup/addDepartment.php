<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

$mass = ""; // Initialize the variable to prevent undefined variable error
unset($_SESSION['AddDepartmentmess']);

if(isset($_POST['addDepartment'])){
    // Retrieve form data
    $departmentId = $_POST['departmentId'];
    $departmentName = $_POST['departmentName'];
    $departmentDescription = $_POST['departmentDescription'];

    // Perform validation
    if(empty($departmentId) || empty($departmentName) || empty($departmentDescription)) {
        $mass = "Please fill in all the fields.";
    } else {
        // If all validations pass, add department to database
        $res = addDepartmentToDatabase($departmentId, $departmentName, $departmentDescription);
        if (!$res) {
            if(isset($_SESSION['AddDepartmentmess'])) {
                $mass = $_SESSION['AddDepartmentmess'];
                unset($_SESSION['AddDepartmentmess']);
            }
        } else {
            if(isset($_SESSION['AddDepartmentmess'])) {
                $mass = $_SESSION['AddDepartmentmess'];
                unset($_SESSION['AddDepartmentmess']);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Add New Department</title>
</head>
<body>
    <div class="container">
        <div class="AddNewDepartment">
            <h1>Add New Department</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="departmentId">ID:</label>
                    <p>Enter the unique ID of the department</p>
                    <input type="text" id="departmentId" name="departmentId" required>
                </div>
                <div class="form-group">
                    <label for="departmentName">Name:</label>
                    <p>Enter the name of the department</p>
                    <input type="text" id="departmentName" name="departmentName" required>
                </div>
                <div class="form-group">
                    <label for="departmentDescription">Description:</label>
                    <p>Enter a description for the department</p>
                    <textarea id="departmentDescription" name="departmentDescription" required></textarea>
                </div>
                <div class="mass"><p><?php echo $mass; ?></p></div>
                <button type="submit" name="addDepartment">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
