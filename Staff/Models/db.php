<?php
class db{
function OpenCon()
 {
        $dbhost = "localhost";
        $dbuser = "root";
        $dbpass = "";
        $db = "HMS";

        $conn = new mysqli($dbhost, $dbuser, $dbpass,$db);
        return $conn;
 }


function Reg($conn,$Name,$Email,$Gender,$Username,$Password,$Contact,$photo)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO Staff (Name,Email,Gender,Username,Password,Contact,Photo) VALUES(?,?,?,?,?,?,?)"); 
   $stmt->bind_param("sssssss",$Name,$Email,$Gender,$Username,$Password,$Contact,$photo);

   if($stmt->execute())
   {
       echo "New Account Created for Staff";
       $check=true;
   }

   else 
   {
       echo "Already have an account!!!<br>";
       echo $stmt->error;
   }

   $stmt->close();
   return $check;
}

function Login($conn,$Username,$Password)
 {
    $result = $conn->query("SELECT * FROM Staff WHERE Username='". $Username."' AND Password='". $Password."'");

        if ($result->num_rows > 0)
        {
            echo "Login Successful <br>";
        }
        else {
        echo "Login Failed !<br>";
        }
    return $result;
}

function ShowData($conn,$User)
{
    $result = $conn->query("SELECT * FROM Staff WHERE Username='". $User."' AND Username='". $User."'");
    return $result;
}

function ShowEquipements($conn)
{
    $result = $conn->query("SELECT * FROM equipement");
    return $result;
}

function ShowEq($conn)
{
    $result = $conn->query("SELECT * FROM equipement_info");
    return $result;
}

function ShowBills($conn)
{
    $result = $conn->query("SELECT * FROM hospitalbills");
    return $result;
}

function AdminList($conn)
{
    $result = $conn->query("SELECT * FROM admins");
    return $result;
}

function DoctorList($conn)
{
    $result = $conn->query("SELECT * FROM doctors_db");
    return $result;
}

function PatientList($conn)
{
    $result = $conn->query("SELECT * FROM patients");
    return $result;
}

function ShowAppointment($conn,$User)
{
    $result = $conn->query("SELECT * FROM appointment WHERE Username='". $User."' AND Username='". $User."'");
    return $result;
}

function Update($conobj,$Name,$Email,$Username,$Password,$Phone)
{
    $sql = "Update Staff SET Name='$Name',Contact='$Phone',Email='$Email',Password='$Password' WHERE Username='$Username'";
    if ($conobj->query($sql) === TRUE) {
      
       $result= TRUE;
   } 
   else {
       $result= FALSE ;
       
   }
   return  $result;
}







function Search($conn,$Name)
{
    $result = $conn->query("SELECT * FROM equipement_info WHERE Name like '%".$Name."%' ");
    return $result;
}
 

function PostNotice($conn,$title,$body)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO notice (Title,Body) VALUES(?,?)"); 
   $stmt->bind_param("ss",$title,$body);
   if($stmt->execute())
   {
       echo "Notice Posted Successfully!!";
       $check=true;
   }
   else 
   {
       echo $stmt->error;
   }
   $stmt->close();
   return $check;
}

function Buy($conn,$name,$price,$date)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO equipement (Name,Price,Date) VALUES(?,?,?)"); 
   $stmt->bind_param("sss",$name,$price,$date);
   if($stmt->execute())
   {
       echo "Buy Successfully!!";
       $check=true;
   }
   else 
   {
       echo $stmt->error;
   }
   $stmt->close();
   return $check;
}

function Bill($conn,$month,$utility,$salary,$total)
{
   $check=false;
   $stmt=$conn->prepare("INSERT INTO hospitalbills (Month,Utility,EmployeeSalary,TotalBill) VALUES(?,?,?,?)"); 
   $stmt->bind_param("ssss",$month,$utility,$salary,$total);
   if($stmt->execute())
   {
       echo "Added Successfully!!";
       $check=true;
   }
   else 
   {
       echo $stmt->error;
   }
   $stmt->close();
   return $check;
}




function ShowNotice($conn)
 {
$result = $conn->query("SELECT * FROM  Notice");
return $result;
 }


 
 


function CloseCon($conn)
 {
    $conn -> close();
 }

}