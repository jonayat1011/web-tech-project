<?php
include("../Model/db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
    $title=$_REQUEST["title"];
    $body=$_REQUEST["body"];

    if($title !=null && $body!=null){

        $connection=new db();
        $conobj=$connection->OpenCon();
        $userQuery=  $connection->PostNotice($conobj,$title,$body);
        if($userQuery==true){
            header("location: ../View/CheckNotice.php");
        }
        $connection->CloseCon($conobj);
    }



}
   



?>