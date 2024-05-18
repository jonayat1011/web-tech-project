<?php
include("../Model/db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $name=$_REQUEST["name"];
    $price=$_REQUEST["price"];
    $date=$_REQUEST["date"];

    if($name !=null && $price!=null){

        $connection=new db();
        $conobj=$connection->OpenCon();
        $userQuery=  $connection->Buy($conobj,$name,$price,$date);
        if($userQuery==true){
            header("location: ../View/BuyHistopy.php");
        }
        $connection->CloseCon($conobj);
    }



}
   



?>