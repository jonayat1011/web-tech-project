<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

$mass = ""; // Initialize the variable to prevent undefined variable error
unset($_SESSION['AddPatientmess']);

if(isset($_POST['addPatient'])){
    // Retrieve form data
    $patientName = $_POST['patientName'];
    $patientId = $_POST['patientId'];
    $patientPassword = $_POST['patientPassword'];
    $patientAge = $_POST['patientAge'];
    $patientGender = $_POST['patientGender'];
    $patientPhone = $_POST['patientPhone'];
    $patientEmail = $_POST['patientEmail'];

    // Perform validation
    if(empty($patientName) || empty($patientId) || empty($patientPassword) || empty($patientAge) || empty($patientGender) || empty($patientPhone) || empty($patientEmail)) {
        $mass = "Please fill in all the fields.";
    } elseif(!filter_var($patientEmail, FILTER_VALIDATE_EMAIL)) {
        $mass = "Invalid email format.";
    } else {
        // If all validations pass, add patient to database
        $res = addPatientToDatabase($patientName, $patientId, $patientPassword, $patientAge, $patientGender, $patientPhone, $patientEmail);
        if (!$res) {
            if(isset($_SESSION['AddPatientmess'])) {
                $mass = $_SESSION['AddPatientmess'];
                unset($_SESSION['AddPatientmess']);
            }
        } else {
            if(isset($_SESSION['AddPatientmess'])) {
                $mass = $_SESSION['AddPatientmess'];
                unset($_SESSION['AddPatientmess']);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Add New Patient</title>
</head>
<body>
    <div class="container">
        <div class="AddNewPatient">
            <h1>Add New Patient</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="patientName">Name:</label>
                    <p>Enter the name of the patient</p>
                    <input type="text" id="patientName" name="patientName" required>
                </div>
                <div class="form-group">
                    <label for="patientId">ID:</label>
                    <p>Enter the unique ID of the patient</p>
                    <input type="text" id="patientId" name="patientId" required>
                </div>
                <div class="form-group">
                    <label for="patientPassword">Password:</label>
                    <p>Enter a secure password for the patient</p>
                    <input type="password" id="patientPassword" name="patientPassword" required>
                </div>
                <div class="form-group">
                    <label for="patientAge">Age:</label>
                    <p>Enter the age of the patient</p>
                    <input type="number" id="patientAge" name="patientAge" required>
                </div>
                <div class="form-group">
                    <label for="patientGender">Gender:</label>
                    <p>Select the gender of the patient</p>
                    <select id="patientGender" name="patientGender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="patientPhone">Phone:</label>
                    <p>Enter the phone number of the patient</p>
                    <input type="text" id="patientPhone" name="patientPhone" required>
                </div>
                <div class="form-group">
                    <label for="patientEmail">Email:</label>
                    <p>Enter the email address of the patient</p>
                    <input type="email" id="patientEmail" name="patientEmail" required>
                </div>
                <div class="mass"><p><?php echo $mass; ?></p></div>
                <button type="submit" name="addPatient">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
