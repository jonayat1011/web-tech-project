
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <style>
        
    </style>
</head>
<body>

    <nav>
        <div>
            <button class="navButton" onclick="openHome()">
                <img src="img/home" alt="Home">
                <span>Home</span>
            </button>
            <button class="navButton" onclick="openappointment()">
                <img src="img/appointment.png" alt="appointment">
                <span>appointment</span>
            </button>
            <button class="navButton" onclick="openviewmedicalreport()">
                <img src="img/view medical report.PNG" alt="view medical report">
                <span>view medical report</span>
            </button>
            <button class="navButton" onclick="openprescriptionrefills()">
                <img src="img/prescription refills.png" alt="prescription refill">
                <span>prescription refills</span>
            </button>
            <button class="navButton" onclick="openbilling()">
                <img src="img/billing.png" alt="billing">
                <span>billing</span>
            </button>
            <button class="navButton" onclick="openhealthtips()">
                <img src="img/health tips.png" alt="health tips">
                <span>health tips</span>
            </button>
            <button class="navButton" onclick="openappointmentremainder()">
                <img src="img/appointment remainder.png" alt="appointment remainder">
                <span>appointment remainder</span>
            </button>
            <button class="navButton" onclick="logout()">
                <img src="img/logout.png" alt="Logout">
                <span>Logout</span>
            </button>
        </div>
    </nav>


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
        
        window.location.href = '../../../Home/MVC/Views/home.php';
    }

</script>
</body>
</html>
