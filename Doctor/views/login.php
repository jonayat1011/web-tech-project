<?php
session_start(); 
$serverName="localhost";
    $userName="root";
    $pass="";
    $dbName="doctor";
    $conn=new mysqli($serverName,$userName,$pass,$dbName);
if(isset($_POST['log'])){
    if(empty($_POST['name'])|| empty($_POST['id'])|| empty($_POST['pass']) )
            {
                echo "FILL UP FORM";

            }
            else
            {
                $id2= $_POST['id'];
                $name2=$_POST['name'];
                  $pass2=$_POST['pass'];


            $sql3="select * from docnm where Id='$id2' and Name='$name2'";
      $res4=mysqli_query($conn,$sql3);
      
      if($res4-> num_rows> 0)
      {
         echo "Valid User";
   header("location:../views/home.php") ;
      }
      else
      {
         echo "invalid";
      }
 
   }
            }





?>
<!DOCTYPE HTML>
<html>
<head>
    <title>DOCTOR LOGIN</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
  
        p1{
            color: rgb(19, 211, 211);
            font-family: hidden;
            margin-top: 10px;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;

        }
        body {
            background-image: url('bg.jpg');
            background-repeat: no-repeat;
              background-size: cover;

            }

    
    
    </style>
</head>
<body >
    <form method="post">
    <div align="center" >
    <p> Welcome to login page </p> <br>
    <p1> LOGIN </p1> <br>
    <input type="text" name="name" placeholder="NAME:"><br>
    <input type="text" name="id" placeholder="ID:"> <br>
    <input type="PASSWORD" name="pass" placeholder=" PASSWORD: "><br> 
    <button name="log">LOGIN</button>
    </form>
    </div>
</body>
</html> 
