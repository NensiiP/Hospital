<?php
include 'database.php';  // Your database connection
session_start();

// Ensure session variables are set
$pid = $_SESSION['pid'];
$username = $_SESSION['username'];
$email = $_SESSION['email'];
$fname = $_SESSION['fname'];
$gender = $_SESSION['gender'];
$lname = $_SESSION['lname'];
$contact = $_SESSION['contact'];

if (isset($_POST['book_appointment'])) {
    // Collect form data
    $department = $_POST['department'];
    $doctor = $_POST['doctor'];
    $docFees = $_POST['docFees'];
    $appdate = $_POST['appdate'];
    $apptime = $_POST['apptime'];
    $message = $_POST['message'];

    date_default_timezone_set('Asia/Kolkata');
    $cur_date = date("Y-m-d");
    $cur_time = date("H:i:s");
    $apptime1 = strtotime($apptime);
    $appdate1 = strtotime($appdate);

    // Validate date and time
    if (date("Y-m-d", $appdate1) >= $cur_date) {
        if ((date("Y-m-d", $appdate1) == $cur_date && date("H:i:s", $apptime1) > $cur_time) || date("Y-m-d", $appdate1) > $cur_date) {
            // Check if the appointment time is available for the selected doctor
            $check_query = mysqli_query($conn, "SELECT apptime FROM appointment WHERE doctor='$doctor' AND appdate='$appdate' AND apptime='$apptime'");
            
            if (mysqli_num_rows($check_query) == 0) {
                // Insert appointment into the database
                $query = $conn->query("INSERT INTO appointment (pid, fname, lname, gender, email, contact, department, doctor, docFees, appdate, apptime, message, userStatus, doctorStatus) 
                    VALUES ('$pid', '$fname', '$lname', '$gender', '$email', '$contact', '$department', '$doctor', '$docFees', '$appdate', '$apptime', '$message', '1', '1')");
                
                if ($query) {
                    echo "<script>alert('Your appointment has been successfully booked.'); window.location.href='appoinment.php';</script>";
                } else {
                    echo "<script>alert('Unable to process your request. Please try again!'); window.location.href='appoinment.php';</script>";
                }
            } else {
                echo "<script>alert('The doctor is not available at the selected time or date. Please choose a different time or date.'); window.location.href='appoinment.php';</script>";
            }
        } else {
            echo "<script>alert('Select a time or date in the future!'); window.location.href='appoinment.php';</script>";
        }
    } else {
        echo "<script>alert('Select a time or date in the future!'); window.location.href='appoinment.php';</script>";
    }
}  


if(isset($_GET['cancel']))
  {
    $query=mysqli_query($con,"update appointmenttb set userStatus='0' where ID = '".$_GET['ID']."'");
    if($query)
    {
      echo "<script>alert('Your appointment successfully cancelled');</script>";
    }
  }


    // if ($conn->query($sql) === TRUE) {
    //   echo "<script>alert('Appoinment booked successfully');</script>";
    //   header("Location: confirmation.php");
    // } else {
    //     echo "Error: " . $conn->error;
    // }

// Fetch all departments for the dropdown
$departments = $conn->query("SELECT * FROM department");


// Handle department selection for fetching doctors
if (isset($_POST['department'])) {
    $department = $_POST['department'];
    $result = $conn->query("SELECT username FROM doctor WHERE department='$department'");
    echo "<option value=''>Select Doctor</option>";
    while ($row = $result->fetch_assoc()) {
        echo "<option value='" . $row['username'] . "'>" . $row['username'] . "</option>";
    }
    exit;
}

// Handle doctor selection for fetching fees
if (isset($_POST['doctor'])) {
    $doctor = $_POST['doctor'];
    $result = $conn->query("SELECT docFees FROM doctor WHERE username='$doctor'");
    $row = $result->fetch_assoc();
    echo $row['docFees'];
    exit;
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
          <span class="text-white">Book your Seat</span>
          <h1 class="text-capitalize mb-5 text-lg">Appoinment</h1>
        </div>
      </div>
    </div>
  </div>
</section>  

<section class="appoinment section">
  <div class="container">
    <div class="row">
      <div class="col-lg-4">
          <div class="mt-3">
            <div class="feature-icon mb-3">
              <i class="icofont-support text-lg"></i>
            </div>
             <span class="h3">Call for an Emergency Service!</span>
              <h3 class="text-color mt-3">+84 789 1256 </h3>
          </div>
      </div>

      <div class="col-lg-8">
           <div class="appoinment-wrap mt-5 mt-lg-0 pl-lg-5">
            <h2 class="mb-2 title-color">Book an appoinment</h2>
               <form class="appoinment-form" method="POST" action="">
                    <div class="row">

                         <div class="col-lg-6">
                            <div class="form-group">
                            <select id="department" name="department" class="form-control" required>
                                <option value="">Select Department</option>
                                <?php while ($row = $departments->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['department']; ?>"><?php echo $row['department']; ?></option>
                                <?php } ?>
                            </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <select class="form-control" id="doctor" name="doctor">
                                  <option value="">Select Doctor</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-group">
                                <input name="docFees" id="docFees" type="text" class="form-control" placeholder="Fees" readonly="readonly"/>
                            </div>
                        </div>

                         <div class="col-lg-6">
                            <div class="form-group">
                                <input name="appdate" id="date" type="date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="form-group">
                                <select name="apptime" class="form-control" id="apptime" placeholder="Time" required="required">
                                    <option value="" disabled selected>Select Time</option>
                                    <option value="08:00:00">8:00 AM</option>
                                    <option value="10:00:00">10:00 AM</option>
                                    <option value="12:00:00">12:00 PM</option>
                                    <option value="14:00:00">2:00 PM</option>
                                    <option value="16:00:00">4:00 PM</option>
                                </select>
                            </div>
                        </div>
                        
                    </div>
                    <div class="form-group-2 mb-4">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Your Message"></textarea>
                    </div>

                    <button type="submit" name="book_appointment" class="btn btn-main btn-round-full">Book Appointment<i class="icofont-simple-right ml-2"></i></button>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>


<script>
// Fetch doctors when a department is selected
$('#department').on('change', function () {
    var department = $(this).val();
    if (department) {
        $.ajax({
            type: 'POST',
            url: 'appoinment.php',
            data: { department: department },
            success: function (response) {
                $('#doctor').html(response);
            }
        });
    } else {
        $('#doctor').html('<option value="">Select Doctor</option>');
        $('#docFees').val('');
    }
});

// Fetch fees when a doctor is selected
$('#doctor').on('change', function () {
    var doctor = $(this).val();
    if (doctor) {
        $.ajax({
            type: 'POST',
            url: 'appoinment.php',
            data: { doctor: doctor },
            success: function (response) {
                $('#docFees').val(response);
            }
        });
    } else {
        $('#docFees').val('');
    }
});

</script>

<!-- footer Start -->
<?php include "footer.php"; ?>


</body>
</html>
