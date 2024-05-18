<?php

session_start();
require_once('../../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../../Controllers/hospitalsetupController.php');




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Department List</title>
    <style>
        .centeredBox {
            text-align: center;
            margin-top: 20px;
        }
        table {
            width: 80%;
            margin: 0 auto;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="ListOfDepartment" id="doctorsList">
        <div class="updateHeader" onclick="toggleDoctorsList()">
            <h1>List Of Department</h1>
        </div>
        <div class="centeredBox" id="doctorsContent" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>     
                        <th>Name</th>
                        <th>ID</th>
                        <th>description</th>
                       
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $res =DepartmentList();
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($res)) { 
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row["department_name"]; ?></td>
                            <td><?php echo $row["department_id"]; ?></td>
                            <td><?php echo $row["department_ description"]; ?></td>
                           
                        </tr>
                    <?php     
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleDoctorsList() {
            var content = document.getElementById("doctorsContent");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</body>
</html>
