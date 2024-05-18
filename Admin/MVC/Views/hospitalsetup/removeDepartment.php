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
    }
    else{
        $SearcheddepartmentName = SearchByDepartmentID($SearchDepartmentByID, "department_name");
        $SearcheddepartmentId = SearchByDepartmentID($SearchDepartmentByID, "department_id");
        $SearcheddepartmentDescription = SearchByDepartmentID($SearchDepartmentByID, "department_ description");
    }

    // Check if remove department is requested
    if(isset($_GET['RemoveDepartment'])) {
        // Ensure that the department ID is set and not empty
        if(!empty($_GET['RemoveDepartmentId'])) {
            $departmentId = $_GET['RemoveDepartmentId'];
            
            // Call the function to remove the department
            $removeStatus = removeDepartment($departmentId); // Implement this function in your controller
            
            if ($removeStatus) {
                $mass = "Department removed successfully!";
                // Clear the search fields after successful removal
                $SearcheddepartmentName = "";
                $SearcheddepartmentId = "";
                $SearcheddepartmentDescription = "";
            } else {
                $mass = "Failed to remove department.";
            }
        } else {
            $mass = "Department ID is required for removal.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Remove Department</title>
</head>
<body>
    <div class="container">
        <div class="RemoveDepartment">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Remove Department</h1>
                    <div class="searchDepartmentById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchDepartmentByIdInput" placeholder="Search by ID" name="SearchDepartmentByID">
                        <button type="submit" id="searchDepartmentByIdButton" name="searchDepartmentByIdButton">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="departmentName">Name:</label>
                    <p>The name of the department</p>
                    <input type="text" id="departmentName" name="RemoveDepartmentName" value="<?php echo $SearcheddepartmentName; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="departmentId">ID:</label>
                    <p>This is the unique ID of the department</p>
                    <input type="text" id="departmentId" name="RemoveDepartmentId" placeholder="Enter department ID" value="<?php echo $SearcheddepartmentId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="departmentDescription">Description:</label>
                    <p>The description of the department</p>
                    <input type="text" id="departmentDescription" name="RemoveDepartmentDescription" value="<?php echo $SearcheddepartmentDescription; ?>" placeholder="Description">
                </div>
                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="RemoveDepartment">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
