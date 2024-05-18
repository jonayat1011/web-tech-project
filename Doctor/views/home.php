<?php 
session_start(); 

$serverName="localhost";
$userName="root";
$pass="";
$dbName="doctor";
$conn=new mysqli($serverName,$userName,$pass,$dbName);
$sql="select * from pt";
$sql2="select * from docnm";
$sql3="select * from at";

$res= mysqli_query($conn,$sql);
$res2= mysqli_query($conn,$sql2);
$res3= mysqli_query($conn,$sql3);



if(isset($_POST['Srcbtn'])){
    $patientName = $_POST['patientsearch'];
    $age = $_POST['AgeSearch'];

    if(!empty($patientName) && !empty($age)){
        $searchQuery = "SELECT * FROM pt WHERE Name LIKE '%$patientName%' AND Age='$age'";
    } elseif(!empty($patientName)){
        $searchQuery = "SELECT * FROM pt WHERE Name LIKE '%$patientName%'";
    } elseif(!empty($age)){
        $searchQuery = "SELECT * FROM pt WHERE Age='$age'";
    } else {
        $searchQuery = $sql; 
    }

    $res = mysqli_query($conn, $searchQuery);
}

if(isset($_POST['apbtn'])){
    if(empty($_POST['time']) || empty($_POST['date'])){
        echo "Fill up first";
    } else {
        $time = $_POST['time'];
        $date = $_POST['date'];
        $sql4 = "INSERT INTO at (TIME, DATE) VALUES ('$time', '$date')";
        $res4 = mysqli_query($conn, $sql4);
        if($res4){
            echo " Done";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DOCTOR HOME</title>
    <link rel="stylesheet" type="text/css" href="home1.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
        $("button").click(function(){
            $("#div1").fadeOut();
            $("#div2").fadeOut("slow");
            $("#div3").fadeOut(3000);
        });
    });
    </script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    
</head>
<body>
    <div class="nav">
        <div class="logo col-2">
            <img src="capture.png" alt="logo">
        </div>
        <div class="head col-4">
            <h1>WELCOME 
            
            </h1>
        </div>
        <div class="nav-bar col-6">
            <a href="home.php"> Home </a>
            <a href="About.php"> About </a>
            <a href="appointment.php"> Appointment</a>
            <a href="review.php"> Review </a>
            <a href="contactUs.php"> Contact us </a>
            <a href="login.php"> LOGIN </a>
        </div>
    </div>
    <hr>

    <div class="search">
        <form method="post">
            <input type="text" name="patientsearch" placeholder="Patient Name:">
            <input type="text" name="AgeSearch" placeholder="Age:">
            <div class="searchbtn">
                <button type="submit" name="Srcbtn"><span>🔍</span> SEARCH</button>
            </div>
        </form>
    </div>
    <hr class="dotted-hr">

    
    <h4>Total Appointment</h4>

    <div class="table">
        <form method="post">
            <table border="3" bordercolor="lightblue">
                <tr>
                    <th>Patient Name</th>
                    <th>Age</th>
                </tr>
                <?php while($r=mysqli_fetch_assoc($res)){ ?>
                <tr>
                    <td><?php echo $r["Name"] ; ?></td>
                    <td><?php echo $r["Age"] ; ?></td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>
    <hr>
<div class="np">
        <div id="myPlot1" style="width:100%;max-width:700px"></div>
        <script>
        const xArray = [60,70,70,80,90,100,78,89,100,100,100];
        const yArray = [34,24,28,19,20,19,10,16,34,14,33];

        const data1 = [{
            x: xArray,
            y: yArray,
            mode: "dots"
        }];

        const layout = {
            xaxis: {range: [50, 100], title: "Success Rate in %"},
            yaxis: {range: [10, 60], title: "New Patient"},
            title: "New patient success rate"
        };

        Plotly.newPlot("myPlot1", data1, layout);
        </script>
    </div>
    <hr>
    <div class="appslot">
        <h1 class="hhh" style="text-align:left ;">
            APPOINTMENT SLOTS AVAILABLE
        </h1>
    </div>
    <div class="at">
        <form method="post">
            <input type="text" name="time" id="timeInput" placeholder="TIME">
            <input type="text" name="date" id="dateInput" placeholder="DAY"><br><br>
            <button name="apbtn">ADD</button> <br> <br>
            <table border="1" bordecolor="lightblue">
                <th>TIME</th>
                <th>DAY</th>
                <?php while($r3=mysqli_fetch_assoc($res3)){ ?>
                <tr>
                    <td><?php echo $r3["TIME"] ; ?></td>
                    <td><?php echo $r3["DATE"] ; ?></td>
                </tr>
                <?php } ?>
            </table>
        </form>
    </div>

    <div id="myPlot3" style="width:100%;max-width:600px"></div>
    <script>
    const xArr = ["Jan", "Feb", "Mar", "Apr", "May","Jun","July","Aug","Sept","Oct","Nov","Dec"];
    const yArr = [55, 49, 44, 24, 15,45,67,45,35,44,56,37];

    const data = [{
        x: xArr,
        y: yArr,
        type: "bar",
        orientation: "v",
        marker: {color: "rgba(0,0,255,0.6)"}
    }];

    const layout1 = {title: "New Patient"};

    Plotly.newPlot("myPlot3", data, layout1);
    </script>

    <div class="fb">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
        <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
        <script>
        const xValues = ["Very Good", "Good", "Normal", "Bad", "Very Bad"];
        const yValues = [55, 49, 44, 34, 5];
        const barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Feedback"
                }
            }
        });
        </script>
    </div>

    <div class="w3-panel w3-card">
        <p><a href="prescription.php">Prescription</a></p>
    </div>
    <br>
    <div class="doctor-info">
        <h2>About Dr. Ismam</h2>
        <p>Dr. Ismam is a renowned specialist in cardiology. With over 20 years of experience, Dr. Ismam has successfully treated numerous patients and is dedicated to providing the highest quality care.</p>
        <h3>Recent Achievements</h3>
        <ul>
<li>Published groundbreaking research on heart disease prevention.</li>
        <li>Received the Excellence in Cardiology Award from the American Heart Association.</li>
        <li>Presented innovative treatment techniques at international medical conferences.</li>
        </ul>
        <h3>Upcoming Events</h3>
        <ul>
            <li>Speaker at the International Cardiology Summit in June 2024.</li>
        <li>Panelist at the Annual Heart Health Symposium in September 2024.</li>
        <li>Keynote speaker at the World Cardiology Congress in November 2024.</li>
        </ul>
    </div>
</body>
</html>
