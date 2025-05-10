<?php
include 'database.php';  // Your database connection
session_start();
// Count total doctors
$query = "SELECT COUNT(*) AS total_doctors FROM doctor";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalDoctors = $row['total_doctors'];

// Count total patients
$query = "SELECT COUNT(*) AS total_patients FROM patient";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalPatients = $row['total_patients'];

// Count total departments
$query = "SELECT COUNT(*) AS total_departments FROM department";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
$totalDepartments = $row['total_departments'];

// Query to count patients by department
$query = "SELECT department, COUNT(*) AS patient_count FROM appointment GROUP BY department";
$result = mysqli_query($conn, $query);

// Initialize arrays to hold department names and patient counts
$departments = [];
$patientCounts = [];

while ($row = mysqli_fetch_assoc($result)) {
    $departments[] = $row['department'];
    $patientCounts[] = $row['patient_count'];
}

// Convert data to JSON for use in JavaScript
$departmentsJSON = json_encode($departments);
$patientCountsJSON = json_encode($patientCounts);
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
</head>

<body>

<?php include "sidebar.php" ?>

<!-- Content -->
<div class="content">
<div class="row">
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-info card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="bi bi-people-fill"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Doctors</p>
                          <h4 class="card-title"><?php echo $totalDoctors ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-success card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="bi bi-person-vcard-fill"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Total Patient</p>
                          <h4 class="card-title"><?php echo $totalPatients ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-4">
                <div class="card card-stats card-secondary card-round">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-5">
                        <div class="icon-big text-center">
                        <i class="bi bi-thermometer-half"></i>
                        </div>
                      </div>
                      <div class="col-7 col-stats">
                        <div class="numbers">
                          <p class="card-category">Department</p>
                          <h4 class="card-title"><?php echo $totalDepartments ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!--CHART-->
            
            <div style="width: 30%; margin: 20px auto;">
            <h4>Department-wise Patient Distribution</h4>
    <canvas id="departmentPatientChart" width="400" height="400"></canvas></div>

    <script>
        // Get the data from PHP
        var departments = <?php echo $departmentsJSON; ?>;
        var patientCounts = <?php echo $patientCountsJSON; ?>;

        // Create a doughnut chart
        var ctx = document.getElementById('departmentPatientChart').getContext('2d');
        var departmentPatientChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: departments,
                datasets: [{
                    label: 'Patients per Department',
                    data: patientCounts,
                    backgroundColor: [
                        '#FF6384', // You can add more colors for each department
                        '#36A2EB',
                        '#FFCE56',
                        '#4BC0C0',
                        '#9966FF'
                    ],
                    borderColor: '#ffffff',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>

</div>
</body>
</html>

