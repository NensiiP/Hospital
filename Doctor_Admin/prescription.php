<?php
include '../database.php';  // Your database connection
session_start();

//include('../func1.php');
$doctor = $_SESSION['dname']; 
if(isset($_GET['cancel']))
  {
    $query=mysqli_query($conn,"update appointment set doctorStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Admin Dashboard</title>
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
                    <th scope="col">Patient ID</th>
                    
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $query = "select pid,fname,lname,ID,appdate,apptime,disease,allergy,prescription from prescription where doctor='$doctor';";

                $result = mysqli_query($conn,$query);
                if(!$result){
                echo mysqli_error($conn);
                }

                if ($result->num_rows > 0) {

                while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <td><?php echo $row['pid'];?></td>
                    <td><?php echo $row['fname'];?></td>
                    <td><?php echo $row['lname'];?></td>
                    <td><?php echo $row['ID'];?></td>
                    
                    <td><?php echo $row['appdate'];?></td>
                    <td><?php echo $row['apptime'];?></td>
                    <td><?php echo $row['disease'];?></td>
                    <td><?php echo $row['allergy'];?></td>
                    <td><?php echo $row['prescription'];?></td>

                </tr>
                <?php }} else {
                echo "<tr><td colspan='12' class='text-center'>No prescriptions found</td></tr>";
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