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
                        background: linear-gradient(to right, #fff, #f0f0f0); 
                    }

                    .nav {
                        background-color: floralwhite;
                        margin: 10px;
                        padding: 0px;
                        display: flex;
                        justify-content: space-between;
                        align-items: center;
                        border-bottom: 2px solid #ccc;
                    }

                    a {
                    text-decoration: none;
                     border: none;
                    margin: 10px;
                     color: black; 
                    transition: background-color 0.3s ease; 
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
            margin: 20px; 
        }

        .about-me {
            text-align: center;
            margin-top: 20px;
        }

        h2 {
                    border-bottom: 2px solid #ccc; 
                     display: inline-block;
                    padding-bottom: 5px;
                    margin-bottom: 10px;
                     position: relative;
                  } 

                h2::after {
                    content: '';
                    position: absolute;
                    width: 30%;
                    height: 2px;
                    background-color: darkblue;
                    bottom: -2px;
                    left: 35%;
                }

        .hee {
            display: block;
            margin: 20px auto;
            max-width: 80%; 
            border: 2px solid #ccc; 
            border-radius: 10px; 
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); 
            transition: transform 0.3s ease; 
        }

        .hee:hover {
            transform: scale(1.4); 
                 }
    </style>
</head>
<body>
    <div class="nav">
        <div class="logo col-2">
            <img src="capture.png" alt="logo">
        </div>
        
            <h1>About 
              
            </h1>

        <div class="nav-bar col-6">
            <a href="home.php">Home</a>
            <a href="About.php">About</a>
            <a href="appointment.php">Appointment</a>
            <a href="review.php">Review</a>
            <a href="contactUs.php">Contact us</a>
            <a href="http://localhost/Project/login.php">LOGIN</a>
        </div>
    </div>
    <hr>
    <div class="about-me">
        <h2>About Us</h2>
    </div>
                    <p>This is the about us section. Here, everything about the hospital is written.</p>
                    <img class="hee" src="hee.jpg" alt="Hospital" />
                    <hr class="dotted-hr">       
                </body>
                </html>
