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
    $user_type="patient";
    if($SearchbyID==""){
    $SearchedpatientName = "";
    $SearchedpatientId = "";
    $SearchedpatientAge = "";
    $SearchedpatientGender = "";
    $SearchedpatientPhone = "";
    $SearchedpatientEmail = "";
    }
    else{
    $SearchedpatientName = SearchByID($SearchbyID,"user_name",$user_type);
    $SearchedpatientId = SearchByID($SearchbyID,"user_id",$user_type);
    
    $SearchedpatientAge = SearchByID($SearchbyID,"user_age",$user_type);
    $SearchedpatientGender = SearchByID($SearchbyID,"user_gender",$user_type);
    $SearchedpatientPhone = SearchByID($SearchbyID,"user_ phone",$user_type);
    $SearchedpatientEmail = SearchByID($SearchbyID,"user_email",$user_type);

    }
if(isset($_GET['updatePatient'])) {
    // Sanitize input before using it in SQL queries
    $id = $_GET['UpdatepatientId'];
    $name = $_GET['UpdatepatientName'];
    $age = $_GET['UpdatepatientAge'];
    $gender = $_GET['UpdatepatientGender'];
    $phone = $_GET['UpdatepatientPhone'];
    $email = $_GET['UpdatepatientEmail'];
    
    // Call the function to update patient information
    $updateStatus = updatePatientInfo($id, $name, $age, $gender, $phone, $email);
    if ($updateStatus) {
        $mass = "Patient information updated successfully!";
    } else {
        $mass = "Failed to update patient information.";
    }
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Update Patient Information</title>
</head>
<body>
    <div class="container">
        <div class="UpdatePatientInfo">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Update The Patient Info.</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                        <button type="submit" id="searchByIdButton" name="searchByIdButton">Search</button>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="patientName">Name:</label>
                    <p>Enter the updated name of the patient</p>
                    <input type="text" id="patientName" name="UpdatepatientName" value="<?php echo $SearchedpatientName; ?>" placeholder="Enter updated name">
                </div>
                <div class="form-group">
                    <label for="patientId">ID:</label>
                    <p>This is the unique ID of the patient</p>
                    <input type="text" id="patientId" name="UpdatepatientId" placeholder="Enter patient ID" value="<?php echo $SearchedpatientId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="patientAge">Age:</label>
                    <p>Enter the updated age of the patient</p>
                    <input type="number" id="patientAge" name="UpdatepatientAge" value="<?php echo $SearchedpatientAge; ?>" placeholder="Enter updated age">
                </div>
                <div class="form-group">
                    <label for="patientGender">Gender:</label>
                    <p>Select the updated gender of the patient</p>
                    <select id="patientGender" name="UpdatepatientGender">
                        <option value="male" <?php if ($SearchedpatientGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearchedpatientGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearchedpatientGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patientPhone">Phone:</label>
                    <p>Enter the updated phone number of the patient</p>
                    <input type="text" id="patientPhone" name="UpdatepatientPhone" value="<?php echo $SearchedpatientPhone; ?>" placeholder="Enter updated phone number">
                </div>
                <div class="form-group">
                    <label for="patientEmail">Email:</label>
                    <p>Enter the updated email address of the patient</p>
                    <input type="email" id="patientEmail" name="UpdatepatientEmail" value="<?php echo $SearchedpatientEmail; ?>" placeholder="Enter updated email address">
                </div>

                <!-- Additional fields can be added here -->

                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="updatePatient">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
