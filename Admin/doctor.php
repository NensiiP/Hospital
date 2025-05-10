<?php

include 'database.php';  // Your database connection
session_start();

// Handle Add/Edit Doctor
if (isset($_POST['save_doctor'])) {
    $doctor_id = $_POST['doctor_id'];
    $doctorName = $_POST['docname'];
    $department = $_POST['department'];
    $fees = $_POST['fees'];
    $email = $_POST['docemail'];
    $password = $_POST['docpassword'];
    $image = $_FILES['docimage']['name'];
    $target_dir = "images/";
    $target_file = $target_dir . basename($image);

    // Move the uploaded image to the "uploads" folder
    if (move_uploaded_file($_FILES['docimage']['tmp_name'], $target_file)) {
        if ($doctor_id) {
            // Update existing doctor
            $query = "UPDATE doctor SET username='$doctorName', department='$department', docFees='$fees', email='$email', password='$password', docImage='$image' WHERE id='$doctor_id'";
            mysqli_query($conn, $query);
        } else {
            // Insert new doctor
            $query = "INSERT INTO doctor (username, department, docFees, email, password, docImage) VALUES ('$doctorName', '$department', '$fees', '$email', '$password', '$image')";
            mysqli_query($conn, $query);
        }
    }
    header("Location: doctor.php");
    exit;
}

// Handle Delete Doctor
if (isset($_GET['delete_doctor'])) {
    $doctor_id = $_GET['delete_doctor'];
    $query = "DELETE FROM doctor WHERE id='$doctor_id'";
    mysqli_query($conn, $query);
    header("Location: doctor.php");
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
    .doctor-card {
      display: flex;
      align-items: center;
      border: 1px solid #ddd;
      border-radius: 8px;
      padding: 15px;
      margin: 10px 0;
      box-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1);
    }
    .doctor-card img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 8px;
      margin-right: 15px;
    }
    .doctor-card .card-info {
      flex-grow: 1;
    }
  </style>
</head>

<body>
<?php include('sidebar.php') ?>

<div class="content">
<div class="container my-4">
    <h2 class="text-center mb-4">Doctor Management</h2>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#doctorModal">Add Doctor</button>

    <!-- Doctor Cards -->
    <div id="doctorCardsContainer">
        <?php
        $query = "SELECT * FROM doctor";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            echo '
            <div class="doctor-card" data-doctor-id="' . $row['id'] . '">
                <img src="images/' . $row['docImage'] . '" alt="Doctor Image">
                <div class="card-info">
                  <h5 class="doctor-name">' . $row['username'] . '</h5>
                  <p class="doctor-department">' . $row['department'] . '</p>
                  <p class="doctor-fees">Fees: Rs. ' . $row['docFees'] . '</p>
                  <button class="btn btn-info btn-sm edit-btn" onclick="editDoctor(this.parentElement.parentElement)">Edit</button>
                  <a href="?delete_doctor=' . $row['id'] . '" class="btn btn-danger btn-sm">Delete</a>
                </div>
            </div>';
        }
        ?>
    </div>

    <!-- Add/Edit Doctor Modal -->
    <div class="modal fade" id="doctorModal" tabindex="-1" aria-labelledby="doctorModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="doctorModalLabel">Add Doctor</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form id="doctorForm" method="POST" enctype="multipart/form-data">
              <input type="hidden" id="doctor_id" name="doctor_id">
              <div class="row g-3">
                <div class="col-md-6">
                  <label for="doctorName" class="form-label">Doctor Name</label>
                  <input type="text" id="doctorName" class="form-control" name="docname" required>
                </div>
                <div class="col-md-6">
                  <label for="department" class="form-label">Department</label>
                  <select id="department" class="form-select" name="department" required>
                    <option value="">Select Department</option>
                    <?php
                    // Fetch all departments from the 'department' table
                    $departmentQuery = "SELECT * FROM department";
                    $result = mysqli_query($conn, $departmentQuery);
                    if ($result) {
                      while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['department'] . "'>" . $row['department'] . "</option>";
                      }
                    }
                    ?>
                  </select>
                </div>
                <div class="col-md-6">
                  <label for="fees" class="form-label">Fees</label>
                  <input type="number" id="fees" class="form-control" name="fees" required>
                </div>
                <div class="col-md-6">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" id="email" class="form-control" name="docemail" required>
                </div>
                <div class="col-md-6">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" id="password" class="form-control" name="docpassword" required>
                </div>
                <div class="col-md-6">
                  <label for="image" class="form-label">Upload Image</label>
                  <input type="file" id="image" class="form-control" name="docimage" accept="image/*" required>
                </div>
              </div>
              <div class="mt-3">
                <button type="submit" class="btn btn-success" name="save_doctor">Save</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    function editDoctor(doctorCard) {
      document.getElementById("doctor_id").value = doctorCard.getAttribute("data-doctor-id");
      document.getElementById("doctorName").value = doctorCard.querySelector(".doctor-name").innerText;
      document.getElementById("department").value = doctorCard.querySelector(".doctor-department").innerText;
      document.getElementById("fees").value = doctorCard.querySelector(".doctor-fees").innerText.replace("Fees: Rs. ", "");
      const doctorModal = new bootstrap.Modal(document.getElementById("doctorModal"));
      doctorModal.show();
    }
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
  </div>
</body>
</html>
