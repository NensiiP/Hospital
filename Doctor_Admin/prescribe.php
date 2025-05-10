<?php
include '../database.php';  // Your database connection
session_start();
//include '../func1.php';
$pid='';
$ID='';
$appdate='';
$apptime='';
$fname = '';
$lname= '';
$doctor = $_SESSION['dname'];
if(isset($_GET['pid']) && isset($_GET['ID']) && ($_GET['appdate']) && isset($_GET['apptime']) && isset($_GET['fname']) && isset($_GET['lname'])) {
$pid = $_GET['pid'];
  $ID = $_GET['ID'];
  $fname = $_GET['fname'];
  $lname = $_GET['lname'];
  $appdate = $_GET['appdate'];
  $apptime = $_GET['apptime'];
}


if(isset($_POST['prescribe']) && isset($_POST['pid']) && isset($_POST['ID']) && isset($_POST['appdate']) && isset($_POST['apptime']) && isset($_POST['lname']) && isset($_POST['fname'])){
  $appdate = $_POST['appdate'];
  $apptime = $_POST['apptime'];
  $disease = $_POST['disease'];
  $allergy = $_POST['allergy'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $pid = $_POST['pid'];
  $ID = $_POST['ID'];
  $prescription = $_POST['prescription'];
  
  $query=mysqli_query($conn,"insert into prescription(doctor,pid,ID,fname,lname,appdate,apptime,disease,allergy,prescription) values ('$doctor','$pid','$ID','$fname','$lname','$appdate','$apptime','$disease','$allergy','$prescription')");
    if($query)
    {
      echo "<script>alert('Prescribed successfully!');</script>";
    }
    else{
      echo "<script>alert('Unable to process your request. Try again!');</script>";
    }
  // else{
  //   echo "<script>alert('GET is not working!');</script>";
  // }initial
  // enga error?
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
  /* General Form Styling */
  .form-group {
    margin-bottom: 20px;
  }

  label {
    font-weight: bold;
    font-size: 1rem;
    margin-bottom: 5px;
    display: block;
  }

  textarea {
    width: 100%;
    height: 100px;
    padding: 10px;
    font-size: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    resize: none;
  }

  .btn-primary {
    background-color: #007bff;
    color: white;
    padding: 10px 20px;
    font-size: 1rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }

  /* Adding some spacing for better layout */
  .form-row {
    padding: 20px;
    background-color: #f8f9fa;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
  }
</style>


</head>

<body>

<?php include "sidebar.php" ?>

<!-- Content -->
<div class="content">
<h2 class="text-center mb-4">Prescribe a Patient</h2>
<div class="tab-pane" id="list-pres" role="tabpanel" aria-labelledby="list-pres-list">
  <form class="form-group" name="prescribeform" method="post" action="prescribe.php">
    <div class="form-row">
      <div class="form-group">
        <label for="disease">Disease:</label>
        <textarea id="disease" name="disease" required></textarea>
      </div>

      <div class="form-group">
        <label for="allergy">Allergies:</label>
        <textarea id="allergy" name="allergy" required></textarea>
      </div>

      <div class="form-group">
        <label for="prescription">Prescription:</label>
        <textarea id="prescription" name="prescription" required></textarea>
      </div>

      <!-- Hidden fields for additional data -->
      <input type="hidden" name="fname" value="<?php echo $fname ?>" />
      <input type="hidden" name="lname" value="<?php echo $lname ?>" />
      <input type="hidden" name="appdate" value="<?php echo $appdate ?>" />
      <input type="hidden" name="apptime" value="<?php echo $apptime ?>" />
      <input type="hidden" name="pid" value="<?php echo $pid ?>" />
      <input type="hidden" name="ID" value="<?php echo $ID ?>" />

      <input type="submit" name="prescribe" value="Prescribe" class="btn btn-primary">
    </div>
  </form>
</div>





<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>

</div>
</body>
</html>