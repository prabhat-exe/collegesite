<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>College</title>
  </head>
  <body>
  <!-- <?php session_start(); ?> -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">College</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="gallery.php">Gallery</a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle active" href="#" id="admissionDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Admission
            </a>
            <ul class="dropdown-menu" aria-labelledby="admissionDropdown">
              <li><a class="dropdown-item" href="admissionProcess.php">Admission Process</a></li>
              <li><a class="dropdown-item" href="feesStructure.php">Fee Structure</a></li>
              <li><a class="dropdown-item" href="scholarship.php">Scholarships</a></li>
              <?php if (!isset($_SESSION['user_id'])): ?>
                <li><a class="dropdown-item" href="apply.php">Apply Now</a></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="converted_text.pdf" download>Confused???</a></li>
            </ul>
          </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="notices.php" >Notice</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="course.php" >Course</a>
        </li>
      </ul>
      <div class="d-flex">
        <?php if (isset($_SESSION['user_id'])): ?>
          <a href="Dashboard.php" class="btn btn-primary me-2">Dashboard</a>
          <a href="logout.php" class="btn btn-danger">Logout</a>
        <?php else: ?>
          <a href="login.php" class="btn btn-outline-light me-2">Login</a>
          <a href="signUp.php" class="btn btn-light">Sign Up</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</nav>
