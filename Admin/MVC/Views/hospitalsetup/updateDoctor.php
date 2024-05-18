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
if(isset($_GET['updateDoctor'])) {
    // Sanitize input before using it in SQL queries
    $id = $_GET['UpdatedoctorId'];
    $name = $_GET['UpdatedoctorName'];
    $age = $_GET['UpdatedoctorAge'];
    $gender = $_GET['UpdatedoctorGender'];
    $phone = $_GET['UpdatedoctorPhone'];
    $email = $_GET['UpdatedoctorEmail'];
    
    // Call the function to update doctor information
    $updateStatus = updateDoctorInfo($id, $name, $age, $gender, $phone, $email);
    if ($updateStatus) {
        $mass = "Doctor information updated successfully!";
    } else {
        $mass = "Failed to update doctor information.";
    }
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Update Doctor Information</title>
</head>
<body>
    <div class="container">
        <div class="UpdateDoctorInfo">
            <form method="GET">
                <div class="updateHeader">
                    <h1>Update The Doctor Info.</h1>
                    <div class="searchById">
                        <!-- Search by ID option -->
                        <input type="text" id="searchByIdInput" placeholder="Search by ID" name="SearchbyID">
                        <button type="submit" id="searchByIdButton" name="searchByIdButton">Search</button>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="doctorName">Name:</label>
                    <p>Enter the updated name of the doctor</p>
                    <input type="text" id="doctorName" name="UpdatedoctorName" value="<?php echo $SearcheddoctorName; ?>" placeholder="Enter updated name">
                </div>
                <div class="form-group">
                    <label for="doctorId">ID:</label>
                    <p>This is the unique ID of the doctor</p>
                    <input type="text" id="doctorId" name="UpdatedoctorId" placeholder="Enter doctor ID" value="<?php echo $SearcheddoctorId; ?>" readonly>
                </div>
                <div class="form-group">
                    <label for="doctorAge">Age:</label>
                    <p>Enter the updated age of the doctor</p>
                    <input type="number" id="doctorAge" name="UpdatedoctorAge" value="<?php echo $SearcheddoctorAge; ?>" placeholder="Enter updated age">
                </div>
                <div class="form-group">
                    <label for="doctorGender">Gender:</label>
                    <p>Select the updated gender of the doctor</p>
                    <select id="doctorGender" name="UpdatedoctorGender">
                        <option value="male" <?php if ($SearcheddoctorGender == 'male') echo 'selected'; ?>>Male</option>
                        <option value="female" <?php if ($SearcheddoctorGender == 'female') echo 'selected'; ?>>Female</option>
                        <option value="other" <?php if ($SearcheddoctorGender == 'other') echo 'selected'; ?>>Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="doctorPhone">Phone:</label>
                    <p>Enter the updated phone number of the doctor</p>
                    <input type="text" id="doctorPhone" name="UpdatedoctorPhone" value="<?php echo $SearcheddoctorPhone; ?>" placeholder="Enter updated phone number">
                </div>
                <div class="form-group">
                    <label for="doctorEmail">Email:</label>
                    <p>Enter the updated email address of the doctor</p>
                    <input type="email" id="doctorEmail" name="UpdatedoctorEmail" value="<?php echo $SearcheddoctorEmail; ?>" placeholder="Enter updated email address">
                </div>

                <!-- Additional fields can be added here -->

                <div class="mass"><p><?php echo $mass;?></p></div>
                <button type="submit" name="updateDoctor">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>