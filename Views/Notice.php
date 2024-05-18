<?php 
include("header.php");
    include("../controller/NoticeController.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="../asset/css/design3.css">
    <style>
            .f1{
                width:50%;
                margin-left:25%;
                background-color:#99ddff;
                border-radius:10px;
            }
            input{
                text-align:left;
            }
    </style>
    
        <title>New Notice</title>
    </head>
    <body>
		<br>
        <center><h2>Post Notice</h2></center>
        
        <form action = "" method = "post" enctype="">
            <fieldset class="f1">

                
            <table>
                
                 <tr>
                    <td>
                        TITLE:
                    </td>
                    <td>
                    <input type = "text" name = "title">
                    </td>
                </tr>

                <tr>
                <tr>
                    <td>
                        BODY:
                    </td>
                    <td> 
                        <textarea type = "text" name = "body" value = "" rows="4" cols="50"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input type = "submit" name ="post" value = "POST"><br></td>
                </tr>

            </table>
            <br>
           

            </fieldset>  
        </form>
    </body>
</html>