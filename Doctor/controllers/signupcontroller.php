<?php
require_once('../Models/alldb.php');
session_start();
$id=$_POST['id'];
$pass=$_POST['pass'];
$name=$_POST['name'];

$status=signup($id,$pass,$name);
if($status)
{
	   //header("location:../views/signup.php") ;

   echo '<script type ="text/JavaScript">';  
echo 'alert("Please fill up the form")';  
echo '</script>'; 


}
else
{
	echo '<script type ="text/JavaScript">'; 
            echo 'alert("SIGNUP DONE")'; 
             echo '</script>'; 
   //header("location:../views/login.php") ;
}
$status2=login($id,$pass,$name);

?>