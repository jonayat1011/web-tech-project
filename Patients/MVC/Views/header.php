
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <style>
        
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

<script>
    function openNotification() {
        window.open('notification-page.html', '_blank');
    }

    function openProfile() {
         window.open('profile-page.html', '_blank');
    }


    function openHome() {
        
        window.open('../../../Home/MVC/Views/home.php', '_blank');

    }
    function openappointment() {
       
        window.location.href = 'appointment.php';
    }

    function openviewmedicalreport() {
        
        window.location.href = 'viewmedicalreport.php';

    }

    function openprescriptionrefills() {
        
        window.location.href = 'prescriptionrefills.php';
    }

    function openbilling() {
        
        window.location.href = 'billing.php';
    }

    function openhealthtips() {
        
        window.location.href = 'healthtips.php';

    }
     function openappointmentremainder() {
       
        window.location.href = 'appointmentremainder.php';

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

</script>
</body>
</html>
