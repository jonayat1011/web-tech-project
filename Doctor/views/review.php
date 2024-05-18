<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ABOUT</title>
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

                .review-box {
                    border: 2px solid #ccc;
                    padding: 10px;
                    margin-top: 20px;
                    width: 80%;
                    max-width: 600px; 
                    margin-left: auto;
                    margin-right: auto;
                    background-color: white;
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

    <h1>Review</h1>

    <input type="text" name="rev" id="reviewInput">
    
    <button onclick="displayReview()">Display Review</button>

    <!-- Box to display review -->
    <div class="review-box" id="reviewBox"></div>

    <script>
        function displayReview() {
            var review = document.getElementById('reviewInput').value;
            document.getElementById('reviewBox').innerText = review;
        }

    </script>
    <div class ="fb">
<script
src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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

</body>
</html>
