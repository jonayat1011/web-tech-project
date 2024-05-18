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

.HospitalSetupBody {
    display: flex;
    flex-direction: column;
    border-radius: 8px;
}


.SetupBody {
    width: 100%; /* Adjust width as needed */
    height: auto; /* Adjust height as needed */
    border: 1px solid #000; /* Example border */
    margin-bottom: 10px; /* Adjust spacing between boxes */
    border-radius: 8px;
}

.ChosenOperation {
    width: 55%;
    height: 940px;
    background-color: lightblue; /* Example background color for ChosenOperation */
    border-radius: 8px;
    float: right;
    padding: 20px;
}

.ChosenSetup {
     width: 38%;
    height: 940px;
    background-color:#f2dede; /* Example background color for ChosenSetup */
    border-radius: 8px;
    float: left;
    padding: 20px;
}
.setupButton {
    display: block;
    width: 100%;
    padding: 15px 20px;
    margin: 5px 0 25px;
    border: none;
    border-radius: 5px;
    background-color: #007bff; /* Blue background color for setupButton */
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 18px;
}

.setupButton:hover {
    background-color: #0056b3; /* Darker blue on hover for setupButton */
}

.ChosenOperation button {
    display: block;
    width: 100%;
    padding: 15px 20px;
    margin: 5px 0 25px;
    border: none;
    border-radius: 5px;
    background-color: #28a745; /* Green background color for buttons in ChosenOperation */
    color: white;
    cursor: pointer;
    transition: background-color 0.3s;
    font-size: 18px;
}

.ChosenOperation button:hover {
    background-color: #218838; /* Darker green on hover for buttons in ChosenOperation */
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
            <button class="navButtonOpen" onclick="openHospitalSetup()">
                <img src="img/hospital.png" alt="Hospital Setup">
                <span>Hospital Setup</span>
            </button>
            <button class="navButton" onclick="openInventory()">
                <img src="img/inventory.png" alt="Inventory">
                <span>Inventory</span>
            </button>
            <button class="navButton" onclick="openReport()">
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

   <section class="HospitalSetupBody">
    <div class="userIdentity">
        <?php $UserName= $_SESSION['name']; ?>
        <p><b>Hey! <?php echo $UserName; ?> -</b> here's what's happening with your Hospital Setup today ..</p>
    </div>
    <div class="SetupBody">
        <div class="ChosenSetup">
            <button class="setupButton" data-type="doctor">Doctor Setup</button>
            <button class="setupButton" data-type="patient">Patient Setup</button>
            <button class="setupButton" data-type="staff">Staff Setup</button>
            <button class="setupButton" data-type="department">Department Setup</button>
        </div>
        <div class="ChosenOperation">
            <!-- Additional buttons will be dynamically added here -->
        </div>
    </div>
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


   document.addEventListener("DOMContentLoaded", function() {
    const setupButtons = document.querySelectorAll(".setupButton");

    setupButtons.forEach(button => {
        button.addEventListener("click", function() {
            const type = this.getAttribute("data-type");
            const operationDiv = document.querySelector(".ChosenOperation");
            operationDiv.innerHTML = ""; // Clear existing buttons

            if (type === "doctor") {
                operationDiv.innerHTML += `
                    <button class="operationButton" data-action="addDoctor">Add New Doctor</button>
                    <button class="operationButton" data-action="removeDoctor">Remove Doctor</button>
                    <button class="operationButton" data-action="updateDoctor">Update Doctor Info</button>
                    <button class="operationButton" data-action="doctorList">Doctor List</button>
                `;
            } else if (type === "patient") {
                operationDiv.innerHTML += `
                    <button class="operationButton" data-action="addPatient">Add New Patient</button>
                    <button class="operationButton" data-action="removePatient">Remove Patient</button>
                    <button class="operationButton" data-action="updatePatient">Update Patient Info</button>
                    <button class="operationButton" data-action="patientList">Patient List</button>
                `;
            } else if (type === "staff") {
                operationDiv.innerHTML += `
                    <button class="operationButton" data-action="addStaff">Add New Staff</button>
                    <button class="operationButton" data-action="removeStaff">Remove Staff</button>
                    <button class="operationButton" data-action="updateStaff">Update Staff Info</button>
                    <button class="operationButton" data-action="staffList">Staff List</button>
                `;
            } else if (type === "department") {
                operationDiv.innerHTML += `
                    <button class="operationButton" data-action="addDepartment">Add New Department</button>
                    <button class="operationButton" data-action="removeDepartment">Remove Department</button>
                    <button class="operationButton" data-action="updateDepartment">Update Department Info</button>
                    <button class="operationButton" data-action="departmentList">Department List</button>
                `;
            }
        });
    });

    document.addEventListener("click", function(event) {
        if (event.target.classList.contains("operationButton")) {
            const action = event.target.getAttribute("data-action");
            let location = "";

            switch (action) {
                case "addDoctor":
                    location = "hospitalsetup/addDoctor.php";
                    break;
                case "removeDoctor":
                    location = "hospitalsetup/removeDoctor.php";
                    break;
                case "updateDoctor":
                    location = "hospitalsetup/updateDoctor.php";
                    break;
                case "doctorList":
                    location = "hospitalsetup/DoctorList.php";
                    break;
                case "addPatient":
                    location = "hospitalsetup/addPatient.php";
                    break;
                case "removePatient":
                    location = "hospitalsetup/removePatient.php";
                    break;
                case "updatePatient":
                    location = "hospitalsetup/updatePatient.php";
                    break;
                case "patientList":
                    location = "hospitalsetup/PatientList.php";
                    break;
                case "addStaff":
                    location = "hospitalsetup/addStaff.php";
                    break;
                case "removeStaff":
                    location = "hospitalsetup/removeStaff.php";
                    break;
                case "updateStaff":
                    location = "hospitalsetup/updateStaff.php";
                    break;
                case "staffList":
                    location = "hospitalsetup/StaffList.php";
                    break;
                case "addDepartment":
                    location = "hospitalsetup/addDepartment.php";
                    break;
                case "removeDepartment":
                    location = "hospitalsetup/removeDepartment.php";
                    break;
                case "updateDepartment":
                    location = "hospitalsetup/updateDepartment.php";
                    break;
                case "departmentList":
                    location = "hospitalsetup/DepartmentList.php";
                    break;
                // Add cases for other actions as needed

                default:
                    console.error("Invalid action");
                    break;
            }

            if (location !== "") {
                window.open(location, "_blank");
            }
        }
    });
});

</script>
</body>
</html>
