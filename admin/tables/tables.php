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

    <!-- CSS Files -->
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../assets/css/plugins.min.css" />
    <link rel="stylesheet" href="../assets/css/kaiadmin.min.css" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="../assets/css/demo.css" />
  </head>
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
          <nav
            class="navbar navbar-header navbar-header-transparent navbar-expand-lg border-bottom"
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
                  <a href="#">Users</a>
                </li>
                <li class="separator">
                  <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                  <a href="#">Simple Users</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Users</h4>
                      
                    </div>
                    
                  </div>
                  <div class="card-body">
                    
                    <div class="table-responsive">
                    <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col" class="text-center">Last Name</th>
                          <th scope="col" class="text-center">E-mail</th>
                          <th scope="col" class="text-center">Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        include '../../images.php';
                        if (!empty($users)) {
                            foreach ($users as $event) {
                                $userId = $event['id'];  // ID de l'utilisateur
                                $userNom = htmlspecialchars($event['nom']);
                                $userPrenom = htmlspecialchars($event['prenom']);
                                $userEmail = htmlspecialchars($event['mail']);
                                $userStatus= htmlspecialchars($event['status']);
                                $status = $event['status'];  // Le statut actuel de l'utilisateur
                        ?>
                        <tr>
                            <td class="text-center"><?= $userNom ?></td>
                            <td class="text-center"><?=  $userPrenom ?></td>
                            <td class="text-center"><?= $userEmail ?></td>
                            <td class="text-center">
                              <div class="form-button-action">
                                <?php if ($userStatus === 'blocked'): ?>
                                  <!-- Si l'utilisateur est bloqué, afficher le bouton "Block" et masquer "Activate" -->
                                  <button id="approveButton_<?= $userId ?>" class="badge badge-success me-2" style="display: none;" 
                                          onclick="unblockUserStatus(<?= $userId ?>)">Active</button>
                                  <button id="rejectButton_<?= $userId ?>" class="badge badge-danger" 
                                          onclick="blockUserStatus(<?= $userId ?>)">Block</button>
                                <?php else: ?>
                                  <!-- Si l'utilisateur est actif, afficher le bouton "Activate" et masquer "Block" -->
                                  <button id="approveButton_<?= $userId ?>" class="badge badge-success me-2" 
                                          onclick="unblockUserStatus(<?= $userId ?>)">Active</button>
                                  <button id="rejectButton_<?= $userId ?>" class="badge badge-danger" style="display: none;" 
                                          onclick="blockUserStatus(<?= $userId ?>)">Block</button>
                                <?php endif; ?>
                              </div>
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
      $(document).ready(function () {
        $("#basic-datatables").DataTable({});

        $("#multi-filter-select").DataTable({
          pageLength: 5,
          initComplete: function () {
            this.api()
              .columns()
              .every(function () {
                var column = this;
                var select = $(
                  '<select class="form-select"><option value=""></option></select>'
                )
                  .appendTo($(column.footer()).empty())
                  .on("change", function () {
                    var val = $.fn.dataTable.util.escapeRegex($(this).val());

                    column
                      .search(val ? "^" + val + "$" : "", true, false)
                      .draw();
                  });

                column
                  .data()
                  .unique()
                  .sort()
                  .each(function (d, j) {
                    select.append(
                      '<option value="' + d + '">' + d + "</option>"
                    );
                  });
              });
          },
        });

        // Add Row
        $("#add-row").DataTable({
          pageLength: 5,
        });

        var action =
          '<td> <div class="form-button-action"> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-bs-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

        $("#addRowButton").click(function () {
          $("#add-row")
            .dataTable()
            .fnAddData([
              $("#addName").val(),
              $("#addPosition").val(),
              $("#addOffice").val(),
              action,
            ]);
          $("#addRowModal").modal("hide");
        });
      });
    </script>
<script>
function blockUserStatus(userId) {
    var xhr = new XMLHttpRequest();

    // Configurer la requête AJAX pour bloquer l'utilisateur
    xhr.open("POST", "../update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envoi de la requête pour bloquer l'utilisateur
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200 && response.success) {
                    // Si la mise à jour du statut est réussie, actualiser les boutons
                    if (response.status === "blocked") {
                        // Lorsque l'utilisateur est bloqué, on cache le bouton "Activate" et affiche "Block"
                        document.getElementById('approveButton_' + userId).style.display = 'inline-block';
                        document.getElementById('rejectButton_' + userId).style.display = 'none';
                    }
                } else {
                    console.error("Erreur lors de la mise à jour du statut de l'utilisateur : ", response.message);
                }
            } catch (e) {
                console.error("Erreur lors du parsing JSON : ", e);
                console.log("Réponse brute : ", xhr.responseText);
            }
        }
    };

    // Envoi de l'ID de l'utilisateur pour le bloquer
    xhr.send("userId=" + userId + "&status=blocked");
}
function unblockUserStatus(userId) {
    var xhr = new XMLHttpRequest();

    // Configurer la requête AJAX pour débloquer l'utilisateur
    xhr.open("POST", "../update.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    // Envoi de la requête pour débloquer l'utilisateur
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            try {
                var response = JSON.parse(xhr.responseText);

                if (xhr.status == 200 && response.success) {
                    // Si la mise à jour du statut est réussie, actualiser les boutons
                    if (response.status === "active") {
                        // Lorsque l'utilisateur est activé, on cache "Block" et affiche "Activate"
                        document.getElementById('rejectButton_' + userId).style.display = 'inline-block';
                        document.getElementById('approveButton_' + userId).style.display = 'none';
                    }
                } else {
                    console.error("Erreur lors de la mise à jour du statut de l'utilisateur : ", response.message);
                }
            } catch (e) {
                console.error("Erreur lors du parsing JSON : ", e);
                console.log("Réponse brute : ", xhr.responseText);
            }
        }
    };

    // Envoi de l'ID de l'utilisateur pour le débloquer
    xhr.send("userId=" + userId + "&status=active");
}
</script>

  </body>
</html>
