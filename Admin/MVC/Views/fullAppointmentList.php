<?php
session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/appointmentController.php'); // Assuming you have an appointment controller

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointments List</title>
    <style>
        .centeredBox {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="ListOfAppointments" id="appointmentsList">
        <div class="updateHeader" onclick="toggleAppointmentsList()">
            <h1>List Of Appointments</h1>
        </div>
        <div class="centeredBox" id="appointmentsContent" style="display: none;">
            <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Appointment ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Date</th>
            <th>Time</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $res = appointmentsList(); // Assuming this function retrieves appointments
        $count = 0;
        while ($row = mysqli_fetch_assoc($res)) { 
            $count++;
            ?>
            <tr>
                <td><?php echo $count; ?></td>
                <td><?php echo $row["appointment_id"]; ?></td>
                <td><?php echo $row["patient_id"]; ?></td>
                <td><?php echo $row["doctor_id"]; ?></td>
                <td><?php echo $row["appointment_date"]; ?></td>
                <td><?php echo $row["appointment_time"]; ?></td>
                <td><?php echo $row["appointment_status"]; ?></td>
            </tr>
        <?php     
        }
        ?>
    </tbody>
</table>

        </div>
    </div>

    <script>
        function toggleAppointmentsList() {
            var content = document.getElementById("appointmentsContent");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</body>
</html>
