<?php
// Toujours démarrer la session ici aussi avant d'inclure `user_data.php`
session_start();

// Inclure `user_data.php` qui récupère les informations de l'utilisateur
include '../../user_data.php';

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <title>Admin Home</title>
    <meta
      content="width=device-width, initial-scale=1.0, shrink-to-fit=no"
      name="viewport"
    />
    <link
      rel="icon"
      href="../assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Fonts and icons -->
    <script src="../assets/js/plugin/webfont/webfont.min.js"></script>
    <script>
      WebFont.load({
        google: { families: ["Public Sans:300,400,500,600,700"] },
        custom: {
          families: [
            "Font Awesome 5 Solid",
            "Font Awesome 5 Regular",
            "Font Awesome 5 Brands",
            "simple-line-icons",
          ],
          urls: ["../assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>
<style>
    #alertMessage {
    position: fixed;
    top: 90px;
    right: 32px;
    font-size: 14px;
    z-index: 1050;
    width: 300px;
}
</style>
    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css" />
  </head>
  <style>
        .profile .profile-card h2 {
      font-size: 24px;
      font-weight: 700;
      color: #2c384e;
      margin: 10px 0 0 0;
    }

    .profile .profile-card .social-links a {
    font-size: 20px;
    display: inline-block;
    color: rgba(1, 41, 112, 0.5);
    line-height: 0;
    margin-right: 10px;
    transition: 0.3s;
}
.nav-tabs-bordered .nav-link.active {
    background-color: #fff;
    border-bottom: 2px solid #5fcf80;
    color: #5fcf80;
}
.nav-tabs-bordered .nav-link {
    margin-bottom: -2px;
    border: none;
    color: #2c384e;
    font-size: 18px;
}
.profile .profile-overview .label {
    font-weight: 600;
    color: rgba(1, 41, 112, 0.6);
    font-size :16px;
}
.profile .profile-overview .row {
    margin-bottom: 20px;
    font-size: 15px;
}
.profile .profile-card img {
    max-width: 120px;
}
.rounded-circle {
    border-radius: 50% !important;
}
.profile .profile-edit img {
    max-width: 120px;
}

img, svg {
    vertical-align: middle;
}
  </style>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
          <a href="../index.php" class="logo d-flex align-items-center me-auto">
             <h1 class="sitename"style="color: white;margin-top: 12px;">EventMinds</h1>
            </a>
            <div class="nav-toggle">
              <button class="btn btn-toggle toggle-sidebar">
                <i class="gg-menu-right"></i>
              </button>
              <button class="btn btn-toggle sidenav-toggler">
                <i class="gg-menu-left"></i>
              </button>
            </div>
            <button class="topbar-toggler more">
              <i class="gg-more-vertical-alt"></i>
            </button>
          </div>
          <!-- End Logo Header -->
        </div>
        <div class="sidebar-wrapper scrollbar scrollbar-inner">
          <div class="sidebar-content">
            <ul class="nav nav-secondary">
              <li class="nav-item ">
                <a data-bs-toggle="collapse" href="#dashboard" class="collapsed" aria-expanded="false">
                  <i class="fas fa-home"></i>
                  <p>Dashboard</p>
                </a>
              
              </li>
              <li class="nav-section">
                <span class="sidebar-mini-icon">
                  <i class="fa fa-ellipsis-h"></i>
                </span>
                <h4 class="text-section">Components</h4>
              </li>
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#base">
                  <i class="fas fa-layer-group"></i>
                  <p>Events</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="base">
                  <ul class="nav nav-collapse">
                  
                  <li>
                      <a href="../components/new.php">
                        <span class="sub-item">New Events</span>
                      </a>
                    </li>
                   <li>
                   <li>
                      <a href="../components/buttons.php">
                        <span class="sub-item">Coming Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="../components/notifications.php">
                        <span class="sub-item">Completed Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="../components/approuved.php">
                        <span class="sub-item">Approved & Rejected Evnets</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item active" >
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Users</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="../tables/tables.php">
                        <span class="sub-item">Simple user</span>
                      </a>
                    </li>
                    <li>
                      <a href="../tables/datatables.php">
                        <span class="sub-item ">Admin</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
              
              
            </ul>
          </div>
        </div>
      </div>
      <!-- End Sidebar -->

      <div class="main-panel">
        <div class="main-header">
          <div class="main-header-logo">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="dark">
              <a href="../index.html" class="logo">
                <img
                  src="../assets/img/kaiadmin/logo_light.svg"
                  alt="navbar brand"
                  class="navbar-brand"
                  height="20"
                />
              </a>
              <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                  <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                  <i class="gg-menu-left"></i>
                </button>
              </div>
              <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
              </button>
            </div>
            <!-- End Logo Header -->
          </div>
          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom">
            <div class="container-fluid">
              <nav
                class="navbar navbar-header-left navbar-expand-lg navbar-form nav-search p-0 d-none d-lg-flex"
              >
                <div class="input-group">
                  <div class="input-group-prepend">
                    <button type="submit" class="btn btn-search pe-1">
                      <i class="fa fa-search search-icon"></i>
                    </button>
                  </div>
                  <input
                    type="text"
                    placeholder="Search ..."
                    class="form-control"
                  />
                </div>
              </nav>

              <ul class="navbar-nav topbar-nav ms-md-auto align-items-center">
                <li
                  class="nav-item topbar-icon dropdown hidden-caret d-flex d-lg-none"
                >
                  <a
                    class="nav-link dropdown-toggle"
                    data-bs-toggle="dropdown"
                    href="#"
                    role="button"
                    aria-expanded="false"
                    aria-haspopup="true"
                  >
                    <i class="fa fa-search"></i>
                  </a>
                  <ul class="dropdown-menu dropdown-search animated fadeIn">
                    <form class="navbar-left navbar-form nav-search">
                      <div class="input-group">
                        <input
                          type="text"
                          placeholder="Search ..."
                          class="form-control"
                        />
                      </div>
                    </form>
                  </ul>
                </li>
               
                <li class="nav-item topbar-user dropdown hidden-caret">
                 <?php  include '../../user_data.php';?>
                  <a class="dropdown-toggle profile-pic" data-bs-toggle="dropdown" href="#" aria-expanded="false">
                   <?php
                    // Vérifier si l'image est présente et non vide
                    if (!empty($userPhoto)) {
                        // Si une photo est présente, l'encoder en base64
                        $imageSrc = 'data:image/jpeg;base64,' . base64_encode($userPhoto);
                    }
                    ?>
                    <img src="<?php echo $imageSrc; ?>" alt="Photo de Profil"class="avatar-img rounded-circle" >
                    <span class="profile-username">
                      <span class="fw-bold"><?= $prenom . ' ' . $nom ?></span>
                    </span>
                  </a>
                  <ul class="dropdown-menu dropdown-user animated fadeIn">
                  <div class="dropdown-user-scroll scrollbar-outer">
                      <li>
                        <div class="user-box">
                          <div class="avatar-lg">
                          <img src="<?php echo $imageSrc; ?>" alt="Photo de Profil"class="avatar-img rounded-circle" >
                          </div>
                          <div class="u-text">
                            <h4><?= $prenom?></h4>
                            <p class="text-muted"><?= $mail?></p>
                            
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../tables/profile.php">My Profile</a>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="../../logout.php">Logout</a>
                      </li>
                    </div>
                  </ul>
                </li>
              </ul>
            </div>
          </nav>
          <!-- End Navbar -->
        </div>

        <div class="container">
          <div class="page-inner">
            <div class="page-header">
              <h3 class="fw-bold mb-3">Tables</h3>
              <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                  <a href="#">
                    <i class="icon-home"></i>
                  </a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Tables</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Basic Tables</a>
                </li>
              </ul>
            </div>

      <section class="section profile">
      <?php
        if (isset($_SESSION['message'])) {
            echo '
            <div id="alertMessage" class="alert-dismissible fade show p-1 small" role="alert"> 
                ' . $_SESSION['message'] . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            unset($_SESSION['message']);
        }
        ?>
        <div class="row">
          <div class="col-xl-4">

            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <?php 
                  // Inclure le fichier user_data.php pour récupérer les données de l'utilisateur
                  include '../../user_data.php'; 

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
                    <?php include '../../user_data.php'; ?>
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
                    <form action="edit_user.php" method="POST" enctype="multipart/form-data">
                      <div class="row mb-3">
                          <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                          <div class="col-md-8 col-lg-9">
                              <!-- Image de profil actuelle -->
                              <img id="profileImagePreview" src="<?php echo $imageSrc; ?>" alt="Profile" class="profile-img">
                              
                              <div class="pt-2">
                                  <!-- Bouton pour télécharger une nouvelle image -->
                                  <a href="#" class="btn btn-primary btn-sm" id="uploadButton" title="Upload new profile image" onclick="document.getElementById('profileImage').click();">
                                      <i class="bi bi-upload"style="font-size: 13px;"></i>
                                  </a>
                                  
                                  <a href="#" class="btn btn-danger btn-sm" id="removeButton" title="Remove my profile image" onclick="removeProfileImage();">
                                      <i class="bi bi-trash"style="font-size: 13px;"></i>
                                  </a>
                                  
                                  <!-- Champ de fichier caché pour télécharger une image -->
                                  <input type="file" name="profileImage" id="profileImage" class="form-control" style="display:none;" accept="image/*" onchange="uploadImage(event)">
                              </div>
                          </div>
                       </div>

                        <!-- Autres champs de formulaire pour les informations utilisateur -->
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
                            <button type="submit" class="btn btn-primary" style="border-color: #5fcf80 !important ;background-color: #5fcf80 !important;">Save Changes</button>
                      </div>
                    </form>
                  </div>

                  <div class="tab-pane fade pt-3" id="profile-change-password">
                      

                      <!-- Formulaire de changement de mot de passe -->
                      <form method="POST" action="edit_mdp.php">
                     
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
                              <button type="submit" class="btn btn-primary" style="border-color: #5fcf80 !important ;background-color: #5fcf80 !important;">Save Changes</button>
                        </div>
                      </form>
                   </div>

                </div><!-- End Bordered Tabs -->

              </div>
            </div>

          </div>
        </div>
      </section>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid d-flex justify-content-between">
            <nav class="pull-left">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="http://www.themekita.com">
                    EventMinds
                  </a>
                </li>
                <li class="nav-item" style='margin: left -100px;'>
                  <a class="nav-link" href="#"> Contact US </a>
                  <h6>Bourghiba Street,Nabeul, Plage 8075</h6>
                  <br>
                  <h7>Nabeul, Plage 8075</h7>
                  <br>
                  <h7>Phone: +2 5589 55488 55</h7>
                  <br>
                  <h7>Email: info@example.com</h7>
                  <br>

                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Licenses </a>
                </li>
              </ul>
            </nav>
            <div class="copyright">
              2024, made with <i class="fa fa-heart heart text-danger"></i> by
              <a href="http://www.themekita.com">ThemeKita</a>
            </div>
            <div>
              Distributed by
              <a target="_blank" href="https://themewagon.com/">ThemeWagon</a>.
            </div>
          </div>
        </footer>
      </div>

    </div>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    
    <!-- jQuery Scrollbar -->
    <script src="../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Datatables -->
    <script src="../assets/js/plugin/datatables/datatables.min.js"></script>
    <!-- Kaiadmin JS -->
    <script src="../assets/js/kaiadmin.min.js"></script>
    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="../assets/js/setting-demo2.js"></script>
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
    <script>
      const alertMessage = document.getElementById('alertMessage');
        if (alertMessage) {
            setTimeout(() => {
                const alert = new bootstrap.Alert(alertMessage);
                alert.close();
            }, 3000);
        }
   </script>
  </body>
</html>
