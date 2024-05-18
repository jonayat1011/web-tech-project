<?php
session_start();
require_once('../Controllers/sessionCheckController.php');
sessioncheck();
require_once('../Controllers/billingController.php'); // Assuming you have a billing controller

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Billing List</title>
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
    <div class="ListOfBillings" id="billingsList">
        <div class="updateHeader" onclick="toggleBillingsList()">
            <h1>List Of Billings</h1>
        </div>
        <div class="centeredBox" id="billingsContent" style="display: none;">
            <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Billing ID</th>
            <th>Patient ID</th>
            <th>Doctor ID</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Receipt</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $res = billingList(); // Assuming this function retrieves billing data
        $count = 0;
        while ($row = mysqli_fetch_assoc($res)) { 
            $count++;
        ?>
        <tr>
            <td><?php echo $count; ?></td>
            <td><?php echo $row["billing_id"]; ?></td>
            <td><?php echo $row["patient_id"]; ?></td>
            <td><?php echo $row["doctor_id"]; ?></td>
            <td><?php echo $row["billing_date"]; ?></td>
            <td><?php echo $row["billing_amount"]; ?></td>
            <td><?php echo $row["billing_status"]; ?></td>
            <td><?php echo $row["billing_receipt"]; ?></td>
        </tr>
        <?php     
        }
        ?>
    </tbody>
</table>

        </div>
    </div>

    <script>
        function toggleBillingsList() {
            var content = document.getElementById("billingsContent");
            if (content.style.display === "none") {
                content.style.display = "block";
            } else {
                content.style.display = "none";
            }
        }
    </script>
</body>
</html>
