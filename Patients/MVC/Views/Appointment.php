<?php

require_once('../Controllers/appointmentcontroller.php');
// Handle form submission
if (isset($_GET['DoctorAppointment'])) {
     $doctorName=$_GET['doctor'];
     $specialty=$_GET['specialty'];
     $date=$_GET['date'];
     $time=$_GET['time'];
     $res = addDoctorAppointmentToDatabase($doctorName, $doctorSpecialty, $doctorDate, $doctorTime);
     if (!$res) {
         
         echo "Failed to add appointment";
     } else {

         echo "Appointment added successfully";
     }
}


$res = doctorname();
$doctors = [];
while ($row = mysqli_fetch_assoc($res)) {
    $doctors[] = $row; // Collect data for JavaScript use
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Appointment Booking</title>
    <link rel="stylesheet" href="Styles.css">
</head>
<body>

<?php include('header.php'); ?>

<section>
    <?php include('sideNavBar.php'); ?>

    <article>
        <div class="container">
            <h1>Appointment Booking</h1>
            <form method="GET" action="">
                <div class="form-group">
                    <label for="doctor">Doctor Name:</label>
                    <select id="doctor" name="doctor" onchange="updateSpecialty()">
                        <option value="">Select a doctor</option>
                        <?php
                        foreach ($doctors as $doctor) {
                            echo '<option value="' . htmlspecialchars($doctor["doctor_username"]) . '">' . htmlspecialchars($doctor["doctor_username"]) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="specialty">Specialty:</label>
                    <input type="text" id="specialty" name="specialty" readonly>
                </div>
                <div class="form-group">
                    <label for="date">Date:</label>
                    <input type="date" id="date" name="date" value="2023-03-22">
                </div>
                <div class="form-group">
                    <label for="time">Time:</label>
                    <input type="time" id="time" name="time" value="10:00 AM">
                </div>
                <button type="submit" name="DoctorAppointment">Book Appointment</button>
            </form>
        </div>
    </article>
</section>

<script>
    // Pass PHP data to JavaScript
    var doctors = <?php echo json_encode($doctors); ?>;

    function updateSpecialty() {
        var selectedDoctor = document.getElementById('doctor').value;
        var specialtyField = document.getElementById('specialty');

        // Find the specialty for the selected doctor
        for (var i = 0; i < doctors.length; i++) {
            if (doctors[i]['doctor_username'] === selectedDoctor) {
                specialtyField.value = doctors[i]['specialty'];
                return;
            }
        }
        specialtyField.value = ''; // Clear specialty if no doctor is selected
    }
</script>

</body>
</html>
