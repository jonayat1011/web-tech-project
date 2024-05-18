<?php 
include("header.php");
?>

<html>
<head>
	<title>Billing</title>
</head>
<body>
        <center>
            <h2><b><i> Billing History! </i></b></h2>
            

            <table border="4", width = "60%">
            <tr>
                <th>Month</th>
                <th>Utility</th>
                <th>Employee Salary</th>
                <th>Total Bill</th>
            </tr>
            <?php
                include("../Model/db.php");
                
                $connection = new db();
                $conobj=$connection->OpenCon();
                $userQuery=$connection->ShowBills($conobj);
                
                if ($userQuery->num_rows > 0) {
                
                    // output data of each row
                    while($row = $userQuery->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["Month"]."</td>";
                        echo "<td>".$row["Utility"]."</td>";
                        echo "<td>".$row["EmployeeSalary"]."</td>";
                        echo "<td>".$row["TotalBill"]."</td>";

                        echo "</tr>";
                      
                  } 
                }
                
                ?>



            
		</table>
        <br>
        </center>
</body>
</html>