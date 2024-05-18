<?php 

function conn()
{
  $serverName="localhost";
    $userName="root";
    $pass="";
    $dbName="doctor";
    $conn=new mysqli($serverName,$userName,$pass,$dbName);
    return $conn;
}



?>