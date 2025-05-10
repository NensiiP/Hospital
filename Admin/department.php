<?php

include 'database.php';  // Your database connection
session_start();


// Handle Add/Edit Department 
if (isset($_POST['add_department'])) {
    $department_id = $_POST['department_id'];
    $department = $_POST['department'];
    $description = $_POST['description'];
    $image = $_FILES['deptImage']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);
    
    if (move_uploaded_file($_FILES['deptImage']['tmp_name'], $target_file)) {
      $query = "INSERT INTO department (department, description, deptImage) VALUES ('$department', '$description', '$image')";
      mysqli_query($conn, $query);
  }
  header("Location: department.php");
  exit;
}

// Handle Delete Doctor
if (isset($_GET['delete_department'])) {
    $department_id = $_GET['delete_department'];
    $query = "DELETE FROM department WHERE department_id='$department_id'";
    mysqli_query($conn, $query);
    header("Location: department.php");
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
  
  <style>
  /* General Container Styling */
  #departmentCardsContainer {
    display: flex;
    flex-wrap: wrap;
    gap: 20px;
    justify-content: space-between;
    padding: 20px;
    background-color: #f5f5f5;
  }

  /* Department Card Styling */
  .department-card {
    background-color: #ffffff;
    border: 1px solid #ddd;
    border-radius: 10px;
    box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 300px;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding: 15px;
    transition: transform 0.3s ease;
  }

  /* Image Styling */
  .department-card img {
    width: 100%;
    height: 200px;
    object-fit: cover;
    border-radius: 10px;
    margin-bottom: 15px;
  }

  /* Card Info Styling */
  .card-info {
    text-align: center;
  }

  .department-name {
    font-size: 1.2rem;
    font-weight: bold;
    color: #333;
    margin-bottom: 10px;
  }

  .description {
    font-size: 0.9rem;
    color: #666;
    margin-bottom: 15px;
  }

  /* Button Styling */
  .btn-danger {
    background-color: #dc3545;
    color: white;
    text-decoration: none;
    padding: 8px 15px;
    font-size: 0.9rem;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
  }

  .btn-danger:hover {
    background-color: #b52a37;
  }

  /* Hover Effect */
  .department-card:hover {
    transform: translateY(-5px);
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.15);
  }
</style>

</head>

<body>
<?php include('sidebar.php') ?>

<div class="content">
<div class="container my-4">
    <h2 class="text-center mb-4">Department Management</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#departmentModal">Add Department</button>

   <!-- Doctor Cards -->
<div id="departmentCardsContainer">
    <?php
    $query = "SELECT * FROM department";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
        <div class="department-card" data-department-id="' . $row['department_id'] . '">
            <img src="images/' . $row['deptImage'] . '" alt="department Image">
            <div class="card-info">
                <h5 class="department-name">' . $row['department'] . '</h5>
                <p class="description">' . $row['description'] . '</p>
                <a href="?delete_department=' . $row['department_id'] . '" class="btn btn-danger btn-sm">Delete</a>
            </div>
        </div>';
    }
    ?>
</div>


    <!-- Add department Modal -->
    <div class="modal fade" id="departmentModal" tabindex="-1" aria-labelledby="departmentModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="departmentModalLabel">Add department</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="departmentForm" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="department_id" name="department_id">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="department" class="form-label">Department Name</label>
                  <input type="text" id="department" class="form-control" name="department" required>
                </div>
                <div class="col-md-6">
                  <label for="description" class="form-label">Description</label>
                  <input type="text" id="description" class="form-control" name="description" required>
                </div>
                <div class="col-md-6">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" id="image" class="form-control" name="deptImage" accept="image/*" required>
                </div>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-success" name="add_department">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</body>
</html>
