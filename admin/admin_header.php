

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>College - Admin Login</title>
  </head>
  <body class="d-flex flex-column min-vh-100">
  
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="admin_home.php">College</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item"><a class="nav-link active" href="admin_gallery.php">Gallery</a></li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle active" href="#" data-bs-toggle="dropdown">Admission</a>
              <ul class="dropdown-menu">
                
                <li><a class="dropdown-item" href="admin_feeStructure.php">Fee Structure</a></li
                <li><a class="dropdown-item" href="studentDetail.php">Applied Students Detail</a></li>
                    
              </ul>
            </li>
            <li class="nav-item"><a class="nav-link active" href="admin_notice.php">Notice</a></li>
          </ul>
          <div class="d-flex">
            <a href="logout.php" class="btn btn-light">Logout</a>
          </div>
        </div>
      </div>
    </nav>
