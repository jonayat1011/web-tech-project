<?php
session_start(); 
?>
<!DOCTYPE HTML>
<html>
<head>
    <title>DOCTOR SIGN-IN</title>
    <style type="text/css">
        *{
            background-color: lightblue;
        }
        .signin{
                    border: 100px;
                    margin: 150px;
        



        }


    </style>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
</head>
<body >
    <form method="post" action="../controllers/signupcontroller.php">
    <div class="signin" align="center" >
    <p> Welcome to Sign-Up page </p> <br>
    <p1> SIGN-IN </p1> <br>
    <input type="text" name="name" placeholder="NAME:"><br>
    <input type="text" name="id" placeholder="ID:"> <br>
    <input type="PASSWORD" name="pass" placeholder=" PASSWORD: "><br> 

    <button name="sign">Sign-Up</button>
    <button name="log">Login</button>

    </form>
    </div>
</body>
</html> 
