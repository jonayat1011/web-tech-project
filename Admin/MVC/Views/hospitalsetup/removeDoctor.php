<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

// Initialize variables to prevent undefined variable error
$SearcheddoctorName = "";
$SearcheddoctorId = "";
$SearcheddoctorAge = "";
$SearcheddoctorGender = "";
$SearcheddoctorPhone = "";
$SearcheddoctorEmail = "";
$mass = "";

// Check if search by ID is requested
if(isset($_GET['SearchbyID'])) {
    $SearchbyID = $_GET['SearchbyID'];
    $user_type="doctor";
    if($SearchbyID==""){
        $SearcheddoctorName = "";
        $SearcheddoctorId = "";
        $SearcheddoctorAge = "";
        $SearcheddoctorGender = "";
        $SearcheddoctorPhone = "";
        $SearcheddoctorEmail = "";
    }
    else{
        $SearcheddoctorName = SearchByID($SearchbyID,"user_name",$user_type);
        $SearcheddoctorId = SearchByID($SearchbyID,"user_id",$user_type);
        
        $SearcheddoctorAge = SearchByID($SearchbyID,"user_age",$user_type);
        $SearcheddoctorGender = SearchByID($SearchbyID,"user_gender",$user_type);
        $SearcheddoctorPhone = SearchByID($SearchbyID,"user_ phone",$user_type);
        $SearcheddoctorEmail = SearchByID($SearchbyID,"user_email",$user_type);
    }

    // Check if remove doctor is requested
    if(isset($_GET['RemoveDoctor'])) {
        // Ensure that the doctor ID is set and not empty
        if(!empty($_GET['RemovedoctorId'])) {
            $id = $_GET['RemovedoctorId'];
            
            // Call the function to remove the doctor
            $removeStatus = removeDoctor($id); // Implement this function in your controller
            
            if ($removeStatus) {
                $mass = "Doctor removed successfully!";
                // Clear the search fields after successful removal
                $SearcheddoctorName = "";
                $SearcheddoctorId = "";
                $SearcheddoctorAge = "";
                $SearcheddoctorGender = "";
                $SearcheddoctorPhone = "";
                $SearcheddoctorEmail = "";
            } else {
                $mass = "Failed to remove doctor.";
            }
        } else {
            $mass = "Doctor ID is required for removal.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Remove Doctor</title>
</head>
<body>
    <div class="container">
        <div class="RemoveDoctor">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Remove Doctor</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                        <button type="submit" id="searchByIdButton" name="searchByIdButton">Search</button>
                    </div>
                </div>
                <div class="form-group">
                    <label for="doctorName">Name:</label>
                    <p>The name of the doctor</p>
                    <input type="text" id="doctorName" name="RemovedoctorName" value="<?php echo $SearcheddoctorName; ?>" placeholder="Name">
                </div>
                <div class="form-group">
                    <label for="doctorId">ID:</label>
                    <p>This is the unique ID of the doctor</p>
                    <input type="text" id="doctorId" name="RemovedoctorId" placeholder="Enter doctor ID" value="<?php echo $SearcheddoctorId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="doctorAge">Age:</label>
                    <p>The age of the doctor</p>
                    <input type="number" id="doctorAge" name="RemovedoctorAge" value="<?php echo $SearcheddoctorAge; ?>" placeholder="Age">
                </div>
                <div class="form-group">
                    <label for="doctorGender">Gender:</label>
                    <p>Select the gender of the doctor</p>
                    <select id="doctorGender" name="RemovedoctorGender">
                        <option value="male" <?php if ($SearcheddoctorGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearcheddoctorGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearcheddoctorGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="doctorPhone">Phone:</label>
                    <p>The phone number of the doctor</p>
                    <input type="text" id="doctorPhone" name="RemovedoctorPhone" value="<?php echo $SearcheddoctorPhone; ?>" placeholder="Phone number">
                </div>
                <div class="form-group">
                    <label for="doctorEmail">Email:</label>
                    <p>The email address of the doctor</p>
                    <input type="email" id="doctorEmail" name="RemovedoctorEmail" value="<?php echo $SearcheddoctorEmail; ?>" placeholder="Email address">
                </div>
                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="RemoveDoctor">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
