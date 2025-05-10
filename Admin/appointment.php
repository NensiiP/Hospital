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
    <h2 class="text-center mb-4">Appointment Details</h2>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th>Appinment id</th>
                <th>Patient id</th>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Gender</th>
                <th>Mail</th>
                <th>Number</th>
                <th>Doctor</th>
                
                <th>Fees</th>
                <th>Appoinment Date</th>
                <th>Appoinment Time</th>
                <th>Appoinment Status</th>
            </tr>
        </thead>
        <tbody>
                <?php
                    $query = "select * from appointment;";
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['pid'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['gender'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td><?php echo $row['contact'];?></td>
                    <td><?php echo $row['doctor'];?></td>
                    <td><?php echo $row['docFees'];?></td>
                    <td><?php echo $row['appdate'];?></td>
                    <td><?php echo $row['apptime'];?></td>
                    <td>
                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                    {
                      echo "Active";
                    }
                    if(($row['userStatus']==0) && ($row['doctorStatus']==1))  
                    {
                      echo "Cancelled by Patient";
                    }

                    if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                    {
                      echo "Cancelled by Doctor";
                    }
                        ?></td>
                      </tr>
                    <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</div>
</body>
</html>


