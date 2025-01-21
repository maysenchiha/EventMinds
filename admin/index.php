<?php
// Toujours démarrer la session ici aussi avant d'inclure `user_data.php`
session_start();

// Inclure `user_data.php` qui récupère les informations de l'utilisateur
include '../user_data.php';
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
      href="assets/img/kaiadmin/favicon.ico"
      type="image/x-icon"
    />

    <!-- Fonts and icons -->
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>
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
          urls: ["assets/css/fonts.min.css"],
        },
        active: function () {
          sessionStorage.fonts = true;
        },
      });
    </script>

    <!-- CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/plugins.min.css" />
    <link rel="stylesheet" href="assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="assets/css/demo.css" />
  </head>
  <body>
    <div class="wrapper">
      <!-- Sidebar -->
      <div class="sidebar" data-background-color="dark">
        <div class="sidebar-logo">
          <!-- Logo Header -->
          <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo d-flex align-items-center me-auto">
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
              <li class="nav-item active">
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
                      <a href="components/new.php">
                        <span class="sub-item">New Events</span>
                      </a>
                    </li>
                   <li>
                   <li>
                      <a href="components/buttons.php">
                        <span class="sub-item">Coming Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/notifications.php">
                        <span class="sub-item">Completed Events</span>
                      </a>
                    </li>
                    <li>
                      <a href="components/approuved.php">
                        <span class="sub-item">Approved & Rejected Evnets</span>
                      </a>
                   <li>
                  </ul>
                </div>
              </li>
              
              <li class="nav-item">
                <a data-bs-toggle="collapse" href="#tables">
                  <i class="fas fa-table"></i>
                  <p>Users</p>
                  <span class="caret"></span>
                </a>
                <div class="collapse" id="tables">
                  <ul class="nav nav-collapse">
                    <li>
                      <a href="tables/tables.php">
                        <span class="sub-item">Simple Users</span>
                      </a>
                    </li>
                    <li>
                      <a href="tables/datatables.php">
                        <span class="sub-item">Admin</span>
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
            <a href="index.php" class="logo d-flex align-items-center me-auto">
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
          <!-- Navbar Header -->
          <nav class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
          >
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
                 <?php  include '../user_data.php';?>
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
                        <a class="dropdown-item" href="tables/profile.php">My Profile</a>
                        <div class="dropdown-divider"></div>
                        
                        <a class="dropdown-item" href="../logout.php">Logout</a>
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
            <div class="row">
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-primary bubble-shadow-small"
                        >
                          <i class="fas fa-users"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                        <?php include 'counts.php'; ?>
                          <p class="card-category">Users</p>
                          <h4 class="card-title"><?= $userCount ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                          <i class="fas fa-user-check"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Admin</p>
                          <h4 class="card-title"><?= $adminCount ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-success bubble-shadow-small"
                        >
                          <i class="fas fa-luggage-cart"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Coming Events</p>
                          <h4 class="card-title"><?= $coming ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-md-3">
                <div class="card card-stats card-round">
                  <div class="card-body">
                    <div class="row align-items-center">
                      <div class="col-icon">
                        <div
                          class="icon-big text-center icon-secondary bubble-shadow-small"
                        >
                          <i class="far fa-check-circle"></i>
                        </div>
                      </div>
                      <div class="col col-stats ms-3 ms-sm-0">
                        <div class="numbers">
                          <p class="card-category">Completed Events</p>
                          <h4 class="card-title"><?= $completed ?></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-8">


               <div class="card">
                  <div class="card-header">
                    <div class="card-title">Events Pie Chart</div>
                  </div>
                  <div class="card-body">
                    <div class="chart-container">
                      <canvas id="pieChart" style="width: 25%; height: 25%"></canvas>
                    </div>
                  </div>
                </div>


                <div class="card card-round">
                  
                <div class="col-md-6">

                
              </div>
                </div>
              </div>
              <div class="col-md-4">
                <div class="card card-round">
                    <div class="card-body">
                        <div class="card-head-row card-tools-still-right">
                            <div class="card-title">New Users</div>
                        </div>
                        <div class="card-list py-4">
                            <?php 
                            // Inclure le fichier qui contient la requête SQL pour récupérer les utilisateurs
                            include 'list_users.php'; 
                            
                            // Afficher chaque utilisateur
                            if (isset($result) && mysqli_num_rows($result) > 0) {
                                while ($user = mysqli_fetch_assoc($result)) {
                                    $prenom = $user['prenom'];
                                    $nom = $user['nom'];
                                    $mail = $user['mail'];
                                    $userPhoto = $user['user_photo']; // Récupérer l'image sous forme de BLOB

                                    // Vérifier si l'image existe
                                    if ($userPhoto) {
                                        // Convertir l'image BLOB en base64 pour l'affichage
                                        $imageData = base64_encode($userPhoto);
                                        $imageSrc = 'data:image/jpeg;base64,' . $imageData; // Affichage sous forme d'image
                                    } else {
                                        // Si aucune image n'est définie, utiliser une image par défaut
                                        $imageSrc = 'path/to/default/image.jpg'; // Remplacez ce chemin par celui de votre image par défaut
                                    }

                                    // Affichage dynamique de chaque utilisateur
                                    echo '
                                    <div class="item-list">
                                        <div class="avatar">
                                            <img src="' . $imageSrc . '" alt="..." class="avatar-img rounded-circle" />
                                        </div>
                                        <div class="info-user ms-3">
                                            <div class="username">' . htmlspecialchars($prenom) . ' ' . htmlspecialchars($nom) . '</div>
                                            <div class="status">' . htmlspecialchars($mail) . '</div>
                                        </div>
                                        <button class="btn btn-icon btn-link op-8 me-1">
                                            <i class="far fa-envelope"></i>
                                        </button>
                                        <button class="btn btn-icon btn-link btn-danger op-8">
                                            <i class="fas fa-ban"></i>
                                        </button>
                                    </div>';
                                }
                            } else {
                                echo '<p>Aucun utilisateur trouvé.</p>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>

            </div>
            
            <div class="row">
              <div class="col-md-12 " >
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Completed Events</div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Titre</th>
                              <th scope="col" class="text-end">Date & Time</th>
                              <th scope="col" class="text-end">Lieu</th>
                              <th scope="col" class="text-end">Type</th>
                              <th scope="col" class="text-end">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php include '../images.php';
                            if (!empty($complet)) {
                                foreach ($complet as $event) {
                                    $eventDateTime = htmlspecialchars($event['datetime']);
                                    $eventLieu = htmlspecialchars($event['lieu']);
                                    $eventType = htmlspecialchars($event['type']);
                            ?>
                                    <tr>
                                        <th scope="row"><?= htmlspecialchars($event['titre']) ?></th>
                                        <td class="text-end"><?= $eventDateTime ?></td>
                                        <td class="text-end"><?= $eventLieu ?></td>
                                        <td class="text-end"><?= $eventType ?></td>
                                        <td class="text-end">
                                          <span class="badge badge-success">Completed</span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="4" class="text-center">Aucun événement trouvé.</td></tr>';
                            }
                            ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
              
              <div class="col-md-12">
                <div class="card card-round">
                  <div class="card-header">
                    <div class="card-head-row card-tools-still-right">
                      <div class="card-title">Coming Events</div>
                      
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- Projects table -->
                      <table class="table align-items-center mb-0">
                          <thead class="thead-light">
                            <tr>
                              <th scope="col">Titre</th>
                              <th scope="col" class="text-end">Date & Time</th>
                              <th scope="col" class="text-end">Lieu</th>
                              <th scope="col" class="text-end">Type</th>
                              <th scope="col" class="text-end">Status</th>
                            </tr>
                          </thead>
                          <tbody>
                          <?php include '../images.php';
                            if (!empty($completc)) {
                                foreach ($completc as $event) {
                                    $eventDateTime = htmlspecialchars($event['datetime']);
                                    $eventLieu = htmlspecialchars($event['lieu']);
                                    $eventType = htmlspecialchars($event['type']);
                            ?>
                                    <tr>
                                        <th scope="row"><?= htmlspecialchars($event['titre']) ?></th>
                                        <td class="text-end"><?= $eventDateTime ?></td>
                                        <td class="text-end"><?= $eventLieu ?></td>
                                        <td class="text-end"><?= $eventType ?></td>
                                        <td class="text-end">
                                          <span class="badge badge-warning">Coming</span>
                                        </td>
                                    </tr>
                            <?php
                                }
                            } else {
                                echo '<tr><td colspan="4" class="text-center">Aucun événement trouvé.</td></tr>';
                            }
                            ?>
                          </tbody>
                        </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script>
  fetch('plots.php')
    .then(response => {
        // Vérifier si la réponse est ok (code 200)
        if (!response.ok) {
            throw new Error('Erreur de requête : ' + response.statusText);
        }
        return response.json(); // On s'attend à une réponse JSON
    })
    .then(data => {
        // Vérifier si les données ont le bon format
        if (data.labels && data.data) {
            var labels = data.labels;
            var chartData = data.data;

            var pieChart = document.getElementById("pieChart").getContext("2d");

            new Chart(pieChart, {
                type: "pie", // Type de graphique
                data: {
                    labels: labels, // Utiliser les labels dynamiques
                    datasets: [{
                        data: chartData, // Utiliser les données dynamiques
                        backgroundColor: ["#1d7af3", "#f3545d", "#fdaf4b", "#32e4f7", "#3ae3a5"], // Couleurs du graphique
                        borderWidth: 0
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    legend: {
                        position: "bottom",
                        labels: {
                            fontColor: "rgb(154, 154, 154)",
                            fontSize: 11,
                            usePointStyle: true,
                            padding: 20
                        }
                    },
                    pieceLabel: {
                        render: "percentage",
                        fontColor: "white",
                        fontSize: 14
                    },
                    tooltips: false,
                    layout: {
                        padding: {
                            left: 20,
                            right: 20,
                            top: 20,
                            bottom: 20
                        }
                    }
                }
            });
        } else {
            console.error('Données manquantes ou erreur dans la réponse:', data);
        }
    })
    .catch(error => {
        console.error('Erreur de récupération des données:', error);
    });
</script>
    <script src="assets/js/core/jquery-3.7.1.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

    <!-- Chart JS -->
    <script src="assets/js/plugin/chart.js/chart.min.js"></script>

    <!-- jQuery Sparkline -->
    <script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

    <!-- Chart Circle -->
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>

    <!-- Datatables -->
    <script src="assets/js/plugin/datatables/datatables.min.js"></script>

    <!-- Bootstrap Notify -->
    <script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Vector Maps -->
    <script src="assets/js/plugin/jsvectormap/jsvectormap.min.js"></script>
    <script src="assets/js/plugin/jsvectormap/world.js"></script>

    <!-- Sweet Alert -->
    <script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

    <!-- Kaiadmin JS -->
    <script src="assets/js/kaiadmin.min.js"></script>

    <!-- Kaiadmin DEMO methods, don't include it in your project! -->
    <script src="assets/js/setting-demo.js"></script>
    <script src="assets/js/demo.js"></script>
    <script>
      $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#177dff",
        fillColor: "rgba(23, 125, 255, 0.14)",
      });

      $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#f3545d",
        fillColor: "rgba(243, 84, 93, .14)",
      });

      $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
        type: "line",
        height: "70",
        width: "100%",
        lineWidth: "2",
        lineColor: "#ffa534",
        fillColor: "rgba(255, 165, 52, .14)",
      });
    </script>
  </body>
</html>
