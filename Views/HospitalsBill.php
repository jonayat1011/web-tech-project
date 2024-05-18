<?php 
include("header.php");
    include("../controller/BillController.php");
?>
<html>
    <head>
    <style>
            .f1{
                width:50%;
                margin-left:25%;
                background-color:#99ddff;
                border-radius:10px;
            }
    </style>
    
        <title>Bill</title>
    </head>
    <body>
		<br>
        <center><h2>Add New Bill</h2></center>
        
        <form action = "" method = "post" enctype="">
            <fieldset class="f1">

                
            <table>
                
                 <tr>
                    <td>
                        Month
                    </td>
                    <td>
                    <input type = "text" name = "month">
                    </td>
                </tr>

                <tr>
                <tr>
                    <td>
                        Utlity Bill:
                    </td>
                    <td> 
                        <input type = "text" name = "utility" value = "" >
                    </td>
                </tr>
                <tr>
                    <td>
                        Employee Salary:
                    </td>
                    <td> 
                        <input type = "text" name = "salary" value = "">
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