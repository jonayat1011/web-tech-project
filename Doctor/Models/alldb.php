<?php
require_once('db.php');



function add($id,$pass,$name)
{
	$sql1="insert into docnm (id,pass,name) values ('$id','$pass','$name')";
	$con=conn();
	$res= mysqli_query($con,$sql1);
	if($res)
	{
		return true;
	}
	else
	{
		return false;
	}
	

}
function add2($name,$age)
{
        $sql4="insert into pt (name,age) values ('$name','$age')";
    $con=conn();
    $res= mysqli_query($con,$sql4);
    if($res)
    {
        return true;
    }
    else
    {
        return false;
    }
}


function signup($name,$id,$pass)
{	
	   
	    $con=conn();
	
	if(isset($_POST['sign']))
	{
    if(empty($_POST['name'])||empty($_POST['id'])||empty($_POST['pass']))
    {
         return true;

    }
else
    {	
    	 $id=$_POST['id'];
        $name=$_POST['name'];
        $pass=$_POST['pass'];
        $sql2="INSERT INTO docnm VALUES ('$name','$id','$pass')";
        $res2=mysqli_query($con,$sql2);
        if($res2)
        {
             return false;
        }
 
    }

}


}
function login($id,$pass,$name)
{

   header("location:../views/login.php") ;
}
 





 ?>