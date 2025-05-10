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
            <th scope="col">Patient ID</th>
                <th scope="col">Appointment ID</th>
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Gender</th>
                <th scope="col">Email</th>
                <th scope="col">Contact</th>
                <th scope="col">Appointment Date</th>
                <th scope="col">Appointment Time</th>
                <th scope="col">Current Status</th>
                <th scope="col">Action</th>
                <th scope="col">Prescribe</th>
            </tr>
        </thead>
        <tbody>
        <?php                    
                    //$dname = $_SESSION['dname'];
                    $query = "select pid,ID,fname,lname,gender,email,contact,appdate,apptime,userStatus,doctorStatus from appointment where doctor='$doctor';";
                    $result = mysqli_query($conn,$query);
                    while ($row = mysqli_fetch_array($result)){
                      ?>
                      <tr>
                      <td><?php echo $row['pid'];?></td>
                        <td><?php echo $row['ID'];?></td>
                        <td><?php echo $row['fname'];?></td>
                        <td><?php echo $row['lname'];?></td>
                        <td><?php echo $row['gender'];?></td>
                        <td><?php echo $row['email'];?></td>
                        <td><?php echo $row['contact'];?></td>
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
                      echo "Cancelled by You";
                    }
                        ?></td>

                     <td>
                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

													
	                        <a href="appointment.php?ID=<?php echo $row['ID']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>

                        <td>

                        <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                        { ?>

                        <a href="prescribe.php?pid=<?php echo $row['pid']?>&ID=<?php echo $row['ID']?>&fname=<?php echo $row['fname']?>&lname=<?php echo $row['lname']?>&appdate=<?php echo $row['appdate']?>&apptime=<?php echo $row['apptime']?>"
                        tooltip-placement="top" tooltip="Remove" title="prescribe">
                        <button class="btn btn-success">Prescibe</button></a>
                        <?php } else {

                            echo "-";
                            } ?>
                        
                        </td>


                      </tr></a>
                    <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete(appointmentId) {
    if (confirm("Are you sure you want to delete this appointment?")) {
        window.location.href = "delete_appointment.php?Aid=" + appointmentId;
    }
}
</script>

</div>
</body>
</html>

