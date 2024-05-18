<?php 
include("header.php");
?>

<html>
<head>
	<title>Equipements Condition</title>
</head>
<body>
        <center>
            <h2><b><i> Equipements Condition! </i></b></h2>
            

            <table border="4", width = "60%">
            <tr>
                <th>Equipement Name</th>
                <th>Purchase Date</th>
                <th>Condition</th>
            </tr>
            <?php
                include("../Model/db.php");
                
                $connection = new db();
                $conobj=$connection->OpenCon();
                $userQuery=$connection->ShowEq($conobj);
                
                if ($userQuery->num_rows > 0) {
            
                    while($row = $userQuery->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["Name"]."</td>";
                        echo "<td>".$row["PurchaseDate"]."</td>";
                        if($row["Equip_Condition"]=="Not Ok"){
                            echo "<td>Not Ok--<a href=BuyEquipement.php style='color:blue;font-size:15';>Buy New Equipement?</a></td>";
                        }
                        else{
                            echo "<td>".$row["Equip_Condition"]."</td>";
                        }
                       

                        echo "</tr>";
                      
                  } 
                }
                
                ?>



            
		</table>
        <br>

        </center>
</body>
</html>