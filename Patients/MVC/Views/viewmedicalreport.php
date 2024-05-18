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
      <h1>Medical Report</h1>
      <div class="report-header">
        <h2>Patient Name: John Doe</h2>
        <input type="date" id="date" name="date" value="2023-03-22">
      </div>
      <div class="report-content">
        <table>
          <thead>
            <tr>
              <th>Test Name</th>
              <th>Result</th>
              <th>Unit</th>
              <th>Normal Range</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
      <div class="report-footer">
        <p>For more information or questions, please contact the clinic at (123) 456-7890.</p>
      </div>
    </div>
    </article>
</section>

<script>

</script>
</body>
</html>
