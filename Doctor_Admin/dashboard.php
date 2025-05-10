<?php
include '../database.php';  // Your database connection
session_start();

//include('../func1.php');
$doctor = $_SESSION['dname'];
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
      /* Main container styling */
      .dashboard-card {
            border: 3px solid black;
            padding: 20px;
            text-align: center;
            border-radius: 10px;
            transition: 0.3s ease-in-out;
            cursor: pointer;
            background-color: #f8f9fa;
        }

        /* Hover Effect */
        .dashboard-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.3);
            background-color: #e9ecef;
        }

        /* Icon Box */
        .icon-box {
            border: 2px solid black;
            padding: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            font-size: 50px; /* Bigger Icon */
            font-weight: bold;
            height: 150px;
            margin-bottom: 15px;
        }

        /* Icon Colors */
        .appointment-icon {
            color: #007bff; /* Blue */
        }

        .prescription-icon {
            color: #28a745; /* Green */
        }

        /* Title Styling */
        .dashboard-title {
            font-size: 20px;
            font-weight: bold;
        }

  </style>

</head>

<body>

<?php include "sidebar.php" ?>

<!-- Content -->
<div class="content">
<div class="container mt-5">
    <div class="row justify-content-center">
        <!-- Appointment List -->
        <div class="col-md-4">
            <div class="dashboard-card" onclick="window.location.href='appointment.php'">
                <div class="icon-box">
                    <i class="bi bi-calendar-check appointment-icon"></i>
                </div>
                <div class="dashboard-title">Appointment List</div>
            </div>
        </div>

        <!-- Prescription -->
        <div class="col-md-4">
            <div class="dashboard-card" onclick="window.location.href='prescription.php'">
                <div class="icon-box">
                    <i class="bi bi-file-medical prescription-icon"></i>
                </div>
                <div class="dashboard-title">Prescription</div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<script>

</script>


</body>
</html>