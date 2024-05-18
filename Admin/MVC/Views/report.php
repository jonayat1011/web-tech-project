<?php

session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/dashboardController.php');

?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <style>
        .userIdentity {
    width: 100%; /* Fixed width */
    padding: 4px;
    border: 1px solid #ccc;
    margin-bottom: 10px;
    box-sizing: border-box;
    border-radius: 8px;
    overflow-x: auto; /* Enable horizontal scrolling if necessary */
    background-color: #f2dede; /* Light Red */
    height: 40px; /* Fixed height */
    display: flex; /* Use flexbox */
    align-items: center; /* Align items vertically center */
}
    .sideButton {
        display: inline-block; /* Display as inline-block to arrange them side by side */
        width:100%; /* Adjust width to fit two buttons in a row with spacing */
        padding: 10px;
        margin-right: 10px; /* Adjust margin to create space between buttons */
        margin-bottom: 10px; /* Margin bottom for vertical spacing */
        text-align: left;
        background-color: #f0f0f0;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }


    .sideButton:hover {
        background-color: #e0e0e0;
    }    .sideButton span {
        vertical-align: middle;
    }
    </style>
</head>
<body>
<header>
    <div class="logo">
        <img src="img/logo.png" alt="Logo">
    </div>
    <div class="search-container">
        <input  type="text" class="search-bar" placeholder="Search...">
        <button class="search-btn">Search</button>
    </div>
    <div class="Profile">
        <img src="img/notification.jpeg" alt="Notification" class="round-btn" onclick="openNotification()">
        <img src="img/profile.png" alt="Profile" class="round-btn" onclick="openProfile()">
    </div>
</header>
<section>
    <nav>
        <div>
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButton" onclick="openDashboard()">
                <img src="img/dashboard.png" alt="Dashboard">
                <span>Dashboard</span>
            </button>
            <button class="navButton" onclick="openHospitalSetup()">
                <img src="img/hospital.png" alt="Hospital Setup">
                <span>Hospital Setup</span>
            </button>
            <button class="navButton" onclick="openInventory()">
                <img src="img/inventory.png" alt="Inventory">
                <span>Inventory</span>
            </button>
            <button class="navButtonOpen" onclick="openReport()">
                <img src="img/report.png" alt="Report">
                <span>Report</span>
            </button>
            <button class="navButton" onclick="openSettings()">
                <img src="img/settings.png" alt="Settings">
                <span>Settings</span>
            </button>
            <button class="navButton" onclick="logout()">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
        </div>
    </nav>


    <aside>
        <div class="userIdentity">
                <?php $UserName= $_SESSION['name']; ?>
                <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your report today ..</p>
            </div>
<section>
        <button class="sideButton" onclick="openDoctorList()">
            
            <span>Doctor List</span>
        </button>
        <button class="sideButton" onclick="openPatientList()">
        
            <span>Patient List</span>
        </button>
        <button class="sideButton" onclick="openStaffList()">
        
            <span>Staff List</span>
        </button>
        <button class="sideButton" onclick="openAppointmentList()">
            
            <span>Appointment List</span>
        </button>
        <button class="sideButton" onclick="openBillingList()">
           
            <span>Billing List</span>
        </button>
    </section>

    </aside>
</section>

<script>
        function openNotification() {
        // window.open('notification-page.html', '_blank');
    }

    function openProfile() {
        // window.open('profile-page.html', '_blank');
    }


    function openHome() {
        // Add functionality to open home page
        window.open('../../../Home/MVC/Views/home.php', '_blank');

    }
    function openDashboard() {
        // Add functionality to open dashboard page
        window.location.href = 'dashboard.php';
    }

    function openHospitalSetup() {
        // Add functionality to open hospital setup page
        window.location.href = 'hospitalsetup.php';

    }

    function openInventory() {
        // Add functionality to open inventory page
        window.location.href = 'inventory.php';
    }

    function openReport() {
        // Add functionality to open report page
        window.location.href = 'report.php';
    }

    function openSettings() {
        // Add functionality to open settings page
        window.location.href = 'settings.php';

    }
function logout() {
    // Make an AJAX request to logout.php
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'logout.php', true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // Destroy all session variables
                xhr.open('GET', 'logout.php?destroy=true', true);
                xhr.send();
                // Redirect to the home page after successful logout
                window.location.href = '../../../Home/MVC/Views/home.php';
            } else {
                // Handle errors
                console.error('Logout failed:', xhr.responseText);
            }
        }
    };
    xhr.send();
}
function openDoctorList() {
        // Add functionality to open doctor list page
        window.open('hospitalsetup/DoctorList.php', '_blank');
    }

    function openPatientList() {
        // Add functionality to open patient list page
       window.open('hospitalsetup/PatientList.php', '_blank');
    }

    function openStaffList() {
        // Add functionality to open staff list page
       window.open('hospitalsetup/StaffList.php', '_blank');
    }

    function openAppointmentList() {
        // Add functionality to open appointment list page
         window.open('fullAppointmentList.php', '_blank');
    }

    function openBillingList() {
        // Add functionality to open billing list page
        window.open('billinglist.php', '_blank');
    }
</script>
</body>
</html>
