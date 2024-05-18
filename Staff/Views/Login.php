<html>
    <head>
   <script src="..\controller\Login.js"></script>
        <title> LOGIN </title>
        <style>
            fieldset{
                background-color:#99ddff;
                width:30%;
                margin: 100 550;
            }  
    input[type=submit] {
      width: 50%;
      background-color: #00aaff;
        font-size:20px;
      padding: 14px 35px;
      margin: 12px 140px;
      cursor: pointer;
      border-radius: 10px;
    }
    
        </style>
    </head>

<?php
 include("PrevHeader.php");
session_start();

include ("../controller/loginValidation.php");

if(isset($_SESSION["Username"])){

  header("location: Dashboard.php");
}

?>

    <form action = "" onsubmit="return Validation()" method = "post" enctype = "">
        <fieldset>
            
            <h2>Please Login</h2>
        <table>
            <tr>
                <td>
                    Username
                </td>
                <td>
                    <input type = "text" name = "username" id="username" value = ""><td id="ErrUName"></td>
                </td>
            </tr>

            <tr>
                <td>
                    Password
                </td>
                <td>
                    <input type = "password" name = "password" id="password" value = ""><td id="ErrPass"></td>
                </td>
            </tr>

        </table>
            <br>
            
            <input type = "submit" name ="" value = "Login">
               
        </fieldset>
    </form>
</html>