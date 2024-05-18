<?php

require_once('db.php'); // Assuming this file contains the database connection logic
    
 
 function doctornamefromdb(){

            $con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM `doctor` ";
    $res = mysqli_query($con, $sql);

     return  $res;
 }

 function doctorspecialty(){

            $con = conn(); // Assuming this function establishes a database connection


    $sql = "SELECT * FROM `doctor` ";
    $res1 = mysqli_query($con, $sql);

     return  $res1;
 }

 function AddAppointment (){

   $con = conn(); // Assuming this function establishes a database connection
    $sql = "INSERT INTO `book_appointment`(`Doctor_name`, `Doctor_Specialty`, `appointment_date`, `appointment_time`) VALUES ('$doctorName','$doctorSpecialty','$doctorDate','$doctorTime')";
    $res1 = mysqli_query($con, $sql);
    if(!$res1){


return  false;
}else{
return  true;

 }
}

///////////


 ?>

