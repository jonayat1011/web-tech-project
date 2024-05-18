<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet"  href="Styles.css">
    <style>
        
    </style>
</head>
<body>
<?php include('header.php'); ?>


<section>
 <?php include('sideNavBar.php'); ?>

    <article>
        <div class="container">
      <h1>Prescription Refills</h1>
      <div class="refills-header">
        <h2>Patient Name: John Doe</h2>
        <p class="date">Date: April 12, 2019</p>
      </div>
      <div class="refills-content">
        <table>
          <thead>
            <tr>
              <th>Medication Name</th>
              <th>Dosage</th>
              <th>Refills</th>
              <th>Instructions</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Lisinopril</td>
              <td>10mg</td>
              <td>3</td>
              <td>Take one tablet daily with food.</td>
            </tr>
            <tr>
              <td>Metformin</td>
              <td>500mg</td>
              <td>2</td>
              <td>Take one tablet twice daily with meals.</td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="refills-footer">
        <p>For more information or questions, please contact the clinic at (123) 456-7890.</p>
      </div>
    </div>
    </article>
</section>

<script>
    
</script>
</body>
</html>
