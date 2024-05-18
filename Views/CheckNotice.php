<?php 
include("header.php");
?>

<html>
<head>
	<title>POST NOTICE</title>
    <link rel="stylesheet" href="../asset/css/design3.css">
</head>
<body>
        <center>
            <h2><b><i> NOTICES! </i></b></h2>
            

            <table border="4", width = "60%">
            <tr>
                <th>Subject</th>
                <th>Notice</th>
            </tr>
            <?php
                include("../Model/db.php");
                
                $connection = new db();
                $conobj=$connection->OpenCon();
                $userQuery=$connection->ShowNotice($conobj);
                
                if ($userQuery->num_rows > 0) {
                
                    // output data of each row
                    while($row = $userQuery->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>".$row["Title"]."</td>";
                        echo "<td>".$row["Body"]."</td>";

                        echo "</tr>";
                      
                  } 
                }
                
                ?>



            
		</table>
        <br>
        <a href="Notice.php">+Add New Notice</a>
        </center>
</body>
</html>