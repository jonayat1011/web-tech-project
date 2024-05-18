<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>APPOINTMENT</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
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
                color: black;
            }

            .appointment-box {
                border: 2px solid #ccc;
                padding: 10px;
                margin-top: 20px;
                width: 80%;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
                background-color: white;
            }

            input, select {
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

    <h1>Appointment</h1>

    <div class="appointment-box">
        <h2>Schedule an Appointment</h2>
        <label for="name">Full Name:</label>
        <input type="text" id="name" name="name">
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email">
        
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone">
        
        <label for="date">Preferred Date:</label>
        <input type="date" id="date" name="date">
        
        <label for="time">Preferred Time:</label>
        <input type="time" id="time" name="time">
        
        <label for="reason">Reason for Appointment:</label>
        <select id="reason" name="reason">
            <option value="Consultation">Consultation</option>
            <option value="Follow-up">Follow-up</option>
            <option value="New Issue">New Issue</option>
            <option value="Routine Check-up">Routine Check-up</option>
        </select>
        
        <button onclick="displayAppointment()">Display Appointment</button>
    </div>

    <div class="appointment-box" id="appointmentBox"></div>
    
    <button onclick="printAppointment()" style="display: none;" id="printButton">Print Appointment</button>

    <script>
        function displayAppointment() {
            var name = document.getElementById('name').value;
            var email = document.getElementById('email').value;
            var phone = document.getElementById('phone').value;
                var date = document.getElementById('date').value;
                var time = document.getElementById('time').value;
            var reason = document.getElementById('reason').value;

            var appointment = `
                <h2>Appointment Details</h2>
                <p><strong>Full Name:</strong> ${name}</p>
                <p><strong>Email:</strong> ${email}</p>
                <p><strong>Phone Number:</strong> ${phone}</p>
                <p><strong>Preferred Date:</strong> ${date}</p>
                <p><strong>Preferred Time:</strong> ${time}</p>
                <p><strong>Reason for Appointment:</strong> ${reason}</p>
            `;

            document.getElementById('appointmentBox').innerHTML = appointment;
            document.getElementById('printButton').style.display = 'block';
                }

                function printAppointment() {
                    var printContents = document.getElementById('appointmentBox').innerHTML;
                    var originalContents = document.body.innerHTML;

                    document.body.innerHTML = printContents;

                    window.print();

                    document.body.innerHTML = originalContents;
                    window.location.reload();
                }
            </script>
            <div class="w3-panel w3-card">
                <p><a href="prescription.php">Prescription</a></p>
            </div>
        </body>
</html>
