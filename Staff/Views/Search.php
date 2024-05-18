<?php 
include("header.php");

?>

<html>
    <head>

    <link rel="stylesheet" href="../controller/asset/css/design3.css">
    <script src="..\controller\Search.js"></script>
    </head>
    <body>
        <center>
            <h1>Search Equipements</h1>
        <table border="1">
            <tr>
                
                <td>
                    <input type="text" id="search" name="search" placeholder="Enter equipmemnt name to search" onkeyup ="Search()" style="font-size:20px">
                </td>
            </tr>
            <tr>
                <td id="searcheqp"></td>
            </tr>


        </table>
        </center>
    </body>
</html>