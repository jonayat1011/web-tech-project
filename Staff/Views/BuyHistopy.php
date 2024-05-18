<?php 

?>

<html>
<head>
</head>
<body>
        <center>
            <h2><b><i> Buy History </i></b></h2>
            

            <table border="4", width = "60%">
            <tr>
                <th>Equipememt Name</th>
                <th>Price</th>
                <th>Purchase Date</th>
            </tr>
            <?php
                include("../Model/db.php");
                
                $connection = new db();
                $conobj=$connection->OpenCon();
                $userQuery=$connection->ShowEquipements($conobj);
                
                if ($userQuery->num_rows > 0) {
                
                    // output data of each row
                    while($row = $userQuery->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["Price"]."</td>";
                        echo "<td>".$row["Date"]."</td>";

                        echo "</tr>";
                      
                  } 
                }
                
                ?>



            
		</table>
        <br>
        <a href="BuyEquipement.php">+Buy New Equipement</a>
        </center>
</body>
</html>