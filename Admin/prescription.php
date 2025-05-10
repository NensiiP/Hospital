<?php
include '../database.php';  // Your database connection
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <!-- CSS Files -->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/css/plugins.min.css">
  <link rel="stylesheet" href="assets/css/kaiadmin.min.css">

  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link rel="stylesheet" href="assets/css/demo.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  <style>
    .table-container {
      max-width: 1000px;
      margin: 50px auto;
    }
  </style>

</head>

<body>

<?php include "sidebar.php" ?>

<!-- Content -->
<div class="content">

<div class="container my-4">
    <h2 class="text-center mb-4">Prescriptions</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Doctor</th>
                <th>Patient ID</th>
                <th>Appointment ID</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Disease</th>
                <th>Allergy</th>
                <th>Prescription</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = "select * from prescription";
            $result = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_array($result)){
              $doctor = $row['doctor'];
              $pid = $row['pid'];
              $ID = $row['ID'];
              $fname = $row['fname'];
              $lname = $row['lname'];
              $appdate = $row['appdate'];
              $apptime = $row['apptime'];
              $disease = $row['disease'];
              $allergy = $row['allergy'];
              $pres = $row['prescription'];

              
              echo "<tr>
                <td>$doctor</td>
                <td>$pid</td>
                <td>$ID</td>
                <td>$fname</td>
                <td>$lname</td>
                <td>$appdate</td>
                <td>$apptime</td>
                <td>$disease</td>
                <td>$allergy</td>
                <td>$pres</td>
              </tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(prescriptionId) {
    if (confirm("Are you sure you want to delete this prescription?")) {
        window.location.href = "delete_prescription.php?prescription_id=" + prescriptionId;
    }
}
</script>

</div>
</body>
</html>

< ?php
$conn->close();
?>