<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

// Initialize variables to prevent undefined variable error
$SearcheddepartmentName = "";
$SearcheddepartmentId = "";
$SearcheddepartmentDescription = "";
$mass = "";

// Check if search by ID is requested
if(isset($_GET['SearchDepartmentByID'])) {
    $SearchDepartmentByID = $_GET['SearchDepartmentByID'];
    if($SearchDepartmentByID == ""){
        $SearcheddepartmentName = "";
        $SearcheddepartmentId = "";
        $SearcheddepartmentDescription = "";
    } else {
        $SearcheddepartmentName = SearchByDepartmentID($SearchDepartmentByID, "department_name");
        $SearcheddepartmentId = SearchByDepartmentID($SearchDepartmentByID, "department_id");
        $SearcheddepartmentDescription = SearchByDepartmentID($SearchDepartmentByID, "department_ description");
    }
}

// Check if update department is requested
if(isset($_GET['UpdateDepartment'])) {
    // Ensure that the department ID is set and not empty
    if(!empty($_GET['UpdateDepartmentId']) && !empty($_GET['UpdateDepartmentName']) && !empty($_GET['UpdateDepartmentDescription'])) {
        $departmentId = $_GET['UpdateDepartmentId'];
        $departmentName = $_GET['UpdateDepartmentName'];
        $departmentDescription = $_GET['UpdateDepartmentDescription'];
        
        // Call the function to update the department
        $updateStatus = updateDepartment($departmentId, $departmentName, $departmentDescription); // Implement this function in your controller
        
        if ($updateStatus) {
            $mass = "Department updated successfully!";
        } else {
            $mass = "Failed to update department.";
        }
    } else {
        $mass = "All fields are required for update.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Remove or Update Department</title>
</head>
<body>
    <div class="container">
        <div class="UpdateDepartment">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Update Department</h1>
                    <div class="searchDepartmentById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchDepartmentByIdInput" placeholder="Search by ID" name="SearchDepartmentByID">
                        <button type="submit" id="searchDepartmentByIdButton" name="searchDepartmentByIdButton">Search</button>
                    </div>
                </div>
            </form>
            
            <form method="GET">
                <div class="form-group">
                    <label for="updateDepartmentName">Update Name:</label>
                    <input type="text" id="updateDepartmentName" name="UpdateDepartmentName" value="<?php echo $SearcheddepartmentName; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="updateDepartmentId">Update ID:</label>
                    <input type="text" id="updateDepartmentId" name="UpdateDepartmentId" value="<?php echo $SearcheddepartmentId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="updateDepartmentDescription">Update Description:</label>
                    <input type="text" id="updateDepartmentDescription" name="UpdateDepartmentDescription" value="<?php echo $SearcheddepartmentDescription; ?>" placeholder="Description">
                </div>
                <button type="submit" name="UpdateDepartment">Update</button>
            </form>
            <div class="message">
                <?php echo $mass; ?>
            </div>
        </div>
    </div>
</body>
</html>
