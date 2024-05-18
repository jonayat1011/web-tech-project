<?php
require_once('../Models/alldb.php');
session_start();
$name=$_POST['name'];
$age=$_POST['age'];

$status5=add2($name,$age)
if($status5)
{
	   
   echo "ADD";


}
else
{
	echo "Not Possible";
}

?>