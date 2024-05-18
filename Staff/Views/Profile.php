<?php 
session_start();
include("header.php");
include("../Model/db.php");

?>

<?php
$User="";
$radio1=$radio2=$radio3="";
$Email=$User=$Phone=$Address=$Date=$photo=$Speciality="";
$Image="";
$connection = new db();
$conobj=$connection->OpenCon();
$userQuery=$connection->ShowData($conobj,$_SESSION["Username"]);

if ($userQuery->num_rows > 0) {

    // output data of each row
    while($row = $userQuery->fetch_assoc()) {
      $Name=$row["Name"];
      $Email=$row["Email"];
      $User=$row["Username"];
      $Pass=$row["Password"];
      $Phone=$row["Contact"];
      $Image=$row["Photo"];
  } 
}




?>
<!DOCTYPE html>
<html>

<head>
    
<div class = 'header sticky'> 
<link rel="stylesheet" type="text/css" href="../CSS/Design2.css">
<center><h1 font color='white'> Management Board</h1> </center>
</div> 


    <title> update </title>
    <style>
        fieldset{
            margin-left:30%;
            margin-right:30%;
            margin-top:50px;
            background-color: #99ddff;
        }
        input{
            border-radius:5px;
            font-size:15px;

            
        }
        .err{
            color:red;
            font-size:12px;
        }
        body{
            background-image: url('Media/4.jpg');
        }
        a{
            color:black;
        }
        img{
            border-radius:20px;
            width:160px;
            margin-bottom:20px;
        }
        input{
            border:none;
        }
     
    </style>
</head>

<body style="background-color:#a3dcf1;">


    <form method="post" action="" enctype="multipart/form-data">
     

        
       <fieldset>
    <legend><b>View Profile Information</b></legend><br>
    
          
     
          <table> 
            <tr>
                <td></td>
                <td></td>
                <td>

                <a href="Profile.php"> <img src="<?php echo $Image;?>" height="150" width="200" style="border-radius: 60%;"></a>
                </td>
            </tr>

            <tr>
                <td>Name : <br><br></td>
                <td> <input type="text" name="name" class="form-control" value="<?php echo $Name; ?>" readonly/> </td>
                
                <br><br>
            </tr>
         
            <tr>
                <td>
                <label>Email :<br><br> </label></td>
                <td>  <input type="text" name="email" class="form-control" value="<?php echo $Email; ?>"readonly/><br><br> </td>
                
                
            </tr>

            <tr>
                <td>
                <label>User Name : <br><br></label></td>
                <td> <input type="text" name="userName" class="form-control" value="<?php echo $User; ?>" readonly/><br><br> </td>
               
            </tr>
            <tr>
                <td>
                <label>Phone Number : <br><br></label></td>
                <td> <input type="text" name="phone" class="form-control" value="<?php echo $Phone; ?>" readonly/><br><br> </td>
                
            </tr>

            <tr>
                <td>
                <label>Password : <br><br></label></td>
                <td> <input type="password" name="password" class="form-control" value="<?php echo $Pass;?>"readonly/><br> <br></td>
                
            </tr>

            <tr>
                <td></td>
                <td class="btn">
               <a href="UpdateProfile.php">Update Profile</a>
                </td>
               
            </tr>
            
           

          
            </table>
           
        </fieldset>
       
    </form>

    
    <br />
</body>

</html>