<?php
include 'database.php'; // Database connection
//session_start();

include('func1.php');
$pid = $_SESSION['pid'];


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
    <title>Prescription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- sweet alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>


<body>
<?php
 include 'header.php';
?>
<section class="page-title bg-1">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <span class="text-white">See Your Prescriptions</span>
          <h1 class="text-capitalize mb-5 text-lg">Prescription History</h1>
        </div>
      </div>
    </div>
  </div>
</section>  

<section class="appoinment-history section">
<div class="container mt-5">
    <table class="table table-bordered table-hover">
        <thead class="table-primary">
            <tr>
                    
                    <th scope="col">Appointment ID</th>
                    <th scope="col">Doctor</th>
                    <th scope="col">Appointment Date</th>
                    <th scope="col">Appointment Time</th>
                    <th scope="col">Disease</th>
                    <th scope="col">Allergy</th>
                    <th scope="col">Prescribe</th>
            </tr>
        </thead>
        <tbody>
        <?php 
                $query = "select ID,doctor,appdate,apptime,disease,allergy,prescription from prescription where pid='$pid';";

                $result = mysqli_query($conn,$query);
                if(!$result){
                echo mysqli_error($conn);
                }

                if ($result->num_rows > 0) {

                while ($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    
                    
                    <td><?php echo $row['ID'];?></td>
                    <td><?php echo $row['doctor'];?></td>
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

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</section>


<!-- footer Start -->
<?php include "footer.php"; ?>


</body>
</html>
