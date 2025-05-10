

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
  <style>
    body {
      display: flex;
    }
    .sidebar {
      height: 100vh;
      width: 250px;
      background-color: #2a2f3a;
      color: #fff;
      position: fixed;
    }
    .sidebar a {
      color: #b8c2cc;
      text-decoration: none;
      padding: 10px 15px;
      display: block;
    }
    .sidebar a:hover {
      background-color: #434a54;
      color: #fff;
    }
    .header {
      background-color: #2a2f3a;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 15px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      position: fixed;
      left: 250px;
      right: 0;
      z-index: 1;
      color: #fff
    }
    .content {
      margin-left: 250px;
      padding: 70px 20px;
      flex-grow: 1;
    }

    /* Tablet and below */
@media (max-width: 768px) {
  .sidebar {
    width: 70px;
  }

  .sidebar h2 {
    font-size: 1rem;
  }

  .sidebar a {
    justify-content: center;
    padding: 10px;
  }

  .sidebar a i {
    margin-right: 0;
  }

  .sidebar a::after {
    content: '';
    display: none;
  }

  .sidebar a span,
  .sidebar h2 {
    display: none;
  }

  .header {
    left: 70px;
  }

  .content {
    margin-left: 70px;
  }
}

/* Mobile (smaller refinements) */
@media (max-width: 576px) {
  .sidebar {
    width: 60px;
  }

  .header {
    left: 60px;
  }

  .content {
    margin-left: 60px;
  }
}

  </style>
</head>
<body>

  <!-- Sidebar -->
  <div class="sidebar">
    <div class="p-2 text-center">
      <h2>NOVENA</h2>
    </div>
    <div class="p-4">
      <a href="dashboard.php" class="d-flex align-items-center">
        <i class="bi bi-house-door me-4"></i> <span>Dashboard</span>
      </a>
      <a href="appointment.php" class="d-flex align-items-center">
      <i class="bi bi-table me-4"></i><span>Appointment List</span>
      </a>
      <a href="pationt.php" class="d-flex align-items-center">
      <i class="bi bi-person-wheelchair me-4"></i> <span>Pationt List</span>
      </a>
      <a href="doctor.php" class="d-flex align-items-center">
        <i class="bi bi-person me-4"></i> <span>Doctor</span>
      </a>
      <a href="department.php" class="d-flex align-items-center">
        <i class="bi bi-hospital me-4"></i> <span>Department</span>
      </a>
      <a href="prescription.php" class="d-flex align-items-center">
        <i class="bi bi-person-vcard me-4"></i> <span>Priscription</span>
      </a>
      <a href="query.php" class="d-flex align-items-center">
        <i class="bi bi-messenger me-4"></i> <span>Query</span>
      </a>
  </div>
  </div>

  <!-- Header -->
  <div class="header">
   <div></div>
    <div class="dropdown">
      <span>Welcome, Admin</span>
        <button class="btn btn-link dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="images/profile.png" class="rounded-circle ms-2" alt="Profile" width="40">
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">My Profile</a></li>
          <li><a class="dropdown-item" href="logout1.php">Logout</a></li>
        </ul>
      </div>
  </div>  

</body>
</html>
