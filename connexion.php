<?php
// Connexion à la base de données
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eventminds";

// Création de la connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérification de la connexion
if ($conn->connect_error) {
    die("Erreur de connexion à la base de données : " . $conn->connect_error);
}

// Initialisation de la variable d'erreur
$error = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Vérification des champs vides
    if (empty($_POST['email']) || empty($_POST['password'])) {
        $error = "Veuillez remplir tous les champs.";
    } else {
        // Récupérer les données du formulaire
        $email = $conn->real_escape_string($_POST['email']);
        $password = $_POST['password'];

        // Requête pour récupérer l'utilisateur
        $sql = "SELECT * FROM users WHERE mail = ?";
        $stmt = $conn->prepare($sql);
        
        if ($stmt) {
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows === 1) {
                $user = $result->fetch_assoc();

                // Vérifier le mot de passe
                if (password_verify($password, $user['password'])) {
                    // Démarrer une session et stocker les informations de l'utilisateur
                    session_start();
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['user_name'] = $user['nom'] . " " . $user['prenom'];
                    $_SESSION['user_role'] = $user['role']; // Ajouter le rôle à la session

                    // Vérification du rôle pour rediriger l'utilisateur
                    if ($_SESSION['user_role'] === 'admin') {
                        // Si l'utilisateur est un administrateur, rediriger vers la page d'administration
                        header("Location: ../new_version/admin/index.php");
                    } else {
                        // Sinon, rediriger vers la page d'accueil utilisateur
                        header("Location: user_home.php");
                    }
                    exit();
                } else {
                    $error = "E-mail ou mot de passe incorrect.";
                }
            } else {
                $error = "E-mail ou mot de passe incorrect.";
            }

            $stmt->close();
        } else {
            $error = "Erreur lors de la préparation de la requête.";
        }
    }
}

$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Events - Mentor Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <link href="assets/css/main.css" rel="stylesheet">
     <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>

</head>
<body>


<header id="header" class="header d-flex align-items-center sticky-top">
          <div class="container-fluid container-xl position-relative d-flex align-items-center">
      
            <a href="accueil.php" class="logo d-flex align-items-center me-auto" style="text-decoration: none;">
              <h1 class="sitename">EventMinds</h1>
            </a>
      
            <nav id="navmenu" class="navmenu">
              <ul>
                <li><a href="accueil.php">Home<br></a></li>
                <li><a href="about.html">About</a></li>
                <li class="dropdown"><a href="#"><span>Events</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                  <ul>
                    <li><a href="Comming_events.php">Coming events</a></li>
                    <li><a href="Completed_Events.php">Completed events</a></li>
                  </ul>
                </li>
                <li><a href="contact.html" >Contact</a></li>
              </ul>
              <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
      
            <a class="btn-getstarted" target="_blank" href="register.php">Sign Up</a>
      
          </div>
      </header>


    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100" data-aos="fade-up" data-aos-duration="1500">
            <div class="row d-flex justify-content-center align-items-center h-100">
               <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                    <div class="row g-0" >
                        <div class="col-lg-6">
                           <div class="card-body p-md-5 mx-md-4">
                            <div class="text-center">
                                <img src="assets\img\logo-removebg-preview (1).png" style="width: 300px;" alt="logo">
                                <br>
                                <br>
                            </div>

                                <form action="" method="POST">

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <label class="form-label" for="email">Email</label>
                                        <input type="email"  id="email" name="email" class="form-control" placeholder="Enter your email address" 
                                        value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" />
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                          <label class="form-label" for="password">Password</label>
                                          <div class="position-relative">
                                              <input type="password" id="password" name="password" class="form-control" placeholder="Enter your password" required />
                                              <span class="position-absolute top-50 end-0 translate-middle-y px-3" id="togglePassword" style="cursor: pointer;">
                                                  <i class="bi bi-eye" id="eyeIcon"></i>
                                              </span>
                                          </div>
                                      </div>

                                    <!-- Affichage de l'alerte si une erreur existe -->
                                    <?php if (!empty($error)): ?>
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <?= htmlspecialchars($error) ?>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="
                                                    margin-top: 0px;padding: 4px !important;font-size: 12px;}">
                                            </button>
                                        </div>
                                    <?php endif; ?>

                                    <div class="text-center pt-1 mb-5 pb-1">
                                        <button 
                                            class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" 
                                            type="submit" 
                                            style="border-color: var(--accent-color); background-color: var(--accent-color); width: auto;">
                                            Log In
                                        </button>
                                        <br>
                                        <a class="text-muted" href="#!" style="text-decoration: underline;">Forgot password?</a>
                                    </div>
                                </form>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                        <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                          <h4 class="mb-4">We are more than just a company</h4>
                          <p class="small mb-0">At EventMinds, we believe that organizing events should be seamless and enjoyable. 
                            Our platform is designed to empower individuals and organizations to plan, manage, and execute successful events,
                             whether they are conferences, workshops, corporate meetings, or social gatherings.</p>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </section>

    <footer id="footer" class="footer position-relative light-background">

        <div class="container footer-top">
          <div class="row gy-4">
            <div class="col-lg-4 col-md-6 footer-about">
              <a href="accueil.php" class="logo d-flex align-items-center">
                <span class="sitename">EventMinds</span>
              </a>
              <div class="footer-contact pt-3">
                <p>Bourghiba Street,Nabeul, Plage 8075</p>
                <p>Nabeul, Plage 8075</p>
                <p class="mt-3"><strong>Phone:</strong> <span>+2 5589 55488 55</span></p>
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
              </ul>
            </div>

            <div class="col-lg-2 col-md-3 footer-links">
              <h4>Our Services</h4>
              <ul>
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Product Management</a></li>
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

        <div class="container copyright text-center mt-4">
          <p>© <span>Copyright</span> <strong class="px-1 sitename">Mentor</strong> <span>All Rights Reserved</span></p>
          <div class="credits">
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>

      </footer>
</body>
<script>
    document.getElementById('togglePassword').addEventListener('click', function () {
        const passwordField = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        if (passwordField.type === 'password') {
            passwordField.type = 'text';
            eyeIcon.classList.remove('bi-eye');
            eyeIcon.classList.add('bi-eye-slash');
        } else {
            passwordField.type = 'password';
            eyeIcon.classList.remove('bi-eye-slash');
            eyeIcon.classList.add('bi-eye');
        }
    });
</script>
<script>
  AOS.init();
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>
