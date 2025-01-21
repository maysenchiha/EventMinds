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
    die("La connexion a échoué : " . $conn->connect_error);
}

// Initialisation de la variable d'erreur
$error = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Requête pour récupérer l'utilisateur
    $sql = "SELECT * FROM users WHERE mail = ?";
    $stmt = $conn->prepare($sql);
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

            // Rediriger vers la page d'accueil de l'utilisateur
            echo "<script>window.location.href = 'user_home.php';</script>";
            exit();
        } else {
            // Mot de passe incorrect
            $error = "Mot de passe incorrect.";
        }
    } else {
        // Aucun utilisateur trouvé
        $error = "Aucun compte trouvé avec cet e-mail.";
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Index - Mentor Bootstrap Template</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Mentor
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <a href="accueil.php" class="logo d-flex align-items-center me-auto">
        <h1 class="sitename">EventMinds</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="accueil.php"class="active">Home<br></a></li>
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

      <a class="btn-getstarted" target="_blank" href="connexion.php">Sign In</a>
      <a class="btn-getstarted" target="_blank" href="register.php">Sign Up</a>

    </div>
  </header>

  <main class="main">
      <!--********************Hello Section***************************** -->
      <section id="hero" class="hero section dark-background">

        <img src="assets/img/fond.jpg" alt="" data-aos="fade-in">

        <div class="container">
          <h2 data-aos="fade-up" data-aos-delay="100">Upcoming Events,<br> Endless Possibilities...</h2>
          <p data-aos="fade-up" data-aos-delay="200">
            Explore a wide range of events tailored to your interests and passions. Don’t miss out on exciting opportunities!"</p>
        </div>
      </section>

      <!--********************Count Section***************************** -->
      <section id="counts" class="section counts light-background">
          <div class="container">
            <div class="row justify-content-center align-items-center">
                
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="586" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Completed Events</p>
                    </div>
                </div>
                <!-- End 1st Item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="420" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Clients</p>
                    </div>
                </div>
                <!-- End Stats Item -->
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="stats-item text-center w-100 h-100">
                        <span data-purecounter-start="0" data-purecounter-end="42" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Coming Events</p>
                    </div>
                </div>
                <!-- End Stats Item -->
            </div>
          </div>
      </section>

      <!--********************Coming Events Section******************** -->
      <section id="courses" class="courses section">
        <div class="container section-title" data-aos="fade-up"style="margin-bottom: -40px;">
          <h2>Events</h2>
          <p>Coming Events</p>
        </div>  

        <div class="container">
          <div class="row">
            <?php
                include 'images.php';
                if ($result3->num_rows > 0) {
                    while ($row = $result3->fetch_assoc()) {
            ?>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
              <div class="course-item">
                <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($row['titre']) ?>">
                  <div class="course-content">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                    <p class="category">
                          <a href="connexion.php" target="_blank" style="text-decoration: none; color: inherit;">S'inscrire</a>
                    </p>
                        <p class="price">FREE</p>
                      </div>
                      <center><h3><a href="course-details.php"><?= htmlspecialchars($row['titre']) ?></a></h3></center>
                      <center><p class="fst-italic text-center">
                        <?php
                            $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                            echo $dateTime->format('l, F jS \a\t g:i A');
                        ?></p>
                      </center>
                      <p class="description"><?= html_entity_decode($row['description']); ?></p>
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

        <div class="text-center mt-4" style="height: 35px;margin-top: 2.3rem !important;"data-aos="zoom-in" data-aos-delay="400">
          <a href="Comming_events.php" class="read-more" style="background-color: var(--accent-color);
          color: white;padding: 10px;border-radius: 30px;">Show More Events</a>
        </div>
      </section>
      
      <!--********************Popular Events Section******************** -->
      <section id="events" class="events section">
        <div class="container section-title" data-aos="fade-up"style="margin-bottom: -40px;">
            <h2>Events</h2>
            <p>Popular Events</p>
        </div>
    
        <div class="container" data-aos="fade-up">
          <div class="row">
            <?php
              include 'images.php';
              if ($completed2->num_rows > 0) {
                  while ($row = $completed2->fetch_assoc()) {
                      $description = $row['description'];
              ?>
           <div class="col-md-6 d-flex align-items-stretch">
              <div class="card">
                  <div class="card-img">
                    <img class="img-fluid" alt="..." src="data:image/jpeg;base64,<?= base64_encode($row['image']) ?>" class="img-fluid" alt="<?= htmlspecialchars($row['titre']) ?>">
                  </div>
                  <div class="card-body">
                    <h5 class="card-title"><a href=""><?= html_entity_decode($row['titre']); ?></a></h5>
                    <center><p class="fst-italic text-center">
                      <?php
                          $dateTime = new DateTime($row['date'] . ' ' . $row['heure']);
                          echo $dateTime->format('l, F jS \a\t g:i A');
                      ?></p>
                    </center>
                    
                    <div>
                      <p class="card-text">
                       <?= htmlspecialchars($description) ?>
                      </p>
                    </div>
                  </div>
              </div>
           </div>
            <?php
                  }
              } else {
                  echo "<p>Aucun événement trouvé.</p>";
              }
              ?>
          </div>
            <!-- Show More Events  -->
            <div class="text-center mt-4" style="height: 35px;margin-top: -1.3rem !important;">
                <a href="Completed_Events.php" class="read-more" style="background-color: var(--accent-color);
                color: white;padding: 10px;border-radius: 30px;">Show More Events</a>
            </div>
        </div>
      </section>
      
      <!--********************About Section***************************** -->
      <section id="about" class="about section">
        <div class="container section-title" data-aos="fade-up"style="margin-bottom: -40px;">
          <h2>About US</h2>
          <p>who we are </p>
        </div>
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-up" data-aos-delay="100" >
              <img src="assets/img/tems.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 order-2 order-lg-1 content" data-aos="fade-up" data-aos-delay="200"style="margin-left: auto;">
              <br>
              <p class="fst-italic">"We are a team of passionate and creative professionals, committed to turning every event into an unforgettable experience.</p> 
              <p class="fst-italic"> With meticulous attention to detail and a deep understanding of our clients' visions, we strive to transform each occasion into a unique moment that reflects both personality and purpose. </p> 
              <p class="fst-italic">Our dedication and expertise ensure that every event we manage is not only memorable but truly one of a kind.</p>
              <p class="fst-italic">Don’t miss the chance to step into our world and experience something truly extraordinary with us.</p>  
            </div>
          </div>
        </div>
      </section>
  </main>

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

  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>


  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>

  


<script>
  // Sélectionner toutes les icônes cœur
  const heartIcons = document.querySelectorAll('.heart-icon');

  // Ajouter un gestionnaire d'événement sur chaque icône cœur
  heartIcons.forEach(icon => {
    icon.addEventListener('click', () => {
      // Afficher la fenêtre modale
      const signInModal = new bootstrap.Modal(document.getElementById('signInModal'));
      signInModal.show();
    });
  });
</script>
</body>
</html>