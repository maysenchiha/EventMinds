<?php
// Connexion à la base de données
$servername = "localhost"; // ou 127.0.0.1
$username = "root";        // Utilisateur MySQL
$password = "";            // Mot de passe de l'utilisateur MySQL
$dbname = "eventminds"; // Nom de la base de données

// Création de la connexion
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Vérifier la connexion
if (!$conn) {
    die("La connexion a échoué : " . mysqli_connect_error());
}

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Vérifier si les clés existent dans $_POST avant de les utiliser
    if (isset($_POST['email'], $_POST['password'], $_POST['nom'], $_POST['prenom'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];

        // Vérifier si l'email existe déjà dans la base de données
        $query = "SELECT COUNT(*) FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email); // "s" pour string
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $emailExist);
        mysqli_stmt_fetch($stmt);
        mysqli_stmt_close($stmt);
        if ($emailExist > 0) {
          // Assurez-vous que l'alerte est avant tout code HTML
          echo "<script>window.alert('L\'email est déjà utilisé, veuillez en choisir un autre.');</script>";
          exit; // Empêche le reste du code de s'exécuter
      } else {
          // Code pour l'insertion si l'email est unique
          $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
          $query = "INSERT INTO users (email, password, nom, prenom) VALUES (?, ?, ?, ?)";
          $stmt = mysqli_prepare($conn, $query);
          mysqli_stmt_bind_param($stmt, "ssss", $email, $hashedPassword, $nom, $prenom);
          if (mysqli_stmt_execute($stmt)) {
              echo "<script>window.alert('Inscription réussie !');</script>";
          } else {
              echo "<script>window.alert('Erreur lors de l\'inscription.');</script>";
          }
          mysqli_stmt_close($stmt);
      }
    }
}

// Fermer la connexion
mysqli_close($conn);
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
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
          <a class="btn-getstarted" target="_blank" href="connexion.php">Sign  In</a>
        </div>
      </header>
      <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-xl-10"  data-aos="fade-up" data-aos-duration="1500">
              <div class="card rounded-3 text-black">
                <div class="row g-0">
                  <div class="col-lg-6">
                    <div class="card-body p-md-5 mx-md-4">

                      <div class="text-center">
                        <img src="assets\img\logo-removebg-preview (1).png" style="width: 300px;" alt="logo">
                        <br>
                        <br>
                      </div>
                      
                        
                    <!--  -->
                      <form method="POST" action="" onsubmit="return validateForm()">
                        <div class="form-outline mb-4">
                            <label class="form-label" for="signupFirstName">First Name</label>
                            <input type="text" id="signupFirstName" name="signupFirstName" class="form-control" placeholder="Enter your first name" />
                        </div>
                    
                        <div class="form-outline mb-4">
                            <label class="form-label" for="signupLastName">Last Name</label>
                            <input type="text" id="signupLastName" name="signupLastName" class="form-control" placeholder="Enter your last name" />
                        </div>
                    
                        <div class="form-outline mb-4">
                            <label class="form-label" for="signupEmail">Email</label>
                            <input type="email" id="signupEmail" name="signupEmail" class="form-control" placeholder="Enter your email address" />
                        </div>
                        
                        <div class="form-outline mb-4">
                          <label class="form-label" for="signupPassword">Password</label>
                          <div class="position-relative">
                              <input type="password" id="signupPassword" name="signupPassword" class="form-control" placeholder="Enter your password" />
                              <span class="position-absolute top-50 end-0 translate-middle-y px-3" id="togglePassword1" style="cursor: pointer;">
                                  <i class="bi bi-eye" id="eyeIcon1"></i>
                              </span>
                          </div>
                        </div>
                      
                       <div class="form-outline mb-4">
                        <label class="form-label" for="signupConfirmPassword">Confirm Password</label>
                        <div class="position-relative">
                            <input type="password" id="signupConfirmPassword" name="signupConfirmPassword" class="form-control" placeholder="Confirm your password" />
                            <span class="position-absolute top-50 end-0 translate-middle-y px-3" id="togglePassword2" style="cursor: pointer;">
                                <i class="bi bi-eye" id="eyeIcon2"></i>
                            </span>
                        </div>
                        </div>
                    
                        <div class="text-center pt-1 mb-5 pb-1">
                            <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" 
                                style="border-color: var(--accent-color);background-color: var(--accent-color);width: auto;">
                                Create
                            </button>
                        </div>
                      </form>

                    </div>
                  </div>
                  <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                    <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                      <h4 class="mb-4">Join the EventMinds community!</h4>
                      <p class="small mb-0">Discover, participate, and connect with like-minded individuals at various events and workshops. Sign up today and become a part of our growing network of enthusiasts.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Modal -->
<div class="modal fade" id="alertModal" tabindex="-1" aria-labelledby="alertModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="alertModalLabel">Erreur</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="modalMessage">
        <!-- Le message d'erreur sera affiché ici -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
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
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you've purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      
      </footer>
      <script src="assets/js/main.js"></script>
      <script>
          document.getElementById('togglePassword1').addEventListener('click', function () {
              const passwordField = document.getElementById('signupPassword');
              const eyeIcon = document.getElementById('eyeIcon1');
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

          document.getElementById('togglePassword2').addEventListener('click', function () {
              const passwordField = document.getElementById('signupConfirmPassword');
              const eyeIcon = document.getElementById('eyeIcon2');
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
 <script>
    function validateForm() {
        // Vérification des champs vides
        var email = document.getElementById("signupEmail").value;
        var password = document.getElementById("signupPassword").value;
        var confirmPassword = document.getElementById("signupConfirmPassword").value;

        if (email === "" || password === "" || confirmPassword === "") {
            alert("Tous les champs doivent être remplis.");
            return false;  // Empêche l'envoi du formulaire
        }

        // Vérification si les mots de passe correspondent
        if (password !== confirmPassword) {
            alert("Les mots de passe ne correspondent pas.");
            return false;  // Empêche l'envoi du formulaire
        }

        // Vérification du format de l'email
        var emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
        if (!email.match(emailPattern)) {
            alert("Veuillez entrer un email valide.");
            return false;  // Empêche l'envoi du formulaire
        }

        return true;  // Si tout est valide, le formulaire sera soumis
    }
</script>
      
</body>
</html>