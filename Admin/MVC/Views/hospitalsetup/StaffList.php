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
    <title>Staff List</title>
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
    <div class="ListOfStaff" id="staffList">
        <div class="updateHeader" onclick="toggleStaffList()">
            <h1>List Of Staff</h1>
        </div>
        <div class="centeredBox" id="staffContent" style="display: none;">
            <table>
                <thead>
                    <tr>
                        <th>#</th>     
                        <th>Name</th>
                        <th>ID</th>
                        <th>Age</th>
                        <th>Gender</th>
                        <th>Phone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $res = StaffList(); // Assuming you have a function named StaffList() in hospitalsetupController.php
                    $count = 0;
                    while ($row = mysqli_fetch_assoc($res)) { 
                        $count++;
                        ?>
                        <tr>
                            <td><?php echo $count; ?></td>
                            <td><?php echo $row["user_name"]; ?></td>
                            <td><?php echo $row["user_id"]; ?></td>
                            <td><?php echo $row["user_age"]; ?></td>
                            <td><?php echo $row["user_gender"]; ?></td>
                            <td><?php echo $row["user_ phone"]; ?></td>
                            <td><?php echo $row["user_email"]; ?></td>
                        </tr>
                    <?php     
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function toggleStaffList() {
            var content = document.getElementById("staffContent");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</body>
</html>
