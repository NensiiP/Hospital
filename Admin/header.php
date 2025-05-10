<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Novena Hospital</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

  <!-- Font Awesome (for the icons if needed) -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  
  <style>
    
    .navbar .logo img {
      width: 50px;
      height: 50px;
      object-fit: cover;
    }
    .navbar .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      object-fit: cover;
    }
    .dropdown-menu {
      min-width: 150px;
    }

    
  </style>
</head>
<body>

<!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
      <!-- Logo on the left side -->
      <a class="navbar-brand logo" href="#">
        <img src="https://via.placeholder.com/50" alt="Logo">
      </a>
      
      <!-- Toggle button for mobile responsiveness 
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>-->
      
      <!-- Center search bar and button 
      <div class="collapse navbar-collapse" id="navbarNav">
        <form class="d-flex mx-auto">
          <input class="form-control me-2" type="search" placeholder="Search..." aria-label="Search">
          <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
      </div>-->
      
      <!-- Profile picture on the right side -->
      <div class="dropdown">
        <button class="btn btn-link dropdown-toggle p-0" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
          <img src="https://via.placeholder.com/40" alt="Profile Picture">
        </button>
        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
          <li><a class="dropdown-item" href="#">My Profile</a></li>
          <li><a class="dropdown-item" href="#">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>
<!-- End Navbar -->



  <!-- Bootstrap JS (for dropdown functionality) -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

          