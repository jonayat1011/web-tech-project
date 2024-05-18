<?php 


if (isset($_POST["Update"])) {
   
   $Name=$_REQUEST["name"];
   $Username=$_REQUEST["userName"];
   $Email=$_REQUEST["email"];
   $Phone=$_REQUEST["phone"];
   $Password=$_REQUEST["password"];

   $connection=new db();
   $conobj=$connection->OpenCon();
   $userQuery=  $connection->Update($conobj,$Name,$Email,$_SESSION["Username"],$Password,$Phone);
   if($userQuery==true){
       header("location: ../View/UpdateProfile.php");
   }
   $connection->CloseCon($conobj);
}


?>