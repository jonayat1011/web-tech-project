<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

// Initialize variables to prevent undefined variable error
$SearchedStaffName = "";
$SearchedStaffId = "";
$SearchedStaffAge = "";
$SearchedStaffGender = "";
$SearchedStaffPhone = "";
$SearchedStaffEmail = "";
$massStaff = "";

// Check if search by ID is requested
if(isset($_GET['SearchStaffByID'])) {
    $SearchStaffByID = $_GET['SearchStaffByID'];
    $user_type = "staff"; // Change the user type to staff
    if($SearchStaffByID == ""){
        // Clear the variables if search is empty
        $SearchedStaffName = "";
        $SearchedStaffId = "";
        $SearchedStaffAge = "";
        $SearchedStaffGender = "";
        $SearchedStaffPhone = "";
        $SearchedStaffEmail = "";
    }
    else{
        // Retrieve staff details based on ID
        $SearchedStaffName = SearchByID($SearchStaffByID, "user_name", $user_type);
        $SearchedStaffId = SearchByID($SearchStaffByID, "user_id", $user_type);
        $SearchedStaffAge = SearchByID($SearchStaffByID, "user_age", $user_type);
        $SearchedStaffGender = SearchByID($SearchStaffByID, "user_gender", $user_type);
        $SearchedStaffPhone = SearchByID($SearchStaffByID, "user_ phone", $user_type); // Corrected typo in field name
        $SearchedStaffEmail = SearchByID($SearchStaffByID, "user_email", $user_type);
    }

    // Check if remove staff is requested
    if(isset($_GET['RemoveStaff'])) {
        // Ensure that the staff ID is set and not empty
        if(!empty($_GET['RemoveStaffId'])) {
            $id = $_GET['RemoveStaffId'];
            
            // Call the function to remove the staff
            $removeStatus = removeStaff($id); // Implement this function in your controller
            
            if ($removeStatus) {
                $massStaff = "Staff removed successfully!";
                // Clear the search fields after successful removal
                $SearchedStaffName = "";
                $SearchedStaffId = "";
                $SearchedStaffAge = "";
                $SearchedStaffGender = "";
                $SearchedStaffPhone = "";
                $SearchedStaffEmail = "";
            } else {
                $massStaff = "Failed to remove staff.";
            }
        } else {
            $massStaff = "Staff ID is required for removal.";
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Remove Staff</title>
</head>
<body>
    <div class="container">
        <div class="RemoveStaff">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Remove Staff</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchStaffByIdInput" placeholder="Search by ID" name="SearchStaffByID">
                        <button type="submit" id="searchStaffByIdButton" name="searchStaffByIdButton">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="staffName">Name:</label>
                    <p>The name of the staff</p>
                    <input type="text" id="staffName" name="RemoveStaffName" value="<?php echo $SearchedStaffName; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="staffId">ID:</label>
                    <p>This is the unique ID of the staff</p>
                    <input type="text" id="staffId" name="RemoveStaffId" placeholder="Enter staff ID" value="<?php echo $SearchedStaffId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="staffAge">Age:</label>
                    <p>The age of the staff</p>
                    <input type="number" id="staffAge" name="RemoveStaffAge" value="<?php echo $SearchedStaffAge; ?>" placeholder="Age">
                </div>
                <div class="form-group">
                    <label for="staffGender">Gender:</label>
                    <p>Select the gender of the staff</p>
                    <select id="staffGender" name="RemoveStaffGender">
                        <option value="male" <?php if ($SearchedStaffGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearchedStaffGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearchedStaffGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="staffPhone">Phone:</label>
                    <p>The phone number of the staff</p>
                    <input type="text" id="staffPhone" name="RemoveStaffPhone" value="<?php echo $SearchedStaffPhone; ?>" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label for="staffEmail">Email:</label>
                    <p>The email address of the staff</p>
                    <input type="email" id="staffEmail" name="RemoveStaffEmail" value="<?php echo $SearchedStaffEmail; ?>" placeholder="Email address">
                </div>
                <div class="mass"><p><?php echo $massStaff;?></p></div>
                <button type="submit" name="RemoveStaff">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
