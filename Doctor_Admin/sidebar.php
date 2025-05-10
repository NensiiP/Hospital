
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Doctor Admin Dashboard</title>
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
        <i class="bi bi-house-door me-4"></i> Dashboard
      </a>
      <a href="appointment.php" class="d-flex align-items-center">
      <i class="bi bi-table me-4"></i> Appointment List
      </a>
      <a href="prescription.php" class="d-flex align-items-center">
        <i class="bi bi-person-vcard me-4"></i> Priscription
      </a>
      
  </div>
  </div>

  <!-- Header -->
  <div class="header">
    <button class="btn btn-light d-md-none">
      <i class="bi bi-list"></i>
    </button>
    <div>
      <input type="text" class="form-control d-inline w-auto" placeholder="Search...">
      <button class="btn btn-outline-light" type="submit">Search</button>
    </div>
    <div class="dropdown">
    <i class="bi bi-envelope me-3"></i>
      <i class="bi bi-bell me-3"></i>
      <span>Hi, <?php echo $doctor ?></span>
        <button class="btn btn-link dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="../Admin/images/profile.png" class="rounded-circle ms-2" alt="Profile" width="40">
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">My Profile</a></li>
          <li><a class="dropdown-item" href="../logout.php">Logout</a></li>
        </ul>
      </div>
  </div>  

</body>
</html>
