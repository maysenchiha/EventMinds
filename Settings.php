
<?php
// Toujours démarrer la session ici aussi avant d'inclure `user_data.php`
session_start();

// Inclure `user_data.php` qui récupère les informations de l'utilisateur
include 'user_data.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>My Acount Settings</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  

<!-- Script JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

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

  </header><!-- End Header -->
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
          <a class="nav-link collapsed" class="active" href="users-profile.php" >
            <i class="bi bi-person"></i>
            <span>Profile</span>
          </a>
        </li><!-- End Profile Page Nav -->


        <li class="nav-item">
          <a class="nav-link collapsed" href="connexion.php">
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
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <?php 
                  // Inclure le fichier user_data.php pour récupérer les données de l'utilisateur
                  include 'user_data.php'; 

                  // Vérifier si la photo de l'utilisateur existe
                  if (!empty($userPhoto)) {
                      // Encoder l'image en base64 pour l'affichage
                      $imageSrc = 'data:image/jpeg;base64,' . base64_encode($userPhoto);
                  }
                ?>
                <img src="<?php echo $imageSrc; ?>" alt="Profile" class="rounded-circle">
                <h2><?= $prenom . ' ' . $nom ?></h2>
                <div class="social-links mt-2">
                  <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                  <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                  <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                  <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>

          </div>

          <div class="col-xl-8">

            <div class="card">
              <div class="card-body pt-3">
                <!-- Bordered Tabs -->
                <ul class="nav nav-tabs nav-tabs-bordered">

                  <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                  </li>

                  <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                  </li>

                </ul>
                <div class="tab-content pt-2">

                  <div class="tab-pane fade show active profile-overview" id="profile-overview">
                    <?php include 'user_data.php'; ?>
                    <div class="row">
                      <div class="col-lg-3 col-md-4 label ">Full Name</div>
                      <div class="col-lg-9 col-md-8"><?= $prenom . ' ' . $nom ?></div>
                    </div>

                    <div class="row">
                      <div class="col-lg-3 col-md-4 label">Email</div>
                      <div class="col-lg-9 col-md-8"><?= $mail?></div>
                    </div>
                  </div>

                  <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                    <!-- Profile Edit Form -->
                    <form action="edit.php" method="POST" enctype="multipart/form-data">
                      <div class="row mb-3">
                        <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                        <div class="col-md-8 col-lg-9">
                          <!-- Image de profil actuelle -->
                          <img id="profileImagePreview" src="<?php echo $imageSrc; ?>" alt="Profile" class="profile-img">
                          
                          <div class="pt-2">
                            <a href="#" class="btn btn-primary btn-sm" id="uploadButton" title="Upload new profile image" onclick="document.getElementById('profileImage').click();">
                              <i class="bi bi-upload"></i>
                            </a>
                            
                            <a href="#" class="btn btn-danger btn-sm" id="removeButton" title="Remove my profile image" onclick="removeProfileImage();">
                              <i class="bi bi-trash"></i>
                            </a>
                            <input type="file" name="profileImage" id="profileImage" class="form-control" style="display:none;" accept="image/*" onchange="uploadImage(event)">
                          </div>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="First_Name" type="text" class="form-control" id="First_Name" value="<?php echo htmlspecialchars($prenom); ?>" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="company" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                        <div class="col-md-8 col-lg-9">
                            <input name="Last_Name" type="text" class="form-control" id="Last_Name" value="<?php echo htmlspecialchars($nom); ?>" required>
                        </div>
                      </div>

                      <div class="row mb-3">
                        <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                        <div class="col-md-8 col-lg-9">
                          <input name="email" type="email" class="form-control" id="email" value="<?php echo htmlspecialchars($mail); ?>" required>
                        </div>
                      </div>

                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" style="background-color: var(--accent-color); border-color: var(--accent-color);">Save Changes</button>
                      </div>
                    </form>
                  </div>
                  <!-- Formulaire de changement de mot de passe -->
                  <div class="tab-pane fade pt-3" id="profile-change-password">
                    <form method="POST" action="edit_password.php">
                      <div class="mb-3">
                        <label for="currentPassword" class="form-label">Mot de passe actuel</label>
                        <input type="password" class="form-control" id="currentPassword" name="password" required>
                      </div>
                      <div class="mb-3">
                        <label for="newPassword" class="form-label">Nouveau mot de passe</label>
                        <input type="password" class="form-control" id="newPassword" name="newpassword" required>
                      </div>
                      <div class="mb-3">
                        <label for="renewPassword" class="form-label">Confirmer le nouveau mot de passe</label>
                        <input type="password" class="form-control" id="renewPassword" name="renewpassword" required>
                      </div>
                      <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" style="background-color: var(--accent-color); border-color: var(--accent-color);">Save Changes</button>
                      </div>
                    </form>
                  </div>

                </div><!-- End Bordered Tabs -->

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
            <a href="user_home.php" class="logo d-flex align-items-center">
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
  
  <script>
    function removeProfileImage() {
    // Réinitialiser l'image à celle de la base de données
    var profileImagePreview = document.getElementById('profileImagePreview');
    profileImagePreview.src = '<?php echo $imageSrc; ?>'; // Image initiale
    profileImagePreview.style.display = 'block'; // S'assurer qu'elle est visible

    // Réinitialiser le champ de fichier (annuler l'upload)
    var profileImageInput = document.getElementById('profileImage');
    profileImageInput.value = ''; // Annuler la sélection d'image
 }

    function uploadImage(event) {
        var reader = new FileReader();
        reader.onload = function() {
            // Récupère l'image chargée et affiche-la dans la zone d'image de profil
            var output = document.getElementById('profileImagePreview');
            output.src = reader.result;  // La source de l'image est le résultat du FileReader
        };
        reader.readAsDataURL(event.target.files[0]);  // Lire l'image sélectionnée
    }
 </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main2.js"></script>

</body>

</html>