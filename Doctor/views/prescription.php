<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>PRESCRIPTION</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    
    <style type="text/css">
        * {
            margin: 0px;
            padding: 0px;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
            font-family: Arial, sans-serif;
        }

        .nav {
            background-color: floralwhite;
            margin: 10px;
            padding: 0px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        a {
            text-decoration: none;
            border: none;
            margin: 10px;
        }

        a:hover {
            background-color: darkblue;
            color: white;
        }

        a:active {
            background-color: black;
        }

        p {
            color: lightblue;
        }

        .prescription-box {
            border: 2px solid #ccc;
            padding: 10px;
            margin-top: 20px;
            width: 80%;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
            background-color: white;
        }

        input, textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: darkblue;
            color: white;
            border: none;
            cursor: pointer;
            width: 100%;
            margin-top: 10px;
        }

        button:hover {
            background-color: blue;
        }

        button:active {
            background-color: black;
        }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo col-2">
            <img src="capture.png" alt="logo">
        </div>

        <div class="nav-bar col-6">
            <a href="home.php">Home</a>
            <a href="About.php">About</a>
            <a href="appointment.php">Appointment</a>
            <a href="review.php">Review</a>
            <a href="contactUs.php">Contact us</a>
            <a href="login.php">LOGIN</a>
        </div>
    </div>
    <hr>

    <h1>Prescription</h1>

    <div class="prescription-box">
        <h2>Enter Prescription Details</h2>
        <label for="doctorName">Doctor's Name:</label>
        <input type="text" id="doctorName" name="doctorName">
        
        <label for="patientName">Patient's Name:</label>
        <input type="text" id="patientName" name="patientName">
        
        <label for="medication">Medication:</label>
        <textarea id="medication" name="medication"></textarea>
        
        <label for="dosage">Dosage:</label>
        <input type="text" id="dosage" name="dosage">
        
        <label for="instructions">Instructions:</label>
        <textarea id="instructions" name="instructions"></textarea>
        
        <button onclick="displayPrescription()">Display Prescription</button>
    </div>

 
    <div class="prescription-box" id="prescriptionBox"></div>
    
        <button onclick="printPrescription()" style="display: none;" id="printButton">Print Prescription</button>

        <script>
            function displayPrescription() {
                var doctorName = document.getElementById('doctorName').value;
                var patientName = document.getElementById('patientName').value;
                var medication = document.getElementById('medication').value;
                var dosage = document.getElementById('dosage').value;
                var instructions = document.getElementById('instructions').value;
            
            var prescription = `
                <h2>Prescription Details</h2>
                <p><strong>Doctor's Name:</strong> ${doctorName}</p>
                <p><strong>Patient's Name:</strong> ${patientName}</p>
                <p><strong>Medication:</strong> ${medication}</p>
                <p><strong>Dosage:</strong> ${dosage}</p>
                <p><strong>Instructions:</strong> ${instructions}</p>
            `;
            
            document.getElementById('prescriptionBox').innerHTML = prescription;
            document.getElementById('printButton').style.display = 'block';
        }

        function printPrescription() {
            var printContents = document.getElementById('prescriptionBox').innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
            window.location.reload();
        }
    </script>
</body>
</html>
