
<?php

include("../Model/db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    
    if ($username == null || $password == null)
    {
        echo "<center><h2>Invalid Username/Password!! </center></h2><br>";
    }
    else
    {



    $connection=new db();
    $conobj=$connection->OpenCon();
    $result=$connection->Login($conobj,$username,$password);

    date_default_timezone_set('Asia/Dhaka'); 
    $DateAndTime2 = date('m-d-Y h:i:s a', time());  

    if ($result->num_rows > 0)
    {
       while($row = $result->fetch_assoc())
       {
    
       $_SESSION['Name']= $row["Name"];
       $_SESSION["Username"]=$row["Username"];
       $_SESSION['Mobile']=$row["Contact"];
       }

    }
}
}
?>

