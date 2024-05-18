<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

// Initialize variables to prevent undefined variable error
$SearchedpatientName = "";
$SearchedpatientId = "";
$SearchedpatientAge = "";
$SearchedpatientGender = "";
$SearchedpatientPhone = "";
$SearchedpatientEmail = "";
$mass = "";

// Check if search by ID is requested
if(isset($_GET['SearchbyID'])) {
    $SearchbyID = $_GET['SearchbyID'];
    $user_type = "patient";
    if($SearchbyID == ""){
        $SearchedpatientName = "";
        $SearchedpatientId = "";
        $SearchedpatientAge = "";
        $SearchedpatientGender = "";
        $SearchedpatientPhone = "";
        $SearchedpatientEmail = "";
    }
    else{
        $SearchedpatientName = SearchByID($SearchbyID, "user_name", $user_type);
        $SearchedpatientId = SearchByID($SearchbyID, "user_id", $user_type);
        
        $SearchedpatientAge = SearchByID($SearchbyID, "user_age", $user_type);
        $SearchedpatientGender = SearchByID($SearchbyID, "user_gender", $user_type);
        $SearchedpatientPhone = SearchByID($SearchbyID, "user_ phone", $user_type);
        $SearchedpatientEmail = SearchByID($SearchbyID, "user_email", $user_type);
    }

    // Check if remove patient is requested
    if(isset($_GET['RemovePatient'])) {
        // Ensure that the patient ID is set and not empty
        if(!empty($_GET['RemovepatientId'])) {
            $id = $_GET['RemovepatientId'];
            
            // Call the function to remove the patient
            $removeStatus = removePatient($id); // Implement this function in your controller
            
            if ($removeStatus) {
                $mass = "Patient removed successfully!";
                // Clear the search fields after successful removal
                $SearchedpatientName = "";
                $SearchedpatientId = "";
                $SearchedpatientAge = "";
                $SearchedpatientGender = "";
                $SearchedpatientPhone = "";
                $SearchedpatientEmail = "";
            } else {
                $mass = "Failed to remove patient.";
            }
        } else {
            $mass = "Patient ID is required for removal.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Remove Patient</title>
</head>
<body>
    <div class="container">
        <div class="RemovePatient">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Remove Patient</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                        <button type="submit" id="searchByIdButton" name="searchByIdButton">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="patientName">Name:</label>
                    <p>The name of the patient</p>
                    <input type="text" id="patientName" name="RemovepatientName" value="<?php echo $SearchedpatientName; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="patientId">ID:</label>
                    <p>This is the unique ID of the patient</p>
                    <input type="text" id="patientId" name="RemovepatientId" placeholder="Enter patient ID" value="<?php echo $SearchedpatientId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="patientAge">Age:</label>
                    <p>The age of the patient</p>
                    <input type="number" id="patientAge" name="RemovepatientAge" value="<?php echo $SearchedpatientAge; ?>" placeholder="Age">
                </div>
                <div class="form-group">
                    <label for="patientGender">Gender:</label>
                    <p>Select the gender of the patient</p>
                    <select id="patientGender" name="RemovepatientGender">
                        <option value="male" <?php if ($SearchedpatientGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearchedpatientGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearchedpatientGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patientPhone">Phone:</label>
                    <p>The phone number of the patient</p>
                    <input type="text" id="patientPhone" name="RemovepatientPhone" value="<?php echo $SearchedpatientPhone; ?>" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label for="patientEmail">Email:</label>
                    <p>The email address of the patient</p>
                    <input type="email" id="patientEmail" name="RemovepatientEmail" value="<?php echo $SearchedpatientEmail; ?>" placeholder="Email address">
                </div>
                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="RemovePatient">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
