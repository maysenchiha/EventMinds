<?php
session_start();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
                  <a href="#">Admin</a>
                </li>
              </ul>
            </div>
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                 <div class="card-header">
                    <div class="d-flex align-items-center">
                      <h4 class="card-title">Admin</h4>
                      <button class="btn btn-success btn-round ms-auto" data-bs-toggle="modal" data-bs-target="#addRowModal">
                        <i class="fa fa-plus"></i>Add Admin
                      </button>
                    </div>
                    <div class="modal fade" id="addRowModal" tabindex="-1" aria-labelledby="addRowModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="addRowModalLabel">Add New Admin</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <!-- Form for adding admin -->
                            <form action="add_admin.php" method="POST" onsubmit="return validatePassword()">
    <div class="mb-3">
        <label for="adminNom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="adminNom" name="nom" required>
    </div>
    <div class="mb-3">
        <label for="adminPrenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="adminPrenom" name="prenom" required>
    </div>
    <div class="mb-3">
        <label for="adminEmail" class="form-label">Email</label>
        <input type="email" class="form-control" id="adminEmail" name="email" required>
    </div>
    <div class="mb-3">
        <label for="adminPassword" class="form-label">Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="adminPassword" name="password" required>
            <span class="input-group-text  border-start-0" id="togglePassword1" style="cursor: pointer;">
                <i class="bi bi-eye" id="eyeIcon1"></i>
            </span>
        </div>
    </div>
    <div class="mb-3">
        <label for="confirmPassword" class="form-label">Confirm Password</label>
        <div class="input-group">
            <input type="password" class="form-control" id="confirmPassword" required>
            <span class="input-group-text  border-start-0" id="togglePassword2" style="cursor: pointer;">
                <i class="bi bi-eye" id="eyeIcon2"></i>
            </span>
        </div>
        <div id="passwordError" class="text-danger" style="display: none;">Passwords do not match.</div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add Admin</button>
    </div>
</form>
                          </div>
                        </div>
                      </div>
                    </div>
                 </div>

                  <div class="card-body">
                    <div class="table-responsive">
                      <table id="multi-filter-select" class="display table table-striped table-hover">
                        <thead>
                        <tr>
                          <th scope="col">First Name</th>
                          <th scope="col"class="text-center">Last Name</th>
                          <th scope="col"class="text-center">E-mail</th>
                          <th scope="col"class="text-center">Statut</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php include '../../images.php';
                          if (!empty($admins)) {
                              foreach ($admins as $event) {
                                  $usernom = htmlspecialchars($event['nom']);
                                  $userprenom = htmlspecialchars($event['prenom']);
                                  $useremail = htmlspecialchars($event['mail']);
                          ?>
                          <tr>
                            <td class="text-center"><?= $usernom ?></td>
                            <td class="text-center"><?=  $userprenom ?></td>
                            <td class="text-center"><?= $useremail ?></td>
                            <td class="text-center">
                              <div class="form-button-action">
                                <span class="badge badge-success me-2">Active</span>
                              </div>
                            </td>
                          </tr>
                          <?php
                              }
                          } else {
                              echo '<tr><td colspan="4" class="text-center">NO admins Yet.</td></tr>';
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
                    ThemeKita
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#"> Help </a>
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
    const togglePassword1 = document.getElementById("togglePassword1");
    const togglePassword2 = document.getElementById("togglePassword2");
    const passwordField = document.getElementById("adminPassword");
    const confirmPasswordField = document.getElementById("confirmPassword");
    const eyeIcon1 = document.getElementById("eyeIcon1");
    const eyeIcon2 = document.getElementById("eyeIcon2");

    // Fonction pour basculer le mot de passe
    const toggleVisibility = (toggle, field, icon) => {
        toggle.addEventListener("click", () => {
            const type = field.getAttribute("type") === "password" ? "text" : "password";
            field.setAttribute("type", type);
            icon.classList.toggle("bi-eye");
            icon.classList.toggle("bi-eye-slash");
        });
    };

    toggleVisibility(togglePassword1, passwordField, eyeIcon1);
    toggleVisibility(togglePassword2, confirmPasswordField, eyeIcon2);
</script>
    <script>
      function validatePassword() {
        // Récupérer les valeurs des mots de passe
        var password = document.getElementById("adminPassword").value;
        var confirmPassword = document.getElementById("confirmPassword").value;
        
        // Vérifier si les mots de passe correspondent
        if (password !== confirmPassword) {
          // Afficher un message d'erreur et empêcher l'envoi du formulaire
          document.getElementById("passwordError").style.display = "block";
          return false;  // Empêche la soumission du formulaire
        }
        
        // Si les mots de passe correspondent, masquer l'erreur (si présente)
        document.getElementById("passwordError").style.display = "none";
        return true;  // Permet de soumettre le formulaire
      }
    </script>
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
  document.getElementById("addAdminForm").addEventListener("submit", function (event) {
    event.preventDefault();

    // Récupérer les données du formulaire
    const adminName = document.getElementById("adminName").value;
    const adminEmail = document.getElementById("adminEmail").value;
    const adminPassword = document.getElementById("adminPassword").value;

    // Exemple : Envoyer les données à une API ou les afficher dans la console
    console.log({
      name: adminName,
      email: adminEmail,
      password: adminPassword,
    });

    // Fermer le modal après soumission
    const modal = bootstrap.Modal.getInstance(document.getElementById("addRowModal"));
    modal.hide();

    // Optionnel : Ajouter une notification
    alert("Admin added successfully!");
  });
</script>
  </body>
</html>
