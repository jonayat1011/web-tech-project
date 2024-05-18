<?php 
session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');

$mass = ""; // Initialize the variable to prevent undefined variable error
 unset($_SESSION['AddDoctormess']);
if(isset($_POST['addDoctor'])){
	$doctorName = $_POST['doctorName'];
    $doctorId = $_POST['doctorId'];
    $doctorPassword = $_POST['doctorPassword'];
    $doctorAge = $_POST['doctorAge'];
    $doctorGender = $_POST['doctorGender'];
    $doctorPhone = $_POST['doctorPhone'];
    $doctorEmail = $_POST['doctorEmail'];

    $res = addDoctorToDatabase($doctorName, $doctorId, $doctorPassword, $doctorAge, $doctorGender, $doctorPhone, $doctorEmail);
    if (!$res) {
        if(isset($_SESSION['AddDoctormess'])) {
            $mass = $_SESSION['AddDoctormess'];
            unset($_SESSION['AddDoctormess']);
        }
    } else {
        if(isset($_SESSION['AddDoctormess'])) {
            $mass = $_SESSION['AddDoctormess'];
            unset($_SESSION['AddDoctormess']);
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="HospitalsetupoperationStyles.css">
    <title>Add New Doctor</title>
</head>
<body>
    <div class="container">
        <div class="AddNewDoctor">
            <h1>Add New Doctor</h1>
            <form method="post" action="">
                <div class="form-group">
                    <label for="doctorName">Name:</label>
                    <p>Enter the name of the doctor</p>
                    <input type="text" id="doctorName" name="doctorName" required>
                </div>
                <div class="form-group">
                    <label for="doctorId">ID:</label>
                    <p>Enter the unique ID of the doctor</p>
                    <input type="text" id="doctorId" name="doctorId" required>
                </div>
                <div class="form-group">
                    <label for="doctorPassword">Password:</label>
                    <p>Enter a secure password for the doctor</p>
                    <input type="password" id="doctorPassword" name="doctorPassword" required>
                </div>
                <div class="form-group">
                    <label for="doctorAge">Age:</label>
                    <p>Enter the age of the doctor</p>
                    <input type="number" id="doctorAge" name="doctorAge" required>
                </div>
                <div class="form-group">
                    <label for="doctorGender">Gender:</label>
                    <p>Select the gender of the doctor</p>
                    <select id="doctorGender" name="doctorGender" required>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                        <option value="other">Other</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="doctorPhone">Phone:</label>
                    <p>Enter the phone number of the doctor</p>
                    <input type="text" id="doctorPhone" name="doctorPhone" required>
                </div>
                <div class="form-group">
                    <label for="doctorEmail">Email:</label>
                    <p>Enter the email address of the doctor</p>
                    <input type="email" id="doctorEmail" name="doctorEmail" required>
                </div>
                <div class="mass"><p><?php echo $mass; ?></p></div>
                <button type="submit" name="addDoctor">Submit</button>
            </form>
        </div>
    </div>
</body>
</html>
