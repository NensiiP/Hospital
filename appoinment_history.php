<?php
include 'database.php'; // Database connection
session_start();

if(isset($_GET['cancel']))
  {
    $query=mysqli_query($conn,"update appointment set userStatus='0' where ID = '".$_GET['ID']."'");
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
    <title>Book Appointment</title>
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
          <span class="text-white">See Your Booked Seat</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment History</h1>
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
                <th>Doctor Name</th>
                <th>Consultancy Fees</th>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Current Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $fname = $_SESSION['fname'];
            $lname = $_SESSION['lname'];
            
            $query = "select ID,doctor,docFees,appdate,apptime,userStatus,doctorStatus from appointment where fname ='$fname' and lname='$lname';";
            $result = mysqli_query($conn,$query);
            while ($row = mysqli_fetch_array($result)){

            #$fname = $row['fname'];
            #$lname = $row['lname'];
            #$email = $row['email'];
            #$contact = $row['contact'];
            ?>
                    <tr>
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
                                echo "Cancelled by You";
                            }

                            if(($row['userStatus']==1) && ($row['doctorStatus']==0))  
                            {
                                echo "Cancelled by Doctor";
                            }
                            ?>
                        </td>

                        <td>
                            <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1))  
                            { ?>

													
	                        <a href="appoinment_history.php?ID=<?php echo $row['ID']?>&cancel=update" 
                              onClick="return confirm('Are you sure you want to cancel this appointment ?')"
                              title="Cancel Appointment" tooltip-placement="top" tooltip="Remove"><button class="btn btn-danger btn-sm">Cancel</button></a>
	                        <?php } else {

                                echo "Cancelled";
                                } ?>
                        
                        </td>
                      </tr>
                    <?php } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</section>


<!-- footer Start -->
<?php include "footer.php"; ?>


</body>
</html>
