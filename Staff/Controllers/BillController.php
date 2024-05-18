<?php
include("../Model/db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $month=$_REQUEST["month"];
    $utility=$_REQUEST["utility"];
    $salary=$_REQUEST["salary"];

    if($month !=null && $utility!=null){

        $utilityInt = floatval($utility);
        $salaryInt=floatval($salary);
        $Total=$utilityInt+$salaryInt;

        $connection=new db();
        $conobj=$connection->OpenCon();
        $userQuery=  $connection->Bill($conobj,$month,$utility,$salary,$Total);
        if($userQuery==true){
            header("location: ../View/BillHistory.php");
        }
        $connection->CloseCon($conobj);
    }



}
   



?>