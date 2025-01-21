  <?php
  session_start();
  include 'user_data.php';
  ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Profile</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  
<!-- JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>


<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <link href="assets/css/style.css" rel="stylesheet">
  <style>
 .nav-item button:hover {
    color: #5fcf80; /* Green color on hover */
  }
</style>
  <style>
  /* Reduce margin between labels and inputs */
  .form-label {
    margin-bottom: 0.3rem; /* Reduce bottom margin of labels */
  }

  .form-control {
    margin-top: 0.3rem; /* Reduce top margin of inputs */
  }

  .row.mb-3 {
    margin-bottom: 0.8rem; /* Adjust spacing between rows */
  }
</style>
</head>

<body>

  <!---- Header ---->
    <header id="header" class="header fixed-top d-flex align-items-center">

      <div class="d-flex align-items-center justify-content-between">
        <a href="user_home.php" class="logo d-flex align-items-center">
          <h1 class="sitename">EventMinds</h1>
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
      </div><!-- End Logo -->
      <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <nav id="navmenu" class="navmenu">
          <ul>
            <li><a href="user_home.php">Home<br></a></li>
            <li><a href="comming.php">Coming events</a></li>
            <li><a href="completed.php" >Completed events</a></li>
          </ul>
        
        </nav>
      </div>
      <div class="search-bar">
        <form class="search-form d-flex align-items-center" method="POST" action="#">
          <input type="text" name="query" placeholder="Search" title="Enter search keyword">
          <button type="submit" title="Search"><i class="bi bi-search"></i></button>
        </form>
      </div><!-- End Search Bar -->

      <nav class="header-nav ms-auto">
        <ul class="d-flex align-items-center">

          <li class="nav-item d-block d-lg-none">
            <a class="nav-link nav-icon search-bar-toggle " href="#">
              <i class="bi bi-search"></i>
            </a>
          </li><!-- End Search Icon-->

          <li class="nav-item dropdown">

            <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
              <i class="bi bi-bell"></i>
              <span class="badge bg-primary badge-number">4</span>
            </a><!-- End Notification Icon -->

            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
              <li class="dropdown-header">
                You have 4 new notifications
                <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-exclamation-circle text-warning"></i>
                <div>
                  <h4>Lorem Ipsum</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>30 min. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-x-circle text-danger"></i>
                <div>
                  <h4>Atque rerum nesciunt</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>1 hr. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-check-circle text-success"></i>
                <div>
                  <h4>Sit rerum fuga</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>2 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>

              <li class="notification-item">
                <i class="bi bi-info-circle text-primary"></i>
                <div>
                  <h4>Dicta reprehenderit</h4>
                  <p>Quae dolorem earum veritatis oditseno</p>
                  <p>4 hrs. ago</p>
                </div>
              </li>

              <li>
                <hr class="dropdown-divider">
              </li>
              <li class="dropdown-footer">
                <a href="#">Show all notifications</a>
              </li>

            </ul><!-- End Notification Dropdown Items -->

          </li><!-- End Notification Nav -->


          <li class="nav-item dropdown pe-3">
              <?php include 'user_data.php'; ?>
              <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
                <?php
                // Vérifier si l'image est présente et non vide
                if (!empty($userPhoto)) {
                    // Si une photo est présente, l'encoder en base64
                    $imageSrc = 'data:image/jpeg;base64,' . base64_encode($userPhoto);
                }
                ?>
                <img src="<?php echo $imageSrc; ?>" alt="Photo de Profil" class="rounded-circle" >
                <!-- Affichage dynamique du prénom et du nom -->
                <span class="d-none d-md-block dropdown-toggle ps-2"><?= htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) ?></span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="Settings.php">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
          </li><!-- End Profile Nav -->

        </ul>
      </nav><!-- End Icons Navigation -->

    </header>
   <!-- End Header -->

   <!---- Sidebar ---->
    <aside id="sidebar" class="sidebar">

      <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
          <a class="nav-link collapsed" href="index.html">
            <i class="bi bi-grid"></i>
            <span>Dashboard</span>
          </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#forms-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-journal-text"></i><span>Forms</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="forms-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="forms-elements.html">
                <i class="bi bi-circle"></i><span>Form Elements</span>
              </a>
            </li>
            <li>
              <a href="forms-layouts.html">
                <i class="bi bi-circle"></i><span>Form Layouts</span>
              </a>
            </li>
            <li>
              <a href="forms-editors.html">
                <i class="bi bi-circle"></i><span>Form Editors</span>
              </a>
            </li>
            <li>
              <a href="forms-validation.html">
                <i class="bi bi-circle"></i><span>Form Validation</span>
              </a>
            </li>
          </ul>
        </li><!-- End Forms Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" data-bs-target="#icons-nav" data-bs-toggle="collapse" href="#">
            <i class="bi bi-gem"></i><span>Icons</span><i class="bi bi-chevron-down ms-auto"></i>
          </a>
          <ul id="icons-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
            <li>
              <a href="icons-bootstrap.html">
                <i class="bi bi-circle"></i><span>Bootstrap Icons</span>
              </a>
            </li>
            <li>
              <a href="icons-remix.html">
                <i class="bi bi-circle"></i><span>Remix Icons</span>
              </a>
            </li>
            <li>
              <a href="icons-boxicons.html">
                <i class="bi bi-circle"></i><span>Boxicons</span>
              </a>
            </li>
          </ul>
        </li><!-- End Icons Nav -->
        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-faq.html">
            <i class="bi bi-question-circle"></i>
            <span>F.A.Q</span>
          </a>
        </li><!-- End F.A.Q Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-contact.html">
            <i class="bi bi-envelope"></i>
            <span>Contact</span>
          </a>
        </li><!-- End Contact Page Nav -->

        <li class="nav-item">
          <a class="nav-link collapsed" href="pages-register.html">
            <i class="bi bi-card-list"></i>
            <span>Register</span>
          </a>
        </li><!-- End Register Page Nav -->

        <li class="nav-heading">Pages</li>

        <li class="nav-item" >
          <a class="nav-link collapsed" class="active" href="users-profile.html" >
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
          <a class="nav-link collapsed" href="connexion.html">
            <i class="bi bi-box-arrow-in-right"></i>
            <span>LogOut</span>
          </a>
        </li><!-- End Login Page Nav -->

      </ul>

    </aside>
   <!-- End Sidebar -->

   <!---- main ---->
    <main id="main" class="main">
      <section class="section profile">
        <div>
          <div>
            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">
                  <li class="nav-item">
                    <button class="nav-link active" id="tab-overview" data-bs-toggle="tab" data-bs-target="#profile-overview" onclick="changeColor(this)">My Coming Events</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" id="tab-edit" data-bs-toggle="tab" data-bs-target="#profile-edit" onclick="changeColor(this)">Add your new Event</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" id="tab-settings" data-bs-toggle="tab" data-bs-target="#profile-settings" onclick="changeColor(this)">Participation List</button>
                  </li>

                  <!-- Dropdown for event history -->
                  <li class="nav-item dropdown">
                    <button class="nav-link dropdown-toggle" id="eventsDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                      Events History
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="eventsDropdown">
                      <li class="nav-item">
                        <button class="nav-link" id="event1" data-bs-toggle="tab" data-bs-target="#approved-events" onclick="changeColor(this)">Approuved Events</button>
                      </li>
                      <li class="nav-item">
                        <button class="nav-link" id="event2" data-bs-toggle="tab" data-bs-target="#refused-events" onclick="changeColor(this)">Rejected Events</button>
                      </li>
                    </ul>
                  </li>
                </ul>

                <div class="tab-content pt-2">
                  <!-- les evenement que j'ai réalisé-->
                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <div id="courses" class="courses section"> 
                      <div class="container">
                        <div class="row">
                          <?php
                              include 'event_user.php';
                              if (count($events) > 0) { 
                                  foreach ($events as $row) { 
                          ?>
                          <!--Course -->
                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                              <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" alt="<?= htmlspecialchars($row['titre']) ?>">
                              <div class="course-content" style="-webkit-line-clamp: none !important;!i;!;">
                                <center><h3><a href="course-details.html"><?= htmlspecialchars($row['titre']) ?></a></h3></center>
                                <center><p class="fst-italic text-center">
                                  <?php
                                      $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                                      echo $dateTime->format('l, F jS \a\t g:i A');
                                  ?></p>
                                </center>
                                <p ><?= html_entity_decode($row['description']); ?></p>
                                <div class="d-flex justify-content-center align-self-end">
                                  <a href="#" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editEventModal" 
                                    data-id="<?= $row['id']; ?>"
                                    data-titre="<?= htmlspecialchars($row['titre']); ?>"
                                    data-description="<?= htmlspecialchars($row['description']); ?>"
                                    data-date="<?= $dateTime->format('Y-m-d'); ?>"
                                    data-heure="<?= $dateTime->format('H:i'); ?>"
                                    onclick="populateModal(this)">
                                    <i class="bi bi-pencil-square"></i> Edit
                                  </a>
                                  <a href="delete-event.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');" style="margin-left: 10px;">
                                      <i class="bi bi-trash"></i> Supprimer
                                  </a>
                              </div>
                              </div>
                            </div>
                          </div><!--Fin Course -->
                          <?php
                                  }
                              } else {
                                  echo "<p>No Programmed Events Yet.</p>";
                              }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Modale modification -->
                  <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title text-center" id="editEventModalLabel">Edit Your Event</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="edit-event.php">
                            <!-- Champ caché pour l'ID de l'événement -->
                            <input type="hidden" name="id" id="event-id">

                            <div class="mb-3">
                              <label for="titre" class="form-label">Event Title</label>
                              <input type="text" class="form-control" id="titre" name="titre" required>
                            </div>
                            <div class="mb-3">
                              <label for="description" class="form-label">Event Description</label>
                              <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                            </div>
                            <div class="mb-3">
                              <label for="date" class="form-label">Event Date</label>
                              <input type="date" class="form-control" id="date" name="date" required>
                            </div>
                            <div class="mb-3">
                              <label for="heure" class="form-label">Event Time</label>
                              <input type="time" class="form-control" id="heure" name="heure" required>
                            </div>
                            <div class="d-flex justify-content-center">
                              <button type="submit" class="btn btn-primary" style="background-color: var(--accent-color); border-color: var(--accent-color);">Save changes</button>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- ajouter new event -->
                  <div class="tab-pane fade profile-edit pt-3 justify-content-center align-items-center min-vh-100" id="profile-edit">

                    <form action="insert_event.php" method="POST" enctype="multipart/form-data">
                      <div class="container">
                        <!-- Event Image Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventImage" class="col-md-3 col-form-label text-end">Event Image</label>
                          <div class="col-md-8">
                            <input type="file" class="form-control" id="image" name="image" accept="image/*" required onchange="previewImage(event, 'thumbnailEvent')">
                            <div class="thumbnail-container" id="thumbnailEvent"></div>
                            <div class="pt-2">
                              <a href="#" class="btn btn-danger btn-sm" title="Remove selected image" onclick="removeImage('thumbnailEvent', 'image')">
                                <i class="bi bi-trash"></i>
                              </a>
                            </div>
                          </div>
                        </div>

                        <!-- Trainer Image Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="trainerImage" class="col-md-3 col-form-label text-end">Trainer Image</label>
                          <div class="col-md-8">
                            <input type="file" class="form-control" id="images" name="images" accept="image/*" required onchange="previewImage(event, 'thumbnailTrainer')">
                            <div class="thumbnail-container" id="thumbnailTrainer"></div>
                            <div class="pt-2">
                              <a href="#" class="btn btn-danger btn-sm" title="Remove selected image" onclick="removeImage('thumbnailTrainer', 'trainerImage')">
                                <i class="bi bi-trash"></i>
                              </a>
                            </div>
                          </div>
                        </div>

                        <!-- Event Title Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventTitle" class="col-md-3 col-form-label text-end">Event Title</label>
                          <div class="col-md-8">
                            <input name="eventTitle" type="text" class="form-control" id="eventTitle" placeholder="Enter the event title" required>
                          </div>
                        </div>

                        <!-- Event Description Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventDescription" class="col-md-3 col-form-label text-end">Description</label>
                          <div class="col-md-8">
                            <textarea name="eventDescription" class="form-control" id="eventDescription" style="height: 100px" placeholder="Describe the event" required></textarea>
                          </div>
                        </div>

                        <!-- Event Date Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventDate" class="col-md-3 col-form-label text-end">Date</label>
                          <div class="col-md-8">
                            <input name="eventDate" type="date" class="form-control" id="eventDate" required>
                          </div>
                        </div>

                        <!-- Event Time Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventTime" class="col-md-3 col-form-label text-end">Time</label>
                          <div class="col-md-8">
                            <input name="eventTime" type="time" class="form-control" id="eventTime" required>
                          </div>
                        </div>

                        <!-- Event Location Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventLocation" class="col-md-3 col-form-label text-end">Location</label>
                          <div class="col-md-8">
                            <input name="eventLocation" type="text" class="form-control" id="eventLocation" placeholder="Enter the address or location" required>
                          </div>
                        </div>

                        <!-- Event Type Section -->
                        <div class="mb-3 row d-flex align-items-center">
                          <label for="eventType" class="col-md-3 col-form-label text-end">Event Type</label>
                          <div class="col-md-8">
                            <select name="eventType" class="form-control" id="eventType" required>
                              <option value="conference">Conference</option>
                              <option value="workshop">Workshop</option>
                              <option value="meetup">Meetup</option>
                              <option value="webinar">Webinar</option>
                            </select>
                          </div>
                        </div>

                        <!-- Submit Button Section -->
                        <div class="text-center">
                          <button type="submit" class="btn btn-primary" style="background: var(--accent-color); color: var(--contrast-color); font-size: 14px; padding: 6px 14px; margin: 0; border-radius: 5px; border: none;">
                            Create Your Event
                          </button>
                        </div>

                      </div>
                    </form>
                  </div>

                  <!-- participation list event -->
                  <div class="tab-pane fade pt-3" id="profile-settings">
                    <div id="courses" class="courses section"> 
                        <div class="container">
                        <div class="row">
                          <?php
                              include 'participation.php';
                              if (count($userEvents) > 0) { 
                                  foreach ($userEvents as $row) { 
                            ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                              <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($row['titre']) ?>">
                                <div class="course-content">
                                  <div class="d-flex justify-content-end align-items-center mb-3">
                                    <p class="price">FREE</p>
                                </div>
                                    <center><h3><a href="course-details.html"><?= htmlspecialchars($row['titre']) ?></a></h3></center>
                                    <center><p class="fst-italic text-center">
                                      <?php
                                          $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                                          echo $dateTime->format('l, F jS \a\t g:i A');
                                      ?></p>
                                    </center>
                                    <div class="trainer d-flex justify-content-between align-items-center">
                                        <div class="trainer-profile d-flex align-items-center">
                                            <img class="img-fluid" alt="Trainer" src="data:image/jpeg;base64,<?= base64_encode($row['trainer_photot']) ?>">
                                        </div>
                                        <div>
                                            <i class="bi bi-person user-icon" style="margin-left: 85px"></i>&nbsp;35
                                            &nbsp;&nbsp;
                                            <i class="bi bi-heart"></i>&nbsp;65
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </div>
                          <?php
                                  }
                              }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- approved list event -->
                  <div class="tab-pane fade" id="refused-events">
                    <div class="container section-title" data-aos="fade-up">
                        <h2 style="margin-top: 5px;">List of Rejected Events :</h2>
                    </div>
                    <div id="courses" class="courses section"> 
                      <div class="container">
                        <div class="row">
                          <?php
                            include 'event_user.php';
                            if (count($rejectedEvents) > 0) { 
                                foreach ($rejectedEvents as $row) { 
                          ?>
                        
                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                              <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($row['titre']) ?>">
                              <div class="course-content"style="-webkit-line-clamp: none !important;!i;!;">
                                <center><h3><a href="course-details.html"><?= htmlspecialchars($row['titre']) ?></a></h3></center>
                                <center><p class="fst-italic text-center">
                                  <?php
                                      $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                                      echo $dateTime->format('l, F jS \a\t g:i A');
                                  ?></p>
                                </center>
                                <p ><?= html_entity_decode($row['description']); ?></p>

                                <div class="course-actions  d-flex justify-content-center">
                                  <a href="delete-event.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');" style="margin-left: 10px;">
                                      <i class="bi bi-trash"></i> Supprimer
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                                }
                            } else {
                                echo "<p>No Approved Events Yet</p>";
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                      
                  <!-- Refused list Events -->
                  <div class="tab-pane fade" id="approved-events">
                    <div class="container section-title" data-aos="fade-up">
                      <h2 style="margin-top: 5px;">List of Approuved Events :</h2>
                    </div>
                    <div id="courses" class="courses section"> 
                      <div class="container">
                        <div class="row">
                          <?php
                              include 'event_user.php';
                              if (count($ApprouvedEvents) > 0) { 
                                  foreach ($ApprouvedEvents as $row) { 
                          ?>
                          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                            <div class="course-item">
                              <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($row['titre']) ?>">
                              <div class="course-content" style="-webkit-line-clamp: none !important;!i;!;">
                                <center><h3><a href="course-details.html"><?= htmlspecialchars($row['titre']) ?></a></h3></center>
                                <center><p class="fst-italic text-center">
                                  <?php
                                      $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                                      echo $dateTime->format('l, F jS \a\t g:i A');
                                  ?></p>
                                </center>
                                <p ><?= html_entity_decode($row['description']); ?></p>
                                <div class="course-actions  d-flex justify-content-center" >
                                  <a href="delete-event.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet événement ?');" style="margin-left: 10px;">
                                      <i class="bi bi-trash"></i> Supprimer
                                  </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php
                                }
                            } else {
                                echo "<p>No Rejected Events Yet</p>";
                            }
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
   <!-- End main -->

   <!---- Footer ---->
    <footer id="footer" class="footer position-relative light-background">

      <div class="container footer-top">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6 footer-about">
            <a href="accueil.html" class="logo d-flex align-items-center">
              <span class="sitename">Mentor</span>
            </a>
            <div class="footer-contact pt-3">
              <p>A108 Adam Street</p>
              <p>New York, NY 535022</p>
              <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
              <p><strong>Email:</strong> <span>info@example.com</span></p>
            </div>
            <div class="social-links d-flex mt-4">
              <a href=""><i class="bi bi-twitter-x"></i></a>
              <a href=""><i class="bi bi-facebook"></i></a>
              <a href=""><i class="bi bi-instagram"></i></a>
              <a href=""><i class="bi bi-linkedin"></i></a>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About us</a></li>
              <li><a href="#">Services</a></li>
              <li><a href="#">Terms of service</a></li>
              <li><a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-2 col-md-3 footer-links">
            <h4>Our Services</h4>
            <ul>
              <li><a href="#">Web Design</a></li>
              <li><a href="#">Web Development</a></li>
              <li><a href="#">Product Management</a></li>
              <li><a href="#">Marketing</a></li>
              <li><a href="#">Graphic Design</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-12 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>

        </div>
      </div>

    </footer>
   <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.1.1/dist/purecounter_vanilla.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script src="assets/js/main2.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script>
   const chosenColor = "#5fcf80";  // This is the green color you want

   function changeColor(element) {
    // Reset the text color and border for all items
    let items = document.querySelectorAll('.nav-link');
    items.forEach(item => {
      item.style.color = "";  // Reset text color
      item.style.borderBottom = "";  // Reset the underline
    });

    // Set the chosen color to the clicked item
    element.style.color = chosenColor;
    element.style.borderBottom = `2px solid ${chosenColor}`;  // Green underline
  
  }
</script>
  <script>
    const urlParams = new URLSearchParams(window.location.search);
  if (urlParams.has('update_success') && urlParams.get('update_success') === 'true') {
    alert('Profile updated successfully!');
  }
    function populateModal(button) {
  // Récupérer les données de l'événement à partir de l'attribut "data-*"
  const id = button.getAttribute('data-id');
  const titre = button.getAttribute('data-titre');
  const description = button.getAttribute('data-description');
  const date = button.getAttribute('data-date');
  const heure = button.getAttribute('data-heure');

  // Remplir les champs du modal avec les valeurs correspondantes
  document.getElementById('event-id').value = id;
  document.getElementById('titre').value = titre;
  document.getElementById('description').value = description;
  document.getElementById('date').value = date;
  document.getElementById('heure').value = heure;
}
function previewImage(event, containerId) {
    const container = document.getElementById(containerId);
    container.innerHTML = ''; // Vide le conteneur avant d'ajouter une nouvelle image
    const file = event.target.files[0];

    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.style.maxWidth = '100px';
            img.style.maxHeight = '100px';
            img.style.margin = '5px';
            img.style.border = '1px solid #ccc';
            img.style.borderRadius = '5px';
            img.style.objectFit = 'cover';
            container.appendChild(img);
        };
        reader.readAsDataURL(file);
    }
}

function removeImage(containerId, inputId) {
    const container = document.getElementById(containerId);
    container.innerHTML = ''; // Vide le conteneur
    const input = document.getElementById(inputId);
    if (input) {
        input.value = ''; // Réinitialise le champ de fichier
    }
}
</script>

  

</body>

</html>