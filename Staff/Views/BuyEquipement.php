<?php 
include("header.php");
    include("../controller/BuyController.php");
?>
<html>
    <head>
    <link rel="stylesheet" href="../asset/css/design3.css">
    <style>
            .f1{
                width:30%;
                margin-left:35%;
                background-color:#99ddff;
                border-radius:10px;
            }
            input{
                    border-radius:5px;
                    border:none;
            }
            td{
    text-align: left;

}
    </style>
    
        <title>Equipemenent</title>
    </head>
    <body>
		<br>
        <center><h2>Buy New Equipement</h2></center>
        
        <form action = "" method = "post" enctype="">
            <fieldset class="f1">

                
            <table>
                
                 <tr>
                    <td>
                        Equipement Name:
                    </td>
                    <td>
                    <input type = "text" name = "name">
                    </td>
                </tr>

                <tr>
                <tr>
                    <td>
                        Price:
                    </td>
                    <td> 
                        <input type = "text" name = "price" value = "">
                    </td>
                </tr>
                <tr>
                    <td>
                        Date:
                    </td>
                    <td> 
                        <input type = "date" name = "date" value = "">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td> <input type = "submit" name ="post" value = "Buy"><br></td>
                </tr>

            </table>
            <br>
           

            </fieldset>  
        </form>
    </body>
</html>