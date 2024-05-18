<?php   
include("../Model/db.php");
if($_SERVER['REQUEST_METHOD']=="POST")
{
            $name = $_REQUEST['name']; 
            $username = $_REQUEST['username']; 
            $password = $_REQUEST['password']; 
            $email = $_REQUEST['email'];
             $contact = $_REQUEST['phone'];
            $gender = "";
    
            if ($email == null || $contact == null || $name == null)
            {
                echo "<center><h2>Missing Information!</center></h2> <br>";
            }
            else
            {
                if(isset($_REQUEST['gender'])){
                    $gender=$_REQUEST['gender'];
                
                    $target_File="../Asset/Photo/".$_FILES["fileupload"]["name"];
                if(move_uploaded_file($_FILES["fileupload"]["tmp_name"],$target_File))
                {
                            
                        $connection=new db();
                        $conobj=$connection->OpenCon();
                        $userQuery=  $connection->Reg($conobj,$name,$email,$gender,$username,$password,$contact,$target_File);
                        if($userQuery==true){
                            header("location: ../View/Login.php");
                        }
                        $connection->CloseCon($conobj);
                }
            }
                



                // $data = $id."|".$email."|".$phone."|".$password."|".$name."|".$gender."\r\n";
                // $file = fopen('../model/admin.txt','a');
                // fwrite($file,$data);   
                // header('location: ../view/login.html');
            }
        }
?>