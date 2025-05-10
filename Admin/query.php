<?php
include 'database.php';  // Your database connection
session_start();

$sql = "SELECT id, name, email, contact, topic, message FROM contact"; // Table name should match your database
$result = $conn->query($sql);


// Handle Delete Doctor
if (isset($_GET['delete_query'])) {
  $id = $_GET['delete_query'];
  $query = "DELETE FROM contact WHERE id='$id'";
  mysqli_query($conn, $query);
  header("Location: query.php");
  exit;
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

   
<div class="container mt-5">
    <h2 class="text-center mb-4">Pationt Details</h2>
    <table class="table table-bordered table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Query Topic</th>
          <th scope="col">Phone Number</th>
          <th scope="col">Message</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody id="tableBody">
        <tr>
        <?php
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['topic'] . "</td>";
                    echo "<td>" . $row['contact'] . "</td>";
                    echo "<td>" . $row['message'] . "</td>";
                    echo "<td><a href='?delete_query=" . $row['id'] . "' class='btn btn-danger btn-sm'>Delete</a></td>";

                }
            } else {
                echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
            } 
        ?>
            
          </td>
        </tr>
      </tbody>
    </table>
  </div>

  <script>
    function addEventListeners() {
      const deleteButtons = document.querySelectorAll('.deleteRow');

      deleteButtons.forEach((button) => {
        button.addEventListener('click', (event) => {
          const row = event.target.closest('tr');
          row.remove();
        });
      });

      addViewListener();
    }

    // Initialize event listeners for default rows
    addEventListeners();
  </script>

</div>
</body>
</html>
